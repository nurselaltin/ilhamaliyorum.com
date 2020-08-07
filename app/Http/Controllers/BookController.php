<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{

    public  function  index(){

        $books = Book::get();
        return view('Panel.book.index',compact('books'));
    }

    public  function  create(){

        $categories = Category::whereIsActive(1)->get();
        return view('Panel.book.create',compact('categories'));
    }

    public  function  add(Request $request){



         $book = new Book();
         $book->writer_id = 4;
         $book->title = $request->title;
         $book->url = Str::slug(strtolower($request->title),'-');
         $book->description = $request->description;
         $book->writer_fullname = $request->writer;
         $book->category= $request->category;
         $book->is_active= 1;
         $book->public= 1;

         if($request->hasFile('image')){

             //resim adını düzenle
             $imageName = Str::slug($request->title,'-').'.'.$request->image->getClientOriginalExtension();
             //Resimi klasöre kaydet
              $request->image->move(public_path('uploads/book'),$imageName);
              //veritabanına kaydet
             $book->img_url='uploads/book/'.$imageName;
         }
         $book->save();
         toastr()->success('Kitap başarıyla kaydedildi.');
         return redirect()->route('book');

    }

     public  function  switch(Request $request){
        $book = Book::findOrFail($request->id)->first();
        $book->is_active = $request->isActive == "true" ? 1: 0;
        $book->save();
    }
}
