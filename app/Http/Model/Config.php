<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends Model
{
    use SoftDeletes;

    //表名
    protected $table="configs";

    //主键
    protected $primaryKey="conf_id";

    //时间字段
    public $timestamps=true;

    //保护字段,create方法的需要
    protected $guarded=['conf_id'];

    protected $dates = ['deleted_at'];
}
