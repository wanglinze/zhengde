<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Slides;
use Illuminate\Support\Facades\Validator;

class SlidesController extends CommonController
{
    public function index()
    {
        $data = Slides::orderBy('id','desc')->paginate(10);
        return view('admin.slides.index',compact('data'));
    }

    public function create()
    {
        return view('admin.slides.add');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token','upload');
        $rules = [
            'title'=>'required',
            'image'=>'required',
            'order'=>'required',
        ];

        $message = [
            'title.required'=>'标题不能为空！',
            'image.required'=>'请上传图片！',
            'order.required'=>'排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Slides::create($input);
            if($res){
                return redirect()->route('slides.index');
            }else{
                return $this->error('数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $field = Slides::find($id);
        return view('admin.slides.edit',compact('field'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method', 'upload');
        $rules = [
            'title'=>'required',
            'image'=>'required',
            'order'=>'required',
        ];

        $message = [
            'title.required'=>'标题不能为空！',
            'image.required'=>'请上传图片！',
            'order.required'=>'排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Slides::find($id)->update($input);
            if($res){
                return redirect()->route('slides.index');
            }else{
                return back()->with('errors','更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $re = Slides::find($id)->delete();
        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }

    public function changeOrder(Request $request)
    {
        $slides = Slides::find($request->id);
        $slides->order = $request->order;
        $re = $slides->save();
        if($re){
            return $this->success('排序更新成功！');
        }else{
            return $this->error('排序更新失败，请稍后重试！');
        }
    }

}
