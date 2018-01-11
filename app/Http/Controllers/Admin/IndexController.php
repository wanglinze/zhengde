<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\AdminUser;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    /**
     * 更改管理员密码
     */
    public function pass()
    {
        if($input = Input::all()){

            //定义验证规则
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];

            //原信息为英文,重新定义中文提示信息
            $message = [
                //注意和上面rules的对应关系,从而表示
                'password.required'=>'新密码不能为空！',
                'password.between'=>'新密码必须在6-20位之间！',
                //表单中密码的name属性怎么写
                'password.confirmed'=>'新密码和确认密码不一致！',
            ];

            //验证
            $validator = Validator::make($input,$rules,$message);

            if($validator->passes()){
                $admin_user = AdminUser::first();
                $_password = Crypt::decrypt($admin_user->user_pass);
                if($input['password_o']==$_password){
                    $admin_user->user_pass = Crypt::encrypt($input['password']);
                    $admin_user->update();
                    return back()->with('errors','修改密码成功！');
                }else{
                    return back()->with('errors','原密码错误！');
                }
            }else{
                //这里使用withErrors可以捕获错误信息
                return back()->withErrors($validator);
            }

        }else{
            return view('admin.pass');
        }
    }
}
