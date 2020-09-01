@extends('Site.layouts.master')
@section('content')

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">

        <!-- main-container start -->
        <!-- ================ -->
        <section class="main-container">

            <div class="container">
                <div class="row">

                    <!-- main start -->
                    <!-- ================ -->
                    <div class="main col-lg-8">

                        <!-- page-title start -->
                        <!-- ================ -->
                        <h1 class="page-title"></h1>
                        <!-- page-title end -->

                        <!-- blogpost start -->
                        <!-- ================ -->

                        <article class="blogpost full">
                            <header>
                                <div class="post-info mb-4">
                                    <span class="post-date">
                                      <i class="icon-calendar"></i>
                                      <span class="day">{{$blog->created_at->diffForHumans()}}</span>
                                    </span>

                                    <span class="submitted"><i class="icon-user-1"></i><a href="#">{{$blog->writer_fullname}}</a></span>
                                    <span class="comments"><i class="icon-eye"></i> <a href="#">{{$blog->views}} görüntüleme</a></span>
                                </div>
                            </header>
                            <div class="blogpost-content">
                                <div id="carousel-blog-post" class="carousel slide mb-5" data-ride="carousel">

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="overlay-container">

                                                <img src="{{$blog->img_url}}" alt="">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="my-4">{{$blog->title}}</h3>
                                <p>
                                    {{$blog->description}}
                                </p>
                            </div>
                            <footer class="clearfix">
                                <div class="tags pull-left"><i class="icon-tags"></i> <a >{{$blog->category}}</a></div>
                                <div class="link pull-right">
                                    <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
                                        <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                        <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </footer>

                        </article>

                        <!-- blogpost end -->

                    </div>
                    <!-- main end -->

                    <!-- sidebar start -->
                    <!-- ================ -->
                    <aside class="col-lg-4 col-xl-3 ml-xl-auto">
                        <div class="sidebar">
                            <div class="block clearfix ">

                                <a href="{{$writer->img_url}}" alt="Jane Doe" title="Jane Doe" class="img-circle"></a>
                                <h3 class="title" style="margin-top: 30px">{{$blog->writer_fullname}} kimdir?</h3>
                                <div class="separator-2"></div>
                                <!--  <blockquote class="margin-clear">
                                    <p>Design is not just what it looks like and feels like. Design is how it works.</p>
                                </blockquote>-->
                            </div>


                        </div>
                    </aside>
                    <!-- sidebar end -->

                </div>
            </div>
        </section>
        <!-- main-container end -->


    </div>
    <!-- page-wrapper end -->


@endsection