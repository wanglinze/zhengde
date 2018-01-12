<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    //get.admin/config  全部配置项列表
    public function index()
    {
        $data = Config::orderBy('conf_order','asc')->get();
        return view('admin.config.index',compact('data'));
    }

    /*
     * 配置更新
     */
    public function changeContent(Request $request)
    {
        $this->putFile();
        return back()->with('errors','配置项更新成功！');
    }

    /*
     * 配置写入config文件夹下的文件web.php中
     */
    public function putFile()
    {

        $config = Config::pluck('conf_content','conf_name')->all();
        $path = base_path().'/config/web.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);

    }


    //get.admin/config/create   添加配置项
    public function create()
    {
        return view('admin/config/add');
    }

    //post.admin/config  添加配置项提交
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
            'conf_content'=>'required',
            'conf_order'=>'required',
        ];
        $message = [
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required'=>'配置项标题不能为空！',
            'conf_content.required'=>'配置项内容不能为空！',
            'conf_order.required'=>'排序项内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Config::create($input);
            if($re){
                return redirect()->route('config.index');
            }else{
                return back()->with('errors','配置项失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/config/{config}/edit  编辑配置项
    public function edit($conf_id)
    {
        $field = Config::find($conf_id);
        return view('admin.config.edit',compact('field'));
    }

    //put.admin/config/{config}    更新配置项
    public function update(Request $request, $conf_id)
    {
        $input = $request->except('_token','_method');
        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
            'conf_content'=>'required',
            'conf_order'=>'required',
        ];
        $message = [
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required'=>'配置项标题不能为空！',
            'conf_content.required'=>'配置项内容不能为空！',
            'conf_order.required'=>'排序项内容不能为空！',
        ];
        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Config::where('conf_id',$conf_id)->update($input);
            if($re){
                $this->putFile();
                return redirect()->route('config.index');
            }else{
                return back()->with('errors','配置项更新失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete.admin/config/{config}   删除配置项
    public function destroy($conf_id)
    {
        $re = Config::where('conf_id',$conf_id)->delete();
        if($re){
            $this->putFile();
            return $this->success('删除成功！');
        }else{
            return $this->error('删除失败，请稍后重试！');
        }
    }

    /*
     * 改变排序
     */
    public function changeOrder(Request $request)
    {
        $input = $request->input();
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $re = $config->update();
        if($re){
            return $this->success('排序更新成功！');
        }else{
            return $this->error('排序更新失败，请稍后重试！');
        }
    }



}
