<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title>Songgomas | Backoffice</title>
  <?php
      $cmsLogo = (new App\Http\Controllers\CMS\LogoController)->index();
  ?>
  <link rel="shortcut icon" href="{{ !$cmsLogo['llg'] || !$cmsLogo['llg']['dokumen']  ? asset('img/logo.png') : url('images/'.$cmsLogo['llg']->dokumen->path) }}">

  @include('backoffice.layouts.comp.css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ !$cmsLogo['llg'] || !$cmsLogo['llg']['dokumen']  ? asset('img/logo.png') : url('images/'.$cmsLogo['llg']->dokumen->path) }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('backoffice.layouts.comp.nav')
  @include('backoffice.layouts.comp.aside')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">  
    @yield('content')  
  </div>
  <!-- /.content-wrapper -->
  @include('backoffice.layouts.comp.footer')
</div>
<!-- ./wrapper -->

@include('backoffice.layouts.comp.script')
@yield('script')
</body>
</html>
