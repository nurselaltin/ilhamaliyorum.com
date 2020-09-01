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
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">

                            <div class="separator"></div>
                        </div>
                    </div>

                    <!-- page-title end -->

                    <!-- timeline grid start -->
                    <!-- ================ -->
                    <div class="timeline clearfix">
                        <div class="timeline-date-label clearfix">2020 ÖNERİLER</div>
                    <?php $index = 2;?>

                        @foreach($videos as $video)
                            @if($index%2 == 0)
                        <!-- timeline grid item start -->
                            <div class="  timeline-item  isotope-item {{get_category_title($video->category)}}">
                                <!-- blogpost start -->

                                <article class="blogpost shadow-2 light-gray-bg bordered object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560"
                                                height="315"
                                                src="https://www.youtube.com/embed/{{$video->url}}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>

                                        </iframe>
                                    </div>
                                    <header>
                                        <h2><a href="blog-post.html">{{$video->title}}</a></h2>
                                        <div class="post-info">
                                        <span class="post-date">
                                          <i class="icon-calendar"></i>
                                          <span class="day">{{$video->createdAt}}</span>

                                        </span>
                                            <span class="submitted"><a href=""><i class="icon-user-1"></i>{{$video->writer_fullname}}</a>  önerdi</span>
                                        </div>
                                    </header>
                                    <div class="blogpost-content">
                                        <p>{{$video->description}}</p>
                                    </div>
                                    <footer class="clearfix">
                                        <div class="tags pull-left"><i class="icon-tags"></i>
                                            {{get_category_title($video->category)}}
                                        </div>

                                    </footer>
                                </article>
                                <!-- blogpost end -->
                            </div>
                            <!-- timeline grid item end -->
                       @else
                        <!-- timeline grid item start -->
                            <div class="timeline-item pull-right">
                                <!-- blogpost start -->
                                <article class="blogpost shadow-2 light-gray-bg bordered object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560"
                                                height="315"
                                                src="https://www.youtube.com/embed/{{$video->url}}"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen>

                                        </iframe>
                                    </div>
                                    <header>
                                        <h2><a href="blog-post.html">{{$video->title}}</a></h2>
                                        <div class="post-info">
                                        <span class="post-date">
                                          <i class="icon-calendar"></i>
                                          <span class="day">{{$video->createdAt}}</span>

                                        </span>
                                            <span class="submitted"><a href=""><i class="icon-user-1"></i>{{$video->writer_fullname}}</a>  önerdi</span>
                                        </div>
                                    </header>
                                    <div class="blogpost-content">
                                        <p>{{$video->description}}</p>
                                    </div>
                                    <footer class="clearfix">
                                        <div class="tags pull-left"><i class="icon-tags"></i>
                                            {{get_category_title($video->category)}}
                                        </div>

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