<?php

namespace App\Http\Controllers\SiteController;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Writer;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BlogController extends Controller
{
    public  function  index(){

         $blogs = Blog::where([
             ['is_active','=',1],
             ['public','=',1]
         ])->orderBy('created_at','DESC')->get();

        return view('Site.blog.index',compact('blogs'));
    }

    public  function  blogPost($url,$id){


        $blog = Blog::where([
            ['id','=',$id],
            ['url','=',$url],
            ['is_active','=',1],
            ['public','=',1]
        ])->first();

        $blog->views = $blog->views +1;
        $blog->save();

        $writer = Writer::where('id',$blog->writer_id)->first();

        return view('Site.blog.blogpost',compact('blog','writer'));
    }
}
