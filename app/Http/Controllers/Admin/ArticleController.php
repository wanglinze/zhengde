<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get.admin/article  全部文章列表
    public function index()
    {
        $data = Article::orderBy('art_id','desc')->paginate(10);
        return view('admin.article.index',compact('data'));
    }


    //get.admin/article/create   添加文章
    public function create()
    {
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    //post.admin/article  添加文章提交
    public function store(Request $request)
    {
        $input = $request->except('_token', 'upload');
        $rules = [
            'cate_id'=>'required',
            'art_title'=>'required',
            'art_content'=>'required',
        ];

        $message = [
            'cate_id.required'=>'文章分类不能为空！',
            'art_title.required'=>'文章名称不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Article::create($input);
            if($res){
                return redirect()->route('article.index');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/article/{article}/edit  编辑文章
    public function edit($art_id)
    {
        $data = (new Category)->tree();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));
    }

    //put.admin/article/{article}    更新文章
    public function update(Request $request, $art_id)
    {
        $input = $request->except('_token','_method', 'upload');
        $rules = [
            'cate_id'=>'required',
            'art_title'=>'required',
            'art_content'=>'required',
        ];

        $message = [
            'cate_id.required'=>'文章分类不能为空！',
            'art_title.required'=>'文章名称不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Article::where('art_id',$art_id)->update($input);
            if($res){
                return redirect()->route('article.index');
            }else{
                return back()->with('errors','文章更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete.admin/article/{article}   删除单个文章
    public function destroy($art_id)
    {
        $re = Article::where('art_id',$art_id)->delete();
        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }


}
