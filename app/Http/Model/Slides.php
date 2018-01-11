<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slides extends Model
{
    use SoftDeletes;

    protected $table="slides";

    protected $primaryKey="id";

    public $timestamps=true;

    protected $guarded=['id'];

    protected $dates = ['deleted_at'];
}
