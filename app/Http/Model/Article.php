<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //表名
    protected $table="articles";

    //主键
    protected $primaryKey="art_id";

    //时间字段
    public $timestamps=false;

    //保护字段,create方法的需要
    protected $guarded=[];
}
