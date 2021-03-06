<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    //get.admin/category  全部分类列表
    public function index()
    {
        //注意思想,使用tree方法把需要的数据处理放大model中,我们控制器尽量不处理数据
        $data = (new Category)->tree();
        return view('admin.category.index')->with('data',$data);
    }

    //post.admin/category  添加分类提交的方法
    public function store(Request $request)
    {
        //排除掉_token的影响
        $input = $request->except('_token');

        $rules = [
            'cate_pid'=>'required',
            'cate_name'=>'required',
            'cate_order'=>'required',
        ];

        $message = [
            'cate_pid.required'=>'父级分类不能为空！',
            'cate_name.required'=>'分类名称不能为空！',
            'cate_order.required'=>'排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Category::create($input);
            if($re){
                return redirect()->route('category.index');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    //get.admin/category/create   添加分类
    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.add',compact('data'));
    }

    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

    //delete.admin/category/{category}   删除单个分类
    public function destroy($cate_id)
    {
        $re = Category::where('cate_id',$cate_id)->delete();

        //如果父级分类被删除,则子分类的pid变成0,也就是变成顶级分类
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);

        if($re){
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }
    
    //get.admin/category/{category}/edit  编辑分类
    public function edit($cate_id)
    {
        $cateItem = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('cateItem','data'));
    }

    //put.admin/category/{category}    更新分类
    public function update(Request $request, $cate_id)
    {
        $input = $request->except('_token','_method');
        $rules = [
            'cate_pid'=>'required',
            'cate_name'=>'required',
            'cate_order'=>'required',
        ];

        $message = [
            'cate_pid.required'=>'父级分类不能为空！',
            'cate_name.required'=>'分类名称不能为空！',
            'cate_order.required'=>'排序不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Category::where('cate_id',$cate_id)->update($input);
            if($res){
                return redirect()->route('category.index');
            }else{
                return back()->with('errors','分类信息更新失败,请稍后重试');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    /**
     * 更新排序
     */
    public function changeOrder(Request $request)
    {
        $input = $request->input();
        //更新
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if($re){
            return $this->success('排序更新成功！');
        }else{
            return $this->error('排序更新失败，请稍后重试！');
        }
    }

}
