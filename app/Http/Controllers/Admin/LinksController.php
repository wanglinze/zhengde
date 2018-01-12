<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LinksController extends CommonController
{
    //get.admin/links  友情链接列表
    public function index()
    {
        $data = Links::orderBy('link_order','asc')->get();
        return view('admin.links.index',compact('data'));
    }

    //get.admin/links/create   添加友情链接
    public function create()
    {
        return view('admin/links/add');
    }

    //post.admin/links  添加友情链接提交
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $rules = [
            'link_name'=>'required',
            'link_url'=>'required',
            'link_order'=>'required',
        ];

        $message = [
            'link_name.required'=>'友情链接名称不能为空！',
            'link_url.required'=>'友情链接URL不能为空！',
            'link_order.required'=>'友情链接排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Links::create($input);
            if($re){
                return redirect()->route('links.index');
            }else{
                return back()->with('errors','友情链接失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/links/{links}/edit  编辑友情链接
    public function edit($link_id)
    {
        $field = Links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }

    //put.admin/links/{links}    更新友情链接
    public function update(Request $request, $link_id)
    {
        $input = $request->except('_token','_method');
        $rules = [
            'link_name'=>'required',
            'link_url'=>'required',
            'link_order'=>'required',
        ];

        $message = [
            'link_name.required'=>'友情链接名称不能为空！',
            'link_url.required'=>'友情链接URL不能为空！',
            'link_order.required'=>'友情链接排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Links::where('link_id',$link_id)->update($input);
            if($re){
                return redirect()->route('links.index');
            }else{
                return back()->with('errors','友情链接更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    //delete.admin/links/{links}   删除友情链接
    public function destroy($link_id)
    {
        $re = Links::where('link_id',$link_id)->delete();
        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }

    public function changeOrder(Request $request)
    {
        $input = $request->input();
        $links = Links::find($input['link_id']);
        $links->link_order = $input['link_order'];
        $re = $links->update();
        if($re){
            return $this->success('排序更新成功！');
        }else{
            return $this->error('排序更新失败，请稍后重试！');
        }
    }

}
