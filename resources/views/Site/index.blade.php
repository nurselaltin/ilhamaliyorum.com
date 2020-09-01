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

               <!-- page-title end -->

               <!-- timeline grid start -->
               <!-- ================ -->
               <div class="timeline clearfix">

                  <div class="timeline-date-label clearfix">2020</div>
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
                                 <h2><a href="{{route('blog.post',[Str::slug($blog->url,'-'),$blog->id])}}">{{$blog->title}}</a></h2>
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
                                 <h2><a href="{{route('blog.post',[Str::slug($blog->url,'-'),$blog->id])}}">{{$blog->title}}</a></h2>
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

                  <div class="timeline-date-label "><a href="" class="btn radius-50 btn-default">Daha Fazla Yazı</a></div>

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
                  <div class="timeline-date-label "><a href="" class="btn radius-50 btn-default">Daha Fazla Video</a></div>




                  <br>


               </div>
               <!-- timeline grid end -->

            </div>
            <!-- main end -->

         </div>
      </div>
   </section>
   <!-- main-container end -->

@endsection