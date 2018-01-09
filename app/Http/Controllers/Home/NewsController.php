<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Model\Slides;
use Illuminate\Support\Facades\Auth;

class NewsController extends CommonController
{
    public function index()
    {
        $slides = Slides::all();
        return view('home.index',compact('slides'));
    }

    public function show($id)
    {
        $slides = Slides::all();
        return view('home.index',compact('slides'));
    }

}
