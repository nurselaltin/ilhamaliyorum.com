<footer id="footer" class="clearfix ">

    <!-- .footer start -->
    <!-- ================ -->
    <div class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">HAKKIMIZDA</h2>
                            <div class="separator-2"></div>
                            <p>Sürekli bir öğrenme ve okuma halinde olma ,öğrendiklerini paylaşma , kendi yolunu bulmaya çalışırken yanı başındaki insanada kendi yolunu bulmasında yardım etme arzu ve isteğiyle... <a href="{{route('about.site')}}">Daha Fazla<i class="fa fa-long-arrow-right pl-1"></i></a></p>
                            <div class="separator-2"></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">EN SON YAZILAR</h2>
                            <div class="separator-2"></div>
                            <?php $sayac=0;
                            $blogs = get_blogs();
                            ?>

                            @foreach($blogs as $blog)
                            @if($sayac!=2)
                            <div class="media margin-clear">
                                <div class="d-flex pr-2">
                                    <div class="overlay-container">
                                        <img class="media-object" src="{{asset($blog->img_url)}}" alt="blog-thumb">
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading"><a href="{{route('blog.post',[Str::slug($blog->url,'-'),$blog->id])}}">{{$blog->title}}</a></h6>

                                    <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i>{{$blog->created_at}}</p>
                                </div>
                            </div>
                            <hr>
                            <?php $sayac++;?>
                            @endif
                            @endforeach
                            <div class="text-right space-top">
                                <a href="{{route('blogs')}}" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>Daha Fazla</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">YENİ KİTAP ÖNERİLERİ</h2>
                            <div class="separator-2"></div>
                            <div class="row grid-space-10">
                                <?php $sayac=0;
                                $books = get_books();
                                ?>
                                @foreach($books as $book)
                                    @if($sayac!=6))
                                        <div class="col-4 col-lg-6">
                                            <div class="overlay-container mb-10">
                                                <img src="{{asset($book->img_url)}}" alt="">
                                                <a href="{{route('book.single',[$book->url,$book->id])}}" class="overlay-link small">
                                                    <i class="fa fa-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <?php $sayac++;?>
                                    @endif
                               @endforeach
                            </div>
                            <div class="text-right space-top">
                                <a href="{{route('books')}}" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>Daha Fazla</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-content">
                            <h2 class="title">NASIL ÜYE OLABİLİRİM?</h2>
                            <div class="separator-2"></div>
                            <p>Sizde yazı,kitap ve video önerilerinde bulunmak istiyorsanız,kendinizi kısaca tanıttığınız bir mail yazarak bize ulaşınız.Farkındalığı yüksek olan her güzel insana ülke olarak ihtiyacımız var...</p>
                            <!--<ul class="social-links circle animated-effect-1">
                                <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                <li class="xing"><a target="_blank" href="http://www.xing.com"><i class="fa fa-xing"></i></a></li>
                            </ul>-->
                            <div class="separator-2"></div>
                            <ul class="list-icons">
                                <li><a href="mailto:ilhamaliyorum@gmail.com"><i class="fa fa-envelope-o pr-2"></i>ilhamaliyorum@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .footer end -->

    <!-- .subfooter start -->
    <!-- ================ -->
    <div class="subfooter">
        <div class="container">
            <div class="subfooter-inner">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">Copyright © 2020 ilhamaliyorum.com by  <a target="_blank" href="">Nursel ALTIN</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .subfooter end -->

</footer>
@include('Site.layouts.includes_scripts')
