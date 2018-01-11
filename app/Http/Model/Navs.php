<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Navs extends Model
{
    //表名
    protected $table="navs";

    //主键
    protected $primaryKey="nav_id";

    //时间字段
    public $timestamps=false;

    //保护字段,create方法的需要
    protected $guarded=[];
}
