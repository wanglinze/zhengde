<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    //
    use SoftDeletes;

    //表名
    protected $table="replies";

    //主键
    protected $primaryKey="id";

    //时间字段
    public $timestamps=true;

    //保护字段,create方法的需要
    protected $guarded=['id'];

    protected $dates = ['deleted_at'];
}
