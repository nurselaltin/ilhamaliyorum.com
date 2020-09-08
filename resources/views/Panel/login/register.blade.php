
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ihamaliyorum.com</title>

    <script src="https://www.google.com/recaptcha/api.js?hl=tr" async defer></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('SitePage')}}/images/owl.png">
    <!-- Custom fonts for this template-->
    <link href="{{asset('AdminPage/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('AdminPage/')}}/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('AdminPage/')}}/css/sb-admin-2.min.css" rel="stylesheet">
    @toastr_css

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Hesap Oluştur!</h1>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="user" action="{{route('register.member')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" name="fullname" placeholder="Ad Soyad">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email ">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Şifre">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" name="re_password" placeholder="Şifre Tekrar">
                                </div>
                            </div>

                            <hr>
                            <div class="g-recaptcha" name="sitekey" data-sitekey="6Lf7U8kZAAAAAChTWxyb_x47asc5_jv1CEScLi8G"></div>
                            <hr>


                            <button type="submit"  class="btn btn-primary btn-user btn-block">
                                Kayıt Ol
                            </button>
                            <hr>
                            <!--
                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>

                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                            -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{route('login.page')}}">Hesabın mı var? Giriş Yap</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('AdminPage/')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('AdminPage/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('AdminPage/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('AdminPage/')}}/js/sb-admin-2.min.js"></script>
@jquery
@toastr_js
@toastr_render
</body>

</html>


