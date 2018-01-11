<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $table="staffs";

    protected $primaryKey="id";

    public $timestamps=true;

    protected $guarded=['id'];

    protected $dates = ['deleted_at'];
}
