@extends('Site.layouts.master')
@section('content')

    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i>  <a href="">Kitap Önerileri</a></li>
                <li class="breadcrumb-item active">{{$book->title}}</li>
            </ol>
        </div>
    </div>
    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container">

        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-12">

                    <!-- page-title start -->
                    <!-- ================ -->
                    <h1 class="page-title">{{ $book->title}} - {{$book->writer_fullname}}</h1>
                    <div class="separator-2"></div>
                    <!-- page-title end -->
                    <div class="image-box style-3-b">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="overlay-container">
                                    <img src="{{asset($book->img_url)}}" alt="">
                                    <div class="overlay-to-top">
                                        <p class="small margin-clear"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="body">
                                    <p class="mb-10">{{$book->description}}</p>
                                    <div class="separator-2"></div>
                                    <p class="small mb-10"><i class="pl-10 icon-tag-1"></i>{{get_category_title($book->category)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- main end -->
            </div>
        </div>
    </section>
    <!-- main-container end -->


@endsection