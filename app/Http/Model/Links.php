<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //表名
    protected $table="links";

    //主键
    protected $primaryKey="link_id";

    //时间字段
    public $timestamps=false;

    //保护字段,create方法的需要
    protected $guarded=[];
}
