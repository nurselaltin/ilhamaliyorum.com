<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Video;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{

    public  function  index(){

        $videos = Video::where('writer_id',session()->get('id'))->get();

        return view('Panel.video.index',compact('videos'));
    }

    public  function  create(){

        $categories = Category::whereIsActive(1)->get();
        return view('Panel.video.create',compact('categories'));
    }

    public  function  add(Request $request){
        /* Sessionda kayıtlı kullanıcı bilgilerinin writer tablosunu getiriyoruz.
         Book tablosuna , kitabın bilgileri ile kullanıcı bilgilerinide kaydediyoruz
        */
        $writer = Writer::where('email',session()->get('email'))->first();

        //Video url parçalayıp kayıt eedeceğiz.
        $url = explode('/',$request->url);

        $video= new Video();
        $video->writer_id = $writer->id;
        $video->writer_fullname = $writer->fullname;
        $video->title = $request->title;
        $video->url = $url[3];
        $video->description = $request->description;
        $video->category= $request->category;
        $video->is_active= 1;
        $video->public= 1;
        $video->save();
        toastr()->success('Video başarıyla kaydedildi.');
        return redirect()->route('video');

    }

    public  function  edit($id){

        $video = Video::findOrFail($id);
        $categories = Category::whereIsActive(1)->get();
        return view('Panel.video.update',compact('video','categories'));

    }
    
    public  function  update(Request $request,$id){

        $video = Video::findOrFail($id);
        $video->title = $request->title;
        $video->url = $request->url;
        $video->description = $request->description;
        $video->category=$request->category;

        $video->save();
        toastr()->success('Video başarıyla güncellendi.');
        return redirect()->route('video');

    }
    
    public  function  switch(Request $request){
        $video = Video::find($request->id);
        $video->is_active = $request->isActive == "true" ? 1: 0;
        $video->save();

    }

    public function deleteVideo(Request $request){

        $video = Video::find($request->id);
        $video->delete();
        toastr()->success('Video başarıyla silindi.');
        return redirect()->route('video');

    }
}
