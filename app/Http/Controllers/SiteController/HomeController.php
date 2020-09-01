<?php

namespace App\Http\Controllers\SiteController;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function  index(){

        $blogs = Blog::where([
            ['is_active','=',1],
            ['public','=',1]
        ])->orderBy('created_at','DESC')->get();

        $videos = Video::where([
            ['is_active','=',1],
            ['public','=',1]
        ])->orderBy('created_at','DESC')->get();

        return view('Site.index',compact('blogs','videos'));
    }
}
