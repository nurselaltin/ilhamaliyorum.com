<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class BlogController extends Controller
{

    public  function  index(){

        $blogs=Blog::where('writer_id',session()->get('id'))->get();
        return view('Panel.blog.index',compact('blogs'));
    }

    public  function  create(){

        $categories = Category::whereIsActive(1)->get();
        return view('Panel.blog.create',compact('categories'));
    }

    public  function  add(Request $request){

        /* Sessionda kayıtlı kullanıcı bilgilerinin writer tablosundaki bilgelerini getiriyoruz.
        Blog tablosuna , kitabın bilgileri ile kullanıcı bilgilerinide kaydediyoruz.
        */
        $writer = Writer::where('email',session()->get('email'))->first();
        $blog = new Blog();
        $blog->writer_id =$writer->id;
        $blog->writer_fullname = $writer->fullname;
        $blog->title = strtoupper($request->title);
        $blog->url = Str::slug(strtolower($request->title),'-');
        $blog->description = $request->description;
        $blog->category= $request->category;
        $blog->is_active= 1;
        $blog->views= 1;
        $blog->public= 1;

      
        if($request->hasFile('image')){

            $image       = $request->file('image');
            //resim adını düzenle
            $imageName = Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
            //Resimi klasöre kaydet
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(1140, 705);
            $image_resize->save(public_path('uploads/blog/'.$imageName));
            //veritabanına kaydet
            $blog->img_url='uploads/blog/'.$imageName;
        }
        $blog->save();
        toastr()->success('Yazı başarıyla kaydedildi.');
        return redirect()->route('blog');

    }

    public  function  edit($id){

        $blog = Blog::findOrFail($id);
        $categories = Category::whereIsActive(1)->get();

        return view('Panel.blog.update',compact('blog','categories'));

    }

    public  function  update(Request $request,$id){

        $blog= Blog::findOrFail($id);
        $blog->title = strtoupper($request->title);
        $blog->url = Str::slug(strtolower($request->title),'-');
        $blog->description = $request->description;
        $blog->category= $request->category;

        if($request->hasFile('image')){
            //resim adını düzenle
            $imageName = Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
            //Resimi klasöre kaydet
            $request->image->move(public_path('uploads/blog'),$imageName);
            //veritabanına kaydet
            $blog->img_url='uploads/blog/'.$imageName;
        }
        $blog->save();
        toastr()->success('Yazı başarıyla güncellendi.');
        return redirect()->route('blog');

    }
    
    public  function  switch(Request $request){
        $blog = Blog::find($request->id);
        $blog->is_active = $request->isActive == "true" ? 1: 0;
        $blog->save();

    }

    public function deleteBlog(Request $request){

        $blog = Blog::find($request->id);
        $blog->delete();
        toastr()->success('Yazı başarıyla silindi.');
        return redirect()->route('blog');

    }
}
