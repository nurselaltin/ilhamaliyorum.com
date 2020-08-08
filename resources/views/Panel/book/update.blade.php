@extends('Panel.layouts.master')
@section('title','Makale Oluştur')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('update.book',$book->id)}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Kitap Adı</label>
                    <input type="text" name="title" class="form-control" required value="{{$book->title}}"/>
                </div>
                <div class="form-group">
                    <label>Yazar</label>
                    <input type="text" name="writer" class="form-control" required value="{{$book->writer_fullname}}"/>
                </div>
                <div class="form-group">
                    <label>Kitap Kategori</label>
                    <select name="category" class="form-control" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category )
                            <option @if($book->$category==$category->title ) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kitap Fotoğrafı</label>
                    <label>Makale Fotoğrafı</label></br>
                    <img src="{{asset($book->img_url)}}" class="img-thumbnail rounded" width="200">
                    </br>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Makale İçeriği</label>
                    <textarea name="description"  id="editor" class="form-control"  rows="5">{{$book->description}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Kitap Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#editor').summernote(
                {
                    'height':300
                }
            );
        });
    </script>

@endsection