<?php

namespace App\Http\Controllers\Home;

//use App\Http\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct()
    {
        /**
        //将以下变量共享到所有页面

        //点击量最高的6篇文章
        $hot = Article::orderBy('art_view','desc')->take(5)->get();

        //最新发布文章8篇
        $new = Article::orderBy('art_time','desc')->take(8)->get();

        $navs = Navs::all();

        $links = Links::orderBy("link_order","asc")->get();

        View::share('navs',$navs);
        View::share('hot',$hot);
        View::share('new',$new);
        View::share('links',$links);
        **/
    }
}
