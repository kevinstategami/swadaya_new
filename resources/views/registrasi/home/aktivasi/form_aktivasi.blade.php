<!DOCTYPE HTML>

<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
  $isMobile = true;  
} else {
    $isMobile = false;
}
?>
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
      </head>
   <body class="theme-light">
      <div id="preloader">
         <div class="spinner-border color-highlight" role="status"></div>
      </div>
      <div id="page">
        <div id="footer-bar" class="footer-bar-1 footer-bar-detached">
            <a href="{{route('activity')}}"><i class="bi bi-graph-up"></i><span>Tagihan</span></a>
            <a href="{{route('index')}}" class="circle-nav-2"><i class="fas fa-home"></i><span>Beranda</span></a>
            <a href="{{route('indexAkun')}}"><i class="bi bi-person-circle"></i><span>Akun</span></a>
        </div>
         <div class="header-bar header-fixed header-app header-auto-show">
            <a href="{{route('index')}}" data-back-button><i class="bi bi-chevron-left font-13"></i></a>
            <a href="{{route('index')}}" class="header-title">Aktivasi Akun</a>
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
                     <h1 class="color-theme mb-0 font-18">Aktivasi Akun</h1>
                  </div>
               </div>
            </div>
            <div class="card card-style">
               <div class="content">
                  <div class="alert bg-fade2-blue alert-dismissible color-blue-dark rounded-s fade show pe-2" role="alert">
                     <strong>Note:</strong> Setelah melakukan pengisian data kamu diwajibkan untuk membayar deposit simpanan awal dengan minimal setoran <b>{{number_format($simpananPokok->deposit_min, 0, '.', '.')}}
                     </b>ribu,dan kamu juga diwajibkan mengisi form simpanan wajib dengan jangka yang bisa kamu tentukan.
                  </div>
                  <form class="demo-animation needs-validation m-0" novalidate action="{{url('membership/index/storeAktivasi')}}" method="POST" id="fAktivasi">
                    {{csrf_field()}}
                    <div class="divider mb-0"></div><br>
                    <label class="control-label font-16">Data Member</label>
                    <input type="hidden" value="{{Auth::user()->id}}" name="userId" id="userId">
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-person-circle font-14"></i>
                        <input type="text" class="form-control rounded-xs" id="namaLengkap" autocomplete="off" name="namaLengkap" value="{{Auth::user()->name}}" disabled placeholder="" pattern="[A-Za-z ]{1,32}" required />
                        <label for="c1" class="color-theme">Nama Lengkap</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Nama Lengkap tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-at font-16"></i>
                        <input type="email" class="form-control rounded-xs" id="email" readonly autocomplete="off" name="email" placeholder="budi@swadayautama.id" value="{{Auth::user()->email}}" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                        <label for="c2" class="color-theme">Email</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Email tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-asterisk font-12"></i>
                        <input type="text" class="form-control rounded-xs" id="noKtp" name="noKtp" onkeypress="return justnumber(event, false)" autocomplete="off" placeholder="No. KTP" maxlength="16" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" required />
                        <label for="c2a" class="color-theme">No. KTP</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">No KTP tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-telephone-fill font-12"></i>
                        <input type="text" class="form-control rounded-xs" id="telepon" name="telepon" onkeypress="return justnumber(event, false)" autocomplete="off" placeholder="Telepon" pattern="[+ 0-9]{10,15}" required />
                        <label for="c3" class="color-theme">Telepon</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Telepon tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-people font-13"></i>
                        <select class="form-select rounded-xs" id="jenisKelamin" name="jenisKelamin" autocomplete="off" aria-label="Jenis Kelamin" placeholder="Kota Tinggal">
                           <option value="" selected disabled>Jenis Kelamin</option>
                           <option value="L">Laki - Laki</option>
                           <option value="P">Perempuan</option>
                        </select>
                        <label for="c6" class="color-theme">Select an Option</label>
                        <div class="valid-feedback">Jenis Kelamin tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-shop-window font-12"></i>
                        <input type="text" class="form-control rounded-xs" id="tempatLahir" autocomplete="off" name="tempatLahir" placeholder="Tempat Lahir" pattern="" required />
                        <label for="c3" class="color-theme">Tempat Lahir</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Tempat Lahir tidak boleh kosong!</div>
                     </div>
                     @if($isMobile)
                     <div class="form-label form-icon mb-3">
                        <input type="date" class="form-control rounded-xs" id="ttl" name="ttl" min="1900-01-01" value="2021-01-01" />
                        <label for="c5" class="color-theme">Tanggal Lahir</label>
                        <div class="valid-feedback">Tanggal Lahir tidak boleh kosong!</div>
                     </div>
                     @else
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-calendar font-12"></i>
                        <input type="date" class="form-control rounded-xs" id="ttl" name="ttl" min="1900-01-01" value="2021-01-01" />
                        <label for="c5" class="color-theme">Tanggal Lahir</label>
                        <div class="valid-feedback">Tanggal Lahir tidak boleh kosong!</div>
                     </div>
                     @endif
                     <div class="form-label form-icon mb-3">
                       <!-- <i class="bi bi-building font-13"></i> -->
                        <select class="form-control rounded-xs select2" id="kota" name="kota" aria-label="Kota Tinggal" placeholder="Kota Tinggal">
                           <option value="" selected>Kota Tinggal</option>
                           @foreach($city as $kota)
                           <option value="{{$kota->id}}">{{$kota->nama}}</option>
                           @endforeach
                        </select>
                        <label for="c6" class="color-theme">Select an Option</label>
                        <div class="valid-feedback">Kota Tinggal tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-mailbox font-12"></i>
                        <input type="text" class="form-control rounded-xs" id="kodePos" name="kodePos" onkeypress="return justnumber(event, false)" placeholder="Kode Pos" />
                        <label for="c5" class="color-theme">Kode Pos</label>
                        <div class="valid-feedback">Kode Pos tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-pencil-fill font-12"></i>
                        <textarea class="form-control rounded-xs" placeholder="Alamat Lengkap" id="alamat" name="alamat"></textarea>
                        <label for="c7" class="color-theme">Alamat</label>
                        <div class="valid-feedback">Alamat tidak boleh kosong!</div>
                     </div>

                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-person-badge font-12"></i>
                        <input type="text" class="form-control rounded-xs" id="accountName" name="accountName" placeholder="Nama Akun Bank" />
                        <label for="c5" class="color-theme">Nama Akun Bank</label>
                        <div class="valid-feedback">Kode Pos tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-building font-12"></i>
                        <select type="text" class="form-control rounded-xs" id="bankName" name="bankName" placeholder="Bank">
                          @foreach($bank as $banks)
                          <option value="{{$banks->id}}">{{$banks->bank_name}}</option>
                          @endforeach
                        </select>
                        <label for="c5" class="color-theme">Bank</label>
                        <div class="valid-feedback">Bank tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-person-bounding-box font-12"></i>
                        <input type="text" class="form-control rounded-xs" id="norek" name="norek" onkeypress="return justnumber(event, false)" placeholder="Nomor Rekening" />
                        <label for="c5" class="color-theme">Nomor Rekening</label>
                        <div class="valid-feedback">Nomor Rekenings tidak boleh kosong!</div>
                     </div>
                     <div class="divider mb-0"></div>
                     <br>
                     <div class="form-custom form-label form-icon">
                       <i class="bi bi-wallet2 font-12"></i>
                        <input type="text" class="form-control rounded-xs" style="text-align:left" id="simpananPokok" autocomplete="off" name="simpananPokok" readonly value="1 Kali pembayaran selama menjadi anggota koperasi  : Rp.{{number_format($simpananPokok->deposit_min, 0, '.', '.')}}" placeholder="" pattern="[A-Za-z ]{1,32}" required />
                        <label for="c1" class="color-theme form-label-active">Simpanan Pokok</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Simpanan Pokok tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3">
                       <i class="bi bi-wallet2 font-12"></i>
                        <input type="text" class="form-control rounded-xs" onkeypress="return justnumber(event, false)" style="text-align:left" id="simpananWajib" placeholder="Simpanan Wajib" autocomplete="off" name="simpananWajib" readonly  value="Pembayaran setiap bulan selama menjadi anggota koperasi : Rp.{{number_format($simpananWajib->deposit_min, 0, '.', '.')}}" placeholder="" pattern="[A-Za-z ]{1,32}" required />
                        <label for="c1" class="color-theme form-label-active">Simpanan Wajib</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Simpanan Wajib tidak boleh kosong!</div>
                     </div>

                     <div class="form-custom form-label form-icon mb-3" style="display:none">
                       <i class="bi bi-wallet2 font-12"></i>
                        <input type="text" class="form-control rounded-xs" onkeypress="return justnumber(event, false)" style="text-align:right" value="0" id="simpananSukarela" placeholder="Simpanan Sukarela" autocomplete="off" name="simpananSukarela" value="" placeholder="" pattern="[A-Za-z ]{1,32}" required />
                        <label for="c1" class="color-theme form-label-active">Simpanan Sukarela</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Simpanan Wajib tidak boleh kosong!</div>
                     </div>

                     <div class="form-custom form-label form-icon mb-3">
                        <i class="bi bi-bookmark-dash font-13"></i>
                        <select class="form-select rounded-xs" id="jenisSimpanan" name="jenisSimpanan" autocomplete="off" aria-label="Kota Tinggal" placeholder="Kota Tinggal">
                           <option value="" selected disabled>Cara Pembayaran Simpanan Wajib</option>
                           <!-- <option value="BI">Simpanan Bulan Ini</option> -->
                           <!-- <option value="SK">Multi Bulan</option> -->
                           <option value="PB">Bulanan</option>
                           <option value="SMT">Pembayaran Penuh 1 Tahun Buku</option>
                        </select>
                        <label for="c6" class="color-theme">Select an Option</label>
                        <div class="valid-feedback">Jenis Kelamin tidak boleh kosong!</div>
                     </div>
                     <div class="form-custom form-label form-icon mb-3" id="pilihan" style="display:none">

                        <div class="row">
                          <div class="col-6">
                            <i class="bi bi-bi-calendar font-13"></i>
                            <select class="form-select rounded-xs col-md-6" id="pilih1" name="pilih1" autocomplete="off" aria-label="Kota Tinggal" placeholder="Kota Tinggal">
                               <option value="1" selected>Januari</option>
                               <option value="2">Februari</option>
                               <option value="3" >Maret</option>
                               <option value="4" >April</option>
                               <option value="5" >Mei</option>
                               <option value="6" >Juni</option>
                               <option value="7" >Juli</option>
                               <option value="8" >Agustus</option>
                               <option value="9" >September</option>
                               <option value="10" >Oktober</option>
                               <option value="11" >November</option>
                               <option value="12" >Desember</option>
                            </select>
                          </div>
                          <div class="col-6">
                            <i class="bi bi-bi-calendar font-13"></i>
                            <select class="form-select rounded-xs col-md-6" id="pilih2" name="pilih2" autocomplete="off" aria-label="Kota Tinggal" placeholder="Kota Tinggal">
                               <option value="1" >Januari</option>
                               <option value="2" selected>Februari</option>
                               <option value="3" >Maret</option>
                               <option value="4" >April</option>
                               <option value="5" >Mei</option>
                               <option value="6" >Juni</option>
                               <option value="7" >Juli</option>
                               <option value="8" >Agustus</option>
                               <option value="9" >September</option>
                               <option value="10" >Oktober</option>
                               <option value="11" >November</option>
                               <option value="12" >Desember</option>
                            </select>
                          </div>
                        </div>
                        <label for="c6" class="color-theme">Select an Option</label>
                        <div class="valid-feedback">Jenis Kelamin tidak boleh kosong!</div>
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

        $('#btnSimpan').on('click', function(){
            if($('#noKtp').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Nomor KTP tidak boleh kosong!',
              });
            }
            else if($('#telepon').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Telepon tidak boleh kosong!',
              });
            }
            else if($('#jenisKelamin').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Jenis Kelamin tidak boleh kosong!',
              });
            }
            else if($('#tempatLahir').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Tempat Lahir tidak boleh kosong!',
              });
            }else if($('#kota').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Kota Tinggal tidak boleh kosong!',
              });
            }else if($('#kodePos').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Kode Pos tidak boleh kosong!',
              });
            }
            else if($('#alamat').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Alamat tidak boleh kosong!',
              });
            }

            else if($('#accountName').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Nama Akun Bank tidak boleh kosong!',
              });
            }
            else if($('#bankName').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Bank tidak boleh kosong!',
              });
            }
            else if($('#norek').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Nomor Rekening tidak boleh kosong!',
              });
            }
          
          else if($('#jenisSimpanan').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Jenis Simpanan boleh kosong!',
              });

          }
          else if($('#simpananWajib').val() == ""){
              $.alert({
                  title: 'Informasi!',
                  content: 'Simpanan Wajib boleh kosong!',
              });

          }

          // else if($('#pilih2').val() < $('#pilih1').val() ){
          //     $.alert({
          //         title: 'Informasi!',
          //         content: 'Jarak Multi Bulan harus lebih dari 1 bulan!',
          //     });
          //   }
            else{
              $('#fAktivasi').submit();
            }

        });

        $('#jenisSimpanan').on('click', function(){

            if($('#jenisSimpanan').val() == "SMT"){
              $('#pilihan').css('display','none')
            }else if($('#jenisSimpanan').val() == "SK"){
              $('#pilihan').css('display','block')
            }
        });
      </script>
   </body>
