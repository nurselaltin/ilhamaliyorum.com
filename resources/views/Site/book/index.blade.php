@extends('Site.layouts.master')
@section('content')

    <!-- section start -->
    <!-- ================ -->
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home pr-2"></i><a href="{{route('home')}}">Ana Sayfa</a></li>
                <li class="breadcrumb-item active">Kitap Önerileri</li>
            </ol>
        </div>
    </div>
    <section class="section pv-30">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">

                    <div class="separator"></div>
                </div>
            </div>
            <!-- isotope filters start -->
            <div class="filters text-center">
                <ul class="nav nav-pills style-2">
                    <li class="active"><a href="#" data-filter="*">HEPSİ</a></li>
                   @foreach($categories as $category)
                      <li><a href="#" data-filter=".{{$category->title}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- isotope filters end -->
            <div class="isotope-container row grid-space-0">
                @foreach($books as $book)
                <div class="col-sm-6 col-md-3 isotope-item {{get_category_title($book->category)}}">
                    <div class="image-box text-center">
                        <div class="overlay-container">
                            <img src="{{$book->img_url}}" alt="">
                            <div class="overlay-top">
                                <div class="text">
                                    <h4><a>{{$book->title}}</a></h4>
                                    <p class="small">{{$book->writer}}</p>
                                </div>
                            </div>
                            <div class="overlay-bottom">
                                <div class="links">
                                    <a href="{{route('book.single',[$book->title,$book->id])}}" class="btn btn-gray-transparent btn-animated btn-sm">Detayları Görüntüle <i class="pl-10 fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach

            </div>
            <div class="space-bottom"></div>
            <hr>
        </div>
        <div class="owl-carousel content-slider">

        </div>

    </section>
    <!-- section end -->


@endsection