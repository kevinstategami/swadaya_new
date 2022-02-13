<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>Songgo Mas</title>
        <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('registrasi/fonts/bootstrap-icons.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('styles/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
        <meta id="theme-check" name="theme-color" content="#FFFFFF" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('registrasi/app/icons/icon-192x192.png')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="{{asset('registrasi/mobView/css/style_home.css')}}">
    </head>

    <body class="theme-light">
        <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

        <div id="page">
            <div class="page-content footer-clear">
              @yield('content')
            </div>

            <div class="jajal-footer">
                <div id="footer-bar" class="footer-bar-1 footer-bar-detached">
                    <a href="{{route('activity')}}"><i class="bi bi-graph-up"></i><span>Transaksi</span></a>
                    <a href="{{route('index')}}" class="circle-nav-2"><i class="fas fa-home"></i><span>Beranda</span></a>
                    <a href="{{route('indexAkun')}}"><i class="bi bi-person-circle"></i><span>Akun</span></a>
                </div>
            </div>
        </div>

        <script src="{{asset('registrasi/scripts/bootstrap.min.js')}}"></script>
        <script src="{{asset('registrasi/scripts/jquery.min.js')}}"></script>
        <script src="{{asset('registrasi/scripts/jquery-confirm.min.js')}}"></script>
        <script src="{{asset('registrasi/scripts/custom.js')}}"></script>
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
