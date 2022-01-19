<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php
      $cmsLogo = (new App\Http\Controllers\CMS\LogoController)->index();
  ?>
  <link rel="shortcut icon" href="{{ !$cmsLogo['llg'] || !$cmsLogo['llg']['dokumen']  ? asset('img/logo.png') : url('images/'.$cmsLogo['llg']->dokumen->path) }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Swadaya Utama | Masuk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('/')}}"><img src="{{ !$cmsLogo['lg'] || !$cmsLogo['lg']['dokumen']  ? asset('img/Logo-KJMSU-Rev-02.png') : url('images/'.$cmsLogo['lg']->dokumen->path) }}" width="200px" alt="logo"></a>
    </div>
    <!-- /.login-logo -->
    @yield('content')
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{asset('template/admin/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('template/admin/dist/js/adminlte.min.js')}}"></script>
      <script src="{{asset('registrasi/scripts/jquery-confirm.min.js')}}"></script>
  <script src="{{asset('js/sweetalert.js')}}"></script>
  <script>
    @if(count($errors) > 0 || Session::has('success') || Session::has('info') || Session::has('warning'))
    $.confirm({
      title: '{{Session::get('info')}}',
      content: '{{Session::get('alert')}}',
      type: '{{Session::get('colors')}}',
      icon: '{{Session::get('icons')}}',
      typeAnimated: true,
      buttons: {
        close: function () {
        }
      }
    });
    @endif
  </script>
  @yield('script')
</body>
</html>
