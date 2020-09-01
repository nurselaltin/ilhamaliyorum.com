<?php

namespace App\Http\Controllers\SiteController;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public  function  index(){
        $videos = Video::where([
            ['is_active','=',1],
            ['public','=',1]
        ])->orderBy('created_at','DESC')->get();

        return view('Site.video.index',compact('videos'));    }
}
