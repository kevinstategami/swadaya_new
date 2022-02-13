<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <title>Songgo Mas</title>
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/bootstrap.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/fonts/bootstrap-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <meta id="theme-check" name="theme-color" content="#FFFFFF">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('registrasi/app/icons/icon-192x192.png')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/mobView/css/style.css')}}">
   </head>
   <body class="theme-light">
      <div id="preloader">
         <div class="spinner-border color-highlight" role="status"></div>
      </div>
      <div class="header">
        <div class="subhead">
          <img src="{{asset('registrasi/mobView/images/logo-white.png')}}" class="logo-left" alt="">
        </div>
      </div>
      <div id="page">
         <div class="page-content my-0 py-0">
             <div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
                <form action="{{url('membership/auth/store')}}" id="fRegistrasi" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}
                <!-- <h1 class="font-30 font-800 mb-0">Swamiqoe</h1> -->
                <div class="col-md-12 text-center">
                  <h1 for="c1" class="color-theme" style="color:#2196f3">Registrasi Akun</h1>
                </div>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                   <i class="fas fa-user font-13"></i>
                   <input type="text" class="form-control rounded-xs" id="fullName" autocomplete="off" name="fullName" placeholder="Nama Lengkap" />
                   <label for="username" class="color-theme">Nama Lengkap</label>
                </div>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                   <i class="fas fa-at font-13"></i>
                   <input type="text" class="form-control rounded-xs" id="username" autocomplete="off" name="username" placeholder="Username" />
                   <label for="username" class="color-theme">Username</label>
                </div>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                   <i class="fas fa-envelope font-16"></i>
                   <input type="email" class="form-control rounded-xs" id="email" autocomplete="off" name="email" placeholder="Alamat Email" />
                   <label for="email" class="color-theme">Email</label>
                </div>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                   <i class="fas fa-key font-13"></i>
                   <input type="password" class="form-control rounded-xs" id="password" autocomplete="off" name="password" placeholder="Password" />
                   <label for="password" class="color-theme">Password</label>
                </div>
                <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                   <i class="far fa-id-badge font-13"></i>
                   <input type="text" class="form-control rounded-xs" id="referalCode" autocomplete="off" name="referalCode" placeholder="Kode Referal" value="{{$referalCode}}" />
                   <label for="username" class="color-theme">Kode Referal</label>
                </div>
                </form>
                <div class="form-check form-check-custom">
                   <input class="form-check-input" type="checkbox" name="type" value="" id="c3a">
                   <label class="form-check-label font-12" for="c3a" onclick="showPwd()">Lihat Sandi</label>
                   <i class="is-checked color-highlight font-13 fas fa-circle"></i>
                   <i class="is-unchecked color-highlight font-13 far fa-circle"></i>
                </div>
                <div class="form-check form-check-custom" id="fCheck">
                   <input class="form-check-input" type="checkbox" name="terms" value="" id="c2a">
                   <label class="form-check-label font-12" for="c2a">Saya setuju dengan 
                    <a href="{{route('registrasiTermCondition')}}" target="_blank">Ketentuan dan Kebijakan</a>.</label>
                   <i class="is-checked color-highlight font-13 fas fa-circle"></i>
                   <i class="is-unchecked color-highlight font-13 far fa-circle"></i>
                </div>

                <a href="#" id="btnSimpan" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4">Daftar</a>
                <input type="hidden" value="0" id="tCheck">
                <div class="row">

                   <!-- <div class="col-6 text-start">
                      <a href="{{route('login')}}" class="font-11 color-theme opacity-40 pt-4 d-block">Masuk sebagai Admin?</a>
                   </div> -->
                   <div class="col-12 text-end">
                      <a href="{{url('membership/auth/login')}}" class="font-11 color-theme opacity-40 pt-4 d-block">Login</a>
                   </div>
                </div>

             </div>
            <!-- <div class="card">
               <div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
            </div> -->
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


      $('#c2a').on('change', function(){
        if($('#tCheck').val() == "0"){
          $('#tCheck').val("1")
        }else{
          $('#tCheck').val("0")
        }
      });

      function showPwd() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      $(document).ready(function() {


        if($('#referalCode').val() ==""){
          $('#referalCode').removeAttr('readonly')
        }else{
          $('#referalCode').attr('readonly', 'readonly')
        }


        });

        $('#btnSimpan').on('click', function(){

          if($('#username').val() == ""){

            $.alert({
                title: 'Informasi!',
                content: 'Username tidak boleh kosong!',
            });

          }
          else if($('#email').val() == ""){

            $.alert({
                title: 'Informasi!',
                content: 'Email tidak boleh kosong!',
            });

          } else if($('#password').val() == ""){

            $.alert({
                title: 'Informasi!',
                content: 'Password tidak boleh kosong!',
            });

          } else if($('#tCheck').val() == "0"){

            $.alert({
                title: 'Informasi!',
                content: 'Harap Menyetujui S&K yang berlaku!',
            });

          }
          else{

            $.ajax({
              url: "{!! url('membership/auth/check-account') !!}/" + $('#email').val() + "/" + $('#username').val(),
              data: {},
              dataType: "json",
              type: "get",
                success:function(data)
                  {
                    if(data[0]['status']=="avail"){
                      $.confirm({
                          title: 'Informasi',
                          content: "Username atau Email sudah digunakan!",
                          buttons: {
                              ok: function () {
                              },
                          }
                      });
                    }else{
                      if($('#referalCode').val() == ""){
                        $.confirm({
                            title: 'Informasi',
                            content: "Apakah anda yakin mendaftar tanpa kode referal ?",
                            buttons: {
                                ok: function () {
                                  $('#fRegistrasi').submit();
                                },
                                cancel: function () {

                                }
                            }
                        });
                      }else{
                        $('#fRegistrasi').submit();
                      }
                    }
                  }
            });

          }

        });

      </script>
   </body>
