@extends('Panel.layouts.master')
@section('title','Tüm Makaleler')
@section('content')
    <div class=" col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-thumbnail rounded" width="200"  src="{{asset($writer->img_url)}}" alt="">
                </div>
                <form method="post" action="{{route('update.profile')}}" enctype="multipart/form-data" >
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
                        <label>Şifre</label>
                        <input type="password" name="password" class="form-control"  value="{{$writer->password}}" required/>
                    </div>
                    <div class="form-group">
                        <label>Şifre Tekrar</label>
                        <input type="password" name="re_password" class="form-control"  value="{{$writer->password}}" required/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Bilgileri Güncelle  </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

