<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Staff;
use Illuminate\Support\Facades\Validator;

class StaffController extends CommonController
{
    public function index()
    {
        $data = Staff::orderBy('id','desc')->paginate(10);
        return view('admin.staff.index',compact('data'));
    }

    public function create()
    {
        return view('admin.staff.add');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token','upload');
        $rules = [
            'name'=>'required',
            'description'=>'required',
            'content'=>'required',
            'image'=>'required',
            'order'=>'required',
        ];

        $message = [
            'name.required'=>'姓名不能为空！',
            'description.required'=>'简介不能为空！',
            'content.required'=>'内容不能为空！',
            'image.required'=>'请上传图片！',
            'order.required'=>'排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Staff::create($input);
            if($res){
                return redirect()->route('staff.index');
            }else{
                return $this->error('数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $field = Staff::find($id);
        return view('admin.staff.edit',compact('field'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method', 'upload');
        $rules = [
            'name'=>'required',
            'description'=>'required',
            'content'=>'required',
            'image'=>'required',
            'order'=>'required',
        ];

        $message = [
            'name.required'=>'姓名不能为空！',
            'description.required'=>'简介不能为空！',
            'content.required'=>'内容不能为空！',
            'image.required'=>'请上传图片！',
            'order.required'=>'排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Staff::find($id)->update($input);
            if($res){
                return redirect()->route('staff.index');
            }else{
                return back()->with('errors','更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $re = Staff::find($id)->delete();
        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }

    public function changeOrder(Request $request)
    {
        $staff = Staff::find($request->id);
        $staff->order = $request->order;
        $re = $staff->save();
        if($re){
            return $this->success('排序更新成功！');
        }else{
            return $this->error('排序更新失败，请稍后重试！');
        }
    }

}
