<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slides extends Model
{
    protected $table="slides";

    protected $primaryKey="id";

    public $timestamps=false;

    protected $guarded=['id'];

    protected $dates = ['deleted_at'];
}
