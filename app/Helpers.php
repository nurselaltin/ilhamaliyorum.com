<?php

use App\Models\Blog;
use App\Models\Book;
use App\Models\Writer;

function isResumeFill(){

    $writer =  \App\Models\Writer::find(session()->get('id'));

    //Bu bilgileri girmemişse daha özgeçmiş oluşturmamış.

        if($writer->address == null & $writer->birthday== null){
            return true;
        }

}

function get_category_title($id){

    //category table yükle, id ile eşitle sonrasında title  döndür

    $categories=\App\Models\Category::whereIsActive(1)->get();
    foreach ($categories as $category){
        if($category->id == $id){
            return $category->title;
            break;
        }
    }
}

//footer için yazı ve kitap önerilerini getiriyoruz

function get_blogs(){

    $blogs = Blog::where([
        ['is_active','=',1],
        ['public','=',1]
    ])->orderBy('created_at','DESC')->get();
    return $blogs;
}

function get_books(){
    $books = Book::where([
        ['is_active','=',1],
        ['public','=',1]
    ])->orderBy('created_at','DESC')->get();
    return $books;
}


//-------------------------------------------------




