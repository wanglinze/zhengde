<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //表名
    protected $table="categories";

    //主键
    protected $primaryKey="cate_id";

    //时间字段
    public $timestamps=false;

    //保护字段,create方法的需要
    protected $guarded=[];



    //将数据在这里处理
    public  function tree(){
        $categorys = $this->orderBy('cate_order','asc')->get();
        return $this->getTree($categorys,'cate_name','cate_id','cate_pid',0);
    }

    //二级tree分类方法
    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0){
        $arr = [];
        foreach($data as $k=>$v){
            //重构数据,只有父级id=0的数据才会取出来,进而取出相应的二级数据
            if($v->$field_pid == $pid){
                //父级更改字段名字
                $data[$k]["_".$field_name] =$data[$k][$field_name];
                $arr[] = $data[$k];
                foreach($data as $m=>$n){
                    //子级的pid等于父级的id
                    if($n->$field_pid ==$v->$field_id){
                        //子级更改字段名字和前面的数据加上符号├─ 以区分上下级关系
                        $data[$m]["_".$field_name] ='├─ '.$data[$m][$field_name];
                        $arr[] =$data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}
