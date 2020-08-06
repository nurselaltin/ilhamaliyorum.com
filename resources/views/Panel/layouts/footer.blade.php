<!-- Bootstrap core JavaScript-->
<script src="{{asset('AdminPage')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('AdminPage')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('AdminPage')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('AdminPage')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{{asset('AdminPage')}}/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{{asset('AdminPage')}}/js/demo/chart-area-demo.js"></script>
<script src="{{asset('AdminPage')}}/js/demo/chart-pie-demo.js"></script>
@jquery
@toastr_js
@toastr_render
@yield('js');
</body>

</html>