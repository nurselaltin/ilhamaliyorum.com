@extends('Panel.layouts.master')
@section('title','Makale Oluştur')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('add.video')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" name="title" class="form-control" required/>
                </div>
                <div class="form-group">
                    <label>Video Kategori</label>
                    <select name="category" class="form-control" required>
                        <option value="">Seçim Yapınız</option>
                        @foreach($categories as $category )
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Video Url</label>
                    <input type="text" name="url" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea name="description"  id="editor" class="form-control"  rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Video Oluştur</button>
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
