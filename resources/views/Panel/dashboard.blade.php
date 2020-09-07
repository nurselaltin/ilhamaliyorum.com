@extends('Panel.layouts.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Anasayfa</h1>
            <a href="{{route('home')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm text-white-50"></i> Site </a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">YAZILAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">@if($blogs->count()== null) 0 @else {{$blogs->count()}} @endif</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-feather-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">KİTAPLAR</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">@if($books->count()== null) 0 @else {{$books->count()}} @endif</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Videolar</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">@if($videos->count()== null) 0 @else {{$videos->count()}} @endif</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-video fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Content Row -->

        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Admine Mesaj Bırak</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('AdminPage/img/undraw_posting_photo.svg')}}" alt="">
                        </div>
                        <p>Tavsiye,görüş,istek,öneri,şikayet,duygu ve düşüncelerinizi lütfen  bana ulaştırın.En kısa zamanda geri dönüş yapılacaktır.  :)</p>
                        <a href="mailto:na.nurselaltin@gmail.com" class="btn p-v-xl btn-success">na.nurselaltin@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Özgeçmiş</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 14rem;" src="{{asset('uploads/resume/default-profil.png')}}" alt="">
                        </div>
                        <p>Eğitim bilgilerinizi , iş deneyimlerinizi, projelerinizi , referanslarınız  girerek özgeçmişinizi doldurun.İnsanlar sizi daha iyi tanısın:)</p>
                        <a href="{{route('create.resume')}}" class="btn p-v-xl btn-success">@if(isResumeFill(session()->get('email') === 1))Özgeçmiş Oluştur @else Özgeçmiş Görüntüle @endif</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Oluştur</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('add.category')}}">
                            @csrf
                            <div  class="form-gorup">
                                <label>Kategori Adı</label>
                                <input type="text" class="form-control" name="category_name" required>
                            </div>
                            </br>
                            <div  class="form-gorup">
                                <button type="submit" class="btn btn-primary btn-block">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

