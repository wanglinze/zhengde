<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Course;
use App\Http\Model\Staff;
use Illuminate\Support\Facades\Validator;

class CourseController extends CommonController
{
    public function index()
    {
        $data = Course::orderBy('id','desc')->paginate(10);
        return view('admin.course.index',compact('data'));
    }

    public function create()
    {
        $staffs = Staff::all();
        return view('admin.course.add', compact('staffs'));
    }

    public function store(Request $request)
    {
        $input = $request->except('_token','upload');
        $rules = [
            'title'=>'required',
            'staff_id'=>'required',
            'tag'=>'required',
            'description'=>'required',
            'content'=>'required',
        ];

        $message = [
            'title.required'=>'名称不能为空！',
            'staff_id.required'=>'请选择授课人！',
            'tag.required'=>'标签不能为空！',
            'description.required'=>'描述不能为空！',
            'content.required'=>'内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        $data = array(
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'staff_id' => $request->input('staff_id'),
            'image' => $request->input('image'),
            'tag' => $request->input('tag'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
        );

        if ($request->input('type') == 'normal') {
            $data['start_date'] = $request->input('start_date');
            $data['end_date'] = $request->input('end_date');
            $data['class_time'] = $request->input('normal');
        } else {
            $data['start_date'] = $request->input('temporary_start_date');
            $data['class_time'] = $request->input('temporary');
        }

        if ($validator->passes()) {
            $res = Course::create($data);
            if ($res) {
                return redirect()->route('course.index');
            } else {
                return $this->error('数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $field = Course::with('staff')->find($id);
        $staffs = Staff::all();
        return view('admin.course.edit',compact('field','staffs'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method', 'upload');
        $rules = [
            'title'=>'required',
            'staff_id'=>'required',
            'tag'=>'required',
            'description'=>'required',
            'content'=>'required',
        ];

        $message = [
            'title.required'=>'名称不能为空！',
            'staff_id.required'=>'请选择授课人！',
            'tag.required'=>'标签不能为空！',
            'description.required'=>'描述不能为空！',
            'content.required'=>'内容不能为空！',
        ];

        $data = array(
            'title' => $request->input('title'),
            'type' => $request->input('type'),
            'staff_id' => $request->input('staff_id'),
            'image' => $request->input('image'),
            'tag' => $request->input('tag'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
        );

        if ($request->input('type') == 'normal') {
            $data['start_date'] = $request->input('start_date');
            $data['end_date'] = $request->input('end_date');
            $data['class_time'] = $request->input('normal');
        } else {
            $data['start_date'] = $request->input('temporary_start_date');
            $data['class_time'] = $request->input('temporary');
        }

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Course::find($id)->update($data);
            if($res){
                return redirect()->route('course.index');
            }else{
                return back()->with('errors','更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $re = Course::find($id)->delete();
        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }


}
