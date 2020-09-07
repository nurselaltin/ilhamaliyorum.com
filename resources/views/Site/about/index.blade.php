@extends('Site.layouts.master')
@section('content')

    <!-- banner start -->
    <!-- ================ -->
    <div class="banner video-background-banner pv-40 dark-translucent-bg hovered" style="background-image: url({{asset('about-bc2.jpg')}})">
        <!-- breadcrumb start -->
        <!-- ================ -->
        <div class="breadcrumb-container">
            <div class="container">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a class="link-dark" href="{{route('home')}}">Ana Sayfa</a></li>
                    <li class="active">Hakkımızda</li>
                </ol>
            </div>
        </div>
        <!-- breadcrumb end -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center col-md-offset-2 pv-20">
                    <h2 class="title object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">ilhamaliyorum.com 'un Kuruluş Amacı</h2>
                    <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
                    <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"></p>
                    <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"> </p>
                </div>
            </div>
        </div>

    </div>
    <!-- banner end -->
@endsection