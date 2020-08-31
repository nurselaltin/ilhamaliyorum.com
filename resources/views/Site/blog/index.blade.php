@extends('Site.layouts.master')
@section('content')

    <!-- main-container start -->
    <!-- ================ -->
    <section class="main-container">

        <div class="container">
            <div class="row">

                <!-- main start -->
                <!-- ================ -->
                <div class="main col-12">

                    <!-- page-title start -->
                    <!-- ================ -->

                    <div class="separator-2"></div>
                    <!-- page-title end -->

                    <!-- timeline grid start -->
                    <!-- ================ -->
                    <div class="timeline clearfix">

                        <div class="timeline-date-label clearfix">2020 YAZILAR</div>

                    <?php $index = 2;?>
                    @foreach($blogs as $blog)
                        @if($index%2 == 0)
                            <!-- timeline grid item start -->
                                <div class="timeline-item">
                                    <!-- blogpost start -->
                                    <article class="blogpost shadow-2 light-gray-bg bordered">
                                        <div class="">

                                            <img src="{{$blog->img_url}}" alt="">

                                        </div>
                                        <header>
                                            <h2><a href="{{route('blog.post',[$blog->writer_id,$blog->id])}}">{{$blog->title}}</a></h2>
                                            <div class="post-info">
                                            <span class="post-date">
                                              <i class="icon-calendar"></i>
                                              <span class="day">{{$blog->created_at->diffForHumans()}}</span>

                                            </span>
                                                <span class="submitted"><i class="icon-user-1"></i><a href="">{{$blog->writer_fullname}}</a></span>
                                                <!--<span class="comments"><i class="icon-chat"></i> <a href="#"></a></span>-->
                                            </div>
                                        </header>
                                        <div class="blogpost-content">
                                            <p>{{$blog->description}}</p>
                                        </div>
                                        <footer class="clearfix">
                                            <div class="tags pull-left"><i class="icon-tags"></i>
                                                <a>{{$blog->category}}</a></div>
                                            <div class="link pull-right"><i class="icon-link"></i><a href="">Daha Fazla Oku</a></div>
                                        </footer>
                                    </article>
                                    <!-- blogpost end -->
                                </div>
                                <!-- timeline grid item end -->
                        @else
                            <!-- timeline grid item start -->
                                <div class="timeline-item pull-right">
                                    <!-- blogpost start -->
                                    <article class="blogpost shadow-2 light-gray-bg bordered">
                                        <div class="">

                                            <img src="{{$blog->img_url}}" alt="">

                                        </div>
                                        <header>
                                            <h2><a href="">{{$blog->title}}</a></h2>
                                            <div class="post-info">
                                            <span class="post-date">
                                              <i class="icon-calendar"></i>
                                              <span class="day">{{$blog->created_at->diffForHumans()}}</span>

                                            </span>
                                                <span class="submitted"><i class="icon-user-1"></i><a href="">{{$blog->writer_fullname}}</a></span>
                                                <!--<span class="comments"><i class="icon-chat"></i> <a href="#"></a></span>-->
                                            </div>
                                        </header>
                                        <div class="blogpost-content">
                                            <p>{{$blog->description}}</p>
                                        </div>
                                        <footer class="clearfix">
                                            <div class="tags pull-left"><i class="icon-tags"></i>
                                                <a>{{$blog->category}}</a></div>
                                            <div class="link pull-right"><i class="icon-link"></i><a href="">Daha Fazla Oku</a></div>
                                        </footer>
                                    </article>
                                    <!-- blogpost end -->
                                </div>
                                <!-- timeline grid item end -->
                        @endif
                            <?php $index++;?>
                    @endforeach

                    </div>
                    <!-- timeline grid end -->

                </div>
                <!-- main end -->

            </div>
        </div>
    </section>
    <!-- main-container end -->


@endsection