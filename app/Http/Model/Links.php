<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Links extends Model
{
    use SoftDeletes;

    //表名
    protected $table="links";

    //主键
    protected $primaryKey="link_id";

    //时间字段
    public $timestamps=true;

    //保护字段,create方法的需要
    protected $guarded=['link_id'];

    protected $dates = ['deleted_at'];
}
