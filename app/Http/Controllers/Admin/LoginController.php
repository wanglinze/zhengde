<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\AdminUser;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once(__DIR__.'/../../../../resources/org/code/Code.php');

class LoginController extends CommonController
{
    public function login()
    {
        if($input = Input::all()){
            //取得验证码
            $code = new \Code;
            $_code = $code->get();
            //判断验证码是否正确
            if(strtoupper($input['code'])!=$_code){
                //with的作用是将信息闪存到session中
                return back()->with('msg','验证码错误！');
            }
            //验证用户密码是否正确,注意使用了解密方法
            $admin_user = AdminUser::first();
            if($admin_user->user_name != $input['user_name'] || Crypt::decrypt($admin_user->user_pass)!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }
            //将用户存入session中
            session(['admin_user'=>$admin_user]);
            return redirect('admin');

        }else {
            return view('admin.login');
        }
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

    public function quit()
    {
        session(['admin_user'=>null]);
        return redirect('admin/login');
    }

}
