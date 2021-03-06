@extends('Panel.layouts.master')
@section('title','Makale Oluştur')
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{route('update.writer')}}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label>Ad Soyad</label>
                    <input type="text" name="fullname" class="form-control"  value="{{$writer->fullname}}" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"  value="{{$writer->email}}" required/>
                </div>
                <div class="form-group">
                    <label>Telefon</label>
                    <input type="phone" name="phone" class="form-control" value="{{$writer->phone}}" />
                </div>
                <div class="alert alert-danger">
                    <span>İl-ilçe şeklinde yazınız</span>
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" name="address" class="form-control" value="{{$writer->address}}">
                </div>
                <div class="alert alert-danger">
                    <span>Yıl-Ay-Gün şeklinde yazınız</span>
                </div>
                <div class="form-group">
                    <label>Doğum Tarihi</label>
                    <input type="text" name="birthday" class="form-control" value="{{$writer->birthday}}">
                </div>
                <div class="form-group">
                    <label>Profil Fotoğrafı</label></br>
                    <img src="{{asset($writer->img_url)}}" class="img-thumbnail rounded" width="200">
                    </br>
                    </br>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hakkınızda</label>
                    <textarea name="about_writer"  id="editor" class="form-control"  rows="5">{{$writer->about_writer}}</textarea>
                </div>
                <div class="form-group">
                    <label>Hayat Amacınız</label>
                    <textarea name="goals_writer"  id="editor" class="form-control"  rows="5">{{$writer->goals_writer}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Güncelle</button>
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
