<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <title>Songgomas</title>
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/bootstrap.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/fonts/bootstrap-icons.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('styles/style.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <link rel="manifest" href="_manifest.json">
      <meta id="theme-check" name="theme-color" content="#FFFFFF">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('registrasi/app/icons/icon-192x192.png')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
        <div id="footer-bar" class="footer-bar-1 footer-bar-detached">
            <a href="{{route('activity')}}"><i class="bi bi-graph-up"></i><span>Tagihan</span></a>
            <a href="{{route('index')}}" class="circle-nav-2"><i class="fas fa-home"></i><span>Beranda</span></a>
            <a href="#"><i class="bi bi-person-circle"></i><span>Akun</span></a>
        </div>
         <div class="header-bar header-fixed header-app header-auto-show">
            <a href="#" data-back-button><i class="bi bi-chevron-left font-13"></i></a>
            <a href="#" class="header-title">Aktivasi Akun</a>
         </div>
         <div class="page-content footer-clear">
            <div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
              <div class="pt-3">
                 <div class="page-title d-flex">
                    <div class="align-self-center">
                       <a href="{{url('membership/index/home')}}" data-back-button class="me-3 ms-0 icon icon-xxs bg-theme rounded-s shadow-m">
                       <i class="bi bi-chevron-left color-theme font-14"></i>
                       </a>
                    </div>
                    <div class="align-self-center me-auto">
                       <h1 class="color-theme mb-0 font-18">Upload Bukti Transfer</h1>
                    </div>
                 </div>
              </div>
              <div class="card card-style">
                <div class="content">
                <h3>Bukti Transfer</h3>
                <p>
                  Pastikan kamu mentrasfer sejumlah nominal yang telah di tetapkan oleh kami
                  dan pastikan kamu mengikuti instruksi kami dibawah ini :
                </p>
                <ul class="ps-3">
                  <li>Gambar tidak boleh burem/blur.</li>
                  <li>Nama Rekening pemberi dan penerima hingga nominal harus terlihat jelas.</li>
                  <li>Jika syarat kedua di atas tidak terpenuhi maka kami akan memberikan informasi kepada anda.</li>
                </ul>
                    <div class="file-data">
                      <form id="fUpload" action="{{url('membership/index/storeBuktiMulti')}}" method="POST" enctype="multipart/form-data">
                      <div class="form-custom form-label form-icon mb-3">
                         <i class="bi bi-person-badge font-13"></i>
                         <select class="form-select rounded-xs" id="bankPenerima" name="bankPenerima" autocomplete="off" aria-label="Bank Penerima" placeholder="Bank Penerima">
                            <option value="" selected>Bank Penerima</option>
                             @foreach($bank as $banks)
                              <option value="{{$banks->id}}">{{$banks->bank_name}} ( {{$banks->account_number}} - {{$banks->account_name}} )</option>
                             @endforeach
                         </select>
                         <label for="c6" class="color-theme">Select an Option</label>
                         <div class="valid-feedback">Jenis Kelamin tidak boleh kosong!</div>
                      </div>

                      <img id="image-data" src="" class="img-fluid rounded-s" alt="">
                      <span class="upload-file-name d-block text-center" data-text-before="<i class='bi bi-check-circle-fill color-green-dark pe-2'></i> Image:" data-text-after=" is ready.">
                      </span>
                      <div>

                          {{csrf_field()}}
                          <input type="hidden" id="userId" name="userId" value="{{Auth::user()->id}}">
                          <input type="hidden" id="tagihanId" name="tagihanId" value="{{$tagihanId}}">
                        <input type="file" class="upload-file" id="imgBukti" name="imgBukti">
                        <p href="#" class="text-uppercase rounded-s upload-file-text text-center ">Tap Untuk Ambil Gambar</p>
                        <div class="divider mb-0"></div>
                      </form>
                      </div>
                      <div class="content">
                         <div class="col-md-12">
                            <a id="btnSimpan" href="#" class="btn btn-full bg-blue-dark shadow-bg-m text-center">Simpan</a>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
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

        $('#btnSimpan').on('click', function(){

          if($('#bankPenerima').val() == "") {

            $.confirm({
              title: 'Informasi',
              content: 'Harap Memilih Bank Penerima',
              buttons: {
                ok: function() {},
              }
            });
          }

          else if($('#imgBukti').val() == "") {

            $.confirm({
              title: 'Informasi',
              content: 'Harap Melampirkan Bukti Transfer',
              buttons: {
                ok: function() {},
              }
            });
          }else{

            $('#fUpload').submit();
          }



        });
      </script>
   </body>
