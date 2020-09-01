<?php

namespace App\Http\Controllers\SiteController;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public  function  index(){

        $books = Book::where([
            ['is_active','=',1],
            ['public','=',1]
        ])->orderBy('created_at','DESC')->get();
        $categories  = Category::whereIsActive(1)->get();

        return view('Site.book.index',compact('books','categories'));
    }

    public  function  bookSingle($title,$id){

        $book = Book::where([
            ['id','=',$id],
            ['title','=',$title],
            ['is_active','=',1],
            ['public','=',1]
        ])->first();

        return view('Site.book.bookSingle',compact('book'));
    }
}
