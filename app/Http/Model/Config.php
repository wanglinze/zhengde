<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //表名
    protected $table="configs";

    //主键
    protected $primaryKey="conf_id";

    //时间字段
    public $timestamps=false;

    //保护字段,create方法的需要
    protected $guarded=[];
}
