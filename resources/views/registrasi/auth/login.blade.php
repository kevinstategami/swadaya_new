<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <title>Swadaya Utama</title>
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/bootstrap.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/fonts/bootstrap-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <meta id="theme-check" name="theme-color" content="#FFFFFF">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('registrasi/app/icons/icon-192x192.png')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   </head>
   <body class="theme-light">
      <div id="preloader">
         <div class="spinner-border color-highlight" role="status"></div>
      </div>
      <div id="page">
         <div class="page-content my-0 py-0">
            <div class="card card-fixed">
               <div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
                 <div class="col-md-12 text-center">
                   <h1 for="c1" class="color-theme" style="color:#2196f3">Login</h1>
                 </div>
                 <form action="{{url('membership/auth/login/store')}}" id="fLogin" method="POST" enctype="multipart/form-data">
                   {{csrf_field()}}
                  <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                     <i class="fas fa-at font-13"></i>
                     <input type="text" class="form-control rounded-xs" id="username" name="username" autocomplete="off" placeholder="Username" />
                     <label for="c1" class="color-theme">Username</label>
                  </div>
                  <div class="form-custom form-label form-border form-icon mb-4 bg-transparent">
                     <i class="fas fa-key font-13"></i>
                     <input type="password" class="form-control rounded-xs" id="password" name="password" autocomplete="off" placeholder="Password" />
                     <!-- <i class="far fa-eye font-13" style="cursor:pointer" id="mata"></i> -->
                     <label for="c2" class="color-theme">Password</label>
                  </div>
                  <div class="form-check form-check-custom">
                     <input class="form-check-input" type="checkbox" name="type" value="" id="c2a">
                     <label class="form-check-label font-12" for="c2a" onclick="showPwd()">Lihat Sandi</label>
                     <i class="is-checked color-highlight font-13 fas fa-circle"></i>
                     <i class="is-unchecked color-highlight font-13 far fa-circle"></i>
                  </div>
                </form>
                  <a href="#" id="btnLogin" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4">Login Akun</a>
                  <div class="row">
                     <div class="col-6 text-left">
                        <a href="{{url('membership/auth/forgot-password')}}" class="font-11 color-theme opacity-40 pt-4 d-block">Lupa Password ?</a>
                     </div>
                     <!-- <div class="col-4 text-start">
                        <a href="{{route('login')}}" class="font-11 color-theme opacity-40 pt-4 d-block">Masuk sebagai Admin?</a>
                     </div> -->
                     <div class="col-6 text-end">
                        <a href="{{url('membership/auth/registrasi')}}" class="font-11 color-theme opacity-40 pt-4 d-block">Registrasi</a>
                     </div>
                  </div>
               </div>
               <div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
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

      function showPwd() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      // $('#mata').on('click', function(){
      //
      //   $('#matas').css('display','block')
      //   $('#mata').css('display','none')
      //   showPwd()
      // });
      // $('#matas').on('click', function(){
      //   $('#matas').css('display','none')
      //   $('#mata').css('display','block')
      //   showPwd()
      // });

      $('#btnLogin').on('click', function(){
          if($('#username').val() ==""){
            $.alert({
                title: 'Informasi!',
                content: 'Username tidak boleh kosong!',
            });
          }else if($('#password').val() == ""){
            $.alert({
                title: 'Informasi!',
                content: 'Password tidak kosong!',
            });
          }else{
            $('#fLogin').submit();
          }
      });


      </script>
   </body>
