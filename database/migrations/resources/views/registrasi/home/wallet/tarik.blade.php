<!DOCTYPE HTML>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
      <title>Swadaya Utama</title>
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/bootstrap.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/fonts/bootstrap-icons.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('styles/style.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('registrasi/styles/jquery-confirm.min.css')}}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
      <link rel="manifest" href="_manifest.json">
      <meta id="theme-check" name="theme-color" content="#FFFFFF">
      <link rel="apple-touch-icon" sizes="180x180" href="{{asset('registrasi/app/icons/icon-192x192.png')}}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
   </head>
   <body class="theme-light">
      <div id="preloader">
         <div class="spinner-border color-highlight" role="status"></div>
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
            <div class="pt-3">
               <div class="page-title d-flex">
                  <div class="align-self-center">
                     <a href="{{url('membership/index/home')}}" data-back-button class="me-3 ms-0 icon icon-xxs bg-theme rounded-s shadow-m">
                     <i class="bi bi-chevron-left color-theme font-14"></i>
                     </a>
                  </div>
                  <div class="align-self-center me-auto">
                     <h1 class="color-theme mb-0 font-18">Tarik Saldo</h1>
                  </div>
               </div>
            </div>
            <div class="card card-style">
              <div class="content">
              <!-- <h3>Tarik Saldo</h3> -->
              <p>
                Pastikan anda tidak meminta semua saldo untuk di masukan ke dalam dompet, anda harus memperhatikan bahwa ada saldo mengendap yang sudah ditetapkan di awal.
              </p>
              <!-- <ul class="ps-3">
                <li>Gambar tidak boleh burem/blur.</li>
                <li>Nama Rekening pemberi dan penerima hingga nominal harus terlihat jelas.</li>
                <li>Jika syarat kedua di atas tidak terpenuhi maka kami akan memberikan informasi kepada anda.</li>
              </ul> -->
                  <div class="file-data">
                    <form id="fUpload" action="{{url('membership/index/tarik-saldo-store')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="form-custom form-label form-icon">
                         <i class="bi bi-code-square font-14"></i>
                         <input type="number" class="form-control rounded-xs" name="jmlPenarikan" id="jmlPenarikan" placeholder="150.000" style=""/>
                         <label for="c43" class="form-label-always-active color-highlight font-11">Jumlah Penarikn</label>
                         <span class="font-10">( IDR )</span>
                      </div>

                    <img id="image-data" src="" class="img-fluid rounded-s" alt="">
                    <span class="upload-file-name d-block text-center" data-text-before="<i class='bi bi-check-circle-fill color-green-dark pe-2'></i> Image:" data-text-after=" is ready.">
                    </span>
                  </form>
                    <div class="content">
                       <div class="col-md-12">
                          <a id="btnSimpan" href="#" class="btn btn-full bg-blue-dark shadow-bg-m text-center">Kirim</a>
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

          if($('#jmlPenarikan').val() == "") {

            $.confirm({
              title: 'Informasi',
              content: 'Harap memasukan nominalp penarikan',
              buttons: {
                ok: function() {},
              }
            });
          }else{
            // var ktp = $('#imgBukti').val();
            // var FileSize = ktp.files[0].size / 1024 / 1024;
            //
            //   if(FileSize > 2) {
            //     $.confirm({
            //     title: 'Informasi',
            //     content: 'Ukuran gambar tidak boleh melebihi dari 2MB',
            //     buttons: {
            //       ok: function() {$('#imgBukti').val('');},
            //     }
            //   });
            // } else{
            //
            // }

            $('#fUpload').submit();
          }



        });
      </script>
   </body>
