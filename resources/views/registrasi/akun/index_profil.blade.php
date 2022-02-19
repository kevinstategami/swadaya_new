<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <title>Songgo Mas</title>
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/bootstrap.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/fonts/bootstrap-icons.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('styles/style.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <meta id="theme-check" name="theme-color" content="#FFFFFF">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('registrasi/app/icons/icon-192x192.png')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/mobView/css/style_home.css')}}">
      <!-- <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/newStyles.css')}}" /> -->
      </head>
   <body class="theme-light">
      <div id="preloader">
         <div class="spinner-border color-highlight" role="status"></div>
      </div>
      <div id="page">
        <div id="footer-bar" class="footer-bar-1 footer-bar-detached">
            <a href="{{route('activity')}}"><i class="bi bi-graph-up"></i><span>Transaksi</span></a>
            <a href="{{route('index')}}" class="circle-nav-2"><i class="fas fa-home"></i><span>Beranda</span></a>
            <a href="{{route('indexAkun')}}"><i class="bi bi-person-circle"></i><span>Akun</span></a>
        </div>
         <div class="header-bar header-fixed header-app header-auto-show">
            <a href="{{route('index')}}" data-back-button><i class="bi bi-chevron-left font-13"></i></a>
            <a href="{{route('indexAkun')}}" class="header-title">Profil Anggota</a>
         </div>
         <div class="page-content footer-clear">
            <div class="pt-3">
               <div class="page-title d-flex">
                  <div class="align-self-center">
                     <a href="{{url('membership/index/home')}}" data-back-button class="me-3 ms-0 icon icon-xxs bg-theme rounded-s shadow-m">
                     <i class="bi bi-chevron-left color-theme font-14"></i>
                     </a>
                  </div>
                  <div class="align-self-center me-auto">
                     <h1 class="color-theme mb-0 font-18">Profil Anggota</h1>
                  </div>
               </div>
            </div>
            <div class="card card-style">
               <div class="content">
                  <div class="alert bg-fade2-blue alert-dismissible color-blue-dark rounded-s fade show pe-2" role="alert">
                     <strong>Note:</strong> Ganti data - data kamu dengan benar dan sesuai dengan data diri yang valid.
                  </div>
                  <form class="demo-animation needs-validation m-0" novalidate enctype="multipart/form-data" action="{{url('membership/index/storeChangeProfile')}}" method="POST" id="fAktivasi">
                    {{csrf_field()}}
                    <div class="divider mb-0"></div><br>
                    @if($member->path_foto == "")
                    <img src="{{asset('public/user-images/default.png')}}" id="foto" alt="img" width="180" class="mx-auto rounded-circle mb-3 shadow-l">
                    @else
                    <img src="{{url($member->path_foto)}}" id="foto" alt="img" width="180" class="mx-auto rounded-circle mb-3 shadow-l">
                    @endif

                    <input type="file" class="upload-file" id="image" name="fotoProfil"accept="image/*">
                    <div style="text-align:center" class="mb-3">
                      <p class="btn btn-s text-uppercase font-700 rounded-s upload-file-text bg-yellow-dark">Ganti Foto</p>
                    </div>
                    <input type="hidden" value="{{Auth::user()->id}}" name="userId" id="userId">

                    <div class="form-custom form-label form-icon mb-3">
                       <i class="bi bi-person-circle font-12"></i>
                       <input type="text" class="form-control rounded-xs" value="{{$member->fullname}}" id="namaLengkap" autocomplete="off" name="namaLengkap" placeholder="Nama Lengkap" pattern="" required />
                       <label for="c3" class="color-theme">Nama Lengkap</label>
                       <div class="valid-feedback"></div>
                       <div class="invalid-feedback">Nama Lengkap tidak boleh kosong!</div>
                    </div>
                    <div class="form-custom form-label form-icon mb-3">
                       <i class="bi bi-at font-12"></i>
                       <input type="text" class="form-control rounded-xs" value="{{$member->email}}" readonly id="emails" autocomplete="off" name="emails" placeholder="Email" pattern="" required />
                       <label for="c3" class="color-theme">Email</label>
                       <div class="valid-feedback"></div>
                       <div class="invalid-feedback">Email tidak boleh kosong!</div>
                       <input type="hidden" value="{{$member->username}}" id="usrnm">
                    </div>
                    <div class="form-custom form-label form-icon mb-3">
                       <i class="bi bi-telephone-fill font-12"></i>
                       <input type="text" class="form-control rounded-xs" id="notelp" value="{{$member->phone_no}}" autocomplete="off" name="notelp" placeholder="No. Telepon" pattern="" required />
                       <label for="c3" class="color-theme">No. Telepon</label>
                       <div class="valid-feedback"></div>
                       <div class="invalid-feedback">No. Telepon tidak boleh kosong!</div>
                    </div>
                    <div class="form-custom form-label form-icon mb-3">
                       <i class="bi bi-asterisk font-12"></i>
                       <input type="text" class="form-control rounded-xs" id="identityNo" value="{{$member->identity_no}}" autocomplete="off" name="identityNo" placeholder="NIK" pattern="" required />
                       <label for="c3" class="color-theme">NIK</label>
                       <div class="valid-feedback"></div>
                       <div class="invalid-feedback">NIK tidak boleh kosong!</div>
                    </div>
                    <div class="form-custom form-label form-icon mb-3">
                       <i class="bi bi-upc-scan font-12"></i>
                       <input type="text" class="form-control rounded-xs" id="referalCode" readonly value="{{$code}}" autocomplete="off" name="referalCode" placeholder="Kode Referal" pattern="" required />
                       <label for="c3" class="color-theme">Kode Referal</label>
                       <div class="valid-feedback"></div>
                       <div class="invalid-feedback">NIK tidak boleh kosong!</div>
                    </div>
                  </form>
                  <div class="content">
                     <div class="col-md-12">
                        <a id="btnSimpan" href="#" class="btn btn-full bg-blue-dark shadow-bg-m text-center">Simpan</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="{{asset('registrasi/scripts/bootstrap.min.js')}}"></script>
      <!-- jQuery -->
      <script src="{{asset('template/admin/plugins/jquery/jquery.min.js')}}"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="{{asset('template/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('registrasi/scripts/jquery-confirm.min.js')}}"></script>
      <script src="{{asset('registrasi/scripts/custom.js')}}"></script>
      <script src="{{asset('registrasi/scripts/jstnumber.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script>

          $(document).ready(function() {
            $('select.select2').select2({
                theme: 'bootstrap'
            });
        });

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

        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#foto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });

        $('#btnSimpan').on('click', function(){
            if($('#namaLengkap').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Password Sebelumnya tidak boleh kosong!',
              });
            }
            else if($('#emails').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Email Sebelumnya tidak boleh kosong!',
              });
            }
            else if($('#notelp').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Telepon Sebelumnya tidak boleh kosong!',
              });
            }
            else if ($('#identityNo').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Nomor Identitas tidak boleh kosong!',
              });
            }
            else{

              $('#fAktivasi').submit();


            }

        });
      </script>
   </body>
