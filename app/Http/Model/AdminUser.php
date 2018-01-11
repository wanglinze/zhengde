<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //表名
    protected $table="admin_users";

    //主键
    protected $primaryKey="id";

    //时间字段
    public $timestamps=false;


}
