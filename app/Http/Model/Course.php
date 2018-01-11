<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table="courses";

    protected $primaryKey="id";

    public $timestamps=true;

    protected $guarded=['id'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'class_time' => 'array',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Http\Model\Staff','staff_id');
    }

}
