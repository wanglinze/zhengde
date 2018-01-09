<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Slides;
use Illuminate\Support\Facades\Auth;

class CourseController extends CommonController
{
    public function show($id)
    {
        $slides = Slides::all();
        return view('home.index',compact('slides'));
    }

}
