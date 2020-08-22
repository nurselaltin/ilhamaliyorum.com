<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Book;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public  function  index(){

        $books = Book::where('writer_id',session()->get('id'))->get();
        $videos = Video::where('writer_id',session()->get('id'))->get();
        $blogs=Blog::where('writer_id',session()->get('id'))->get();
        return view('Panel.dashboard',compact('blogs','books','videos'));
    }

    public  function  addCategory(Request $request){

        $category = Category::where('title','=',strtoupper($request->category_name))->exists();

        if($category){
            toastError('Zaten bu kategori mevcut!');
            return redirect()->back();
        }else{

            $category = new Category();
            $category->title = strtoupper($request->category_name);
            $category->save();
            toastSuccess('Kategori başarıyla kaydoldu.');
            return redirect()->back();
        }
    }

}
