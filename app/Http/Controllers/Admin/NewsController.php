<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends CommonController
{
    public function index()
    {
        $data = News::orderBy('id','desc')->paginate(10);
        return view('admin.news.index',compact('data'));
    }

    public function create()
    {
        return view('admin.news.add');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token','upload');
        $rules = [
            'title'=>'required',
            'content'=>'required',
        ];

        $message = [
            'title.required'=>'名称不能为空！',
            'content.required'=>'内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = News::create($input);
            if($res){
                return redirect()->route('news.index');
            }else{
                return $this->error('数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $field = News::find($id);
        return view('admin.news.edit',compact('field'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method', 'upload');
        $rules = [
            'title'=>'required',
            'content'=>'required',
        ];

        $message = [
            'title.required'=>'名称不能为空！',
            'content.required'=>'内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = News::find($id)->update($input);
            if($res){
                return redirect()->route('news.index');
            }else{
                return back()->with('errors','更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        $re = News::find($id)->delete();
        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }


}
