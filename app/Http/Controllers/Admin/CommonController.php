<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function upload(Request $request)
    {
        //判断是否有效
        if($request->hasFile('upload')){
            $entension = $request->file('upload')->getClientOriginalExtension();
            $new_name = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $file_dir = public_path().'/uploads';
            $request->file('upload')->move($file_dir,$new_name);
            $file_path = '/uploads/'.$new_name;

            return $this->success($file_path);;
        }
        return $this->error('文件上传失败,请刷新后重试');
    }
}
