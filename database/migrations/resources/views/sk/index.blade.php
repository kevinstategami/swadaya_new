@extends('layouts.app')
@section('content')
<!-- Intro Area
===================================== -->
<header class="pt100 pb100 bg-grad-stellar" style="background-image: url(template/pasific/assets/img/bg/img-bg-sub-1.jpg); background-repeat: no-repeat; background-color: #fff; background-size: cover;">

        <div class="container mt100 mb70">
            
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="fs-75 font-source-sans-pro font-size-light color-light animated" data-animation="fadeInUp" data-animation-delay="100">
                        Syarat Keanggotaan
                    </h1>
                    <p class="lead mt25 color-gray animated" data-animation="fadeInUp" data-animation-delay="200">
                        Koperasi Jasa Millenium.<br>
                        <!-- Kumpulan individu atau badan usaha yang menjalankan<br>
                        kegiatan usaha dengan asas kekeluargaan dan bertujuan<br>
                        untuk mensejahterakan anggotanya. -->
                        <!-- <a class="button button-circle button-grad-blood-mary button-lg mt20">Purchase Now</a> -->
                    </p>
                </div>
                
            </div>
        </div>
        
</header>
 <!-- New Block Area -->
<div id="syarat-keanggotaan">
    <div class="container">
        
        <!-- title and short description start -->
        <div class="row mt50 mb25">
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    Syarat - Syarat
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>
            
            
            @if(!Auth::guest() && Auth::user()->edit_mode)
            <div class="col-md-12">
                <a href="{{route('syaratKeanggotaan')}}" class="button button-md button-pasific">Ubah <span class="fa fa-cog"></span></a>
            </div>
            @endif
            <div class="col-md-12 text-center">

                <div id="shop_item_description">
                    <h4>Syarat Keanggotaan</h4>
                    <ul class="icon-list" style="color : #747474 !important">
                        @foreach($syarat['object'] as $key => $value)
                            <li><i class="color-green">{{$key + 1}}. </i>
                               	{{$value->description}}
                            </li>
                        @endforeach
                        <!-- <li><i class="color-green">2. </i>
                            Mempunyai kemampuan penuh untuk melakukan tindakan
							hukum (dewasa dan tidak dalam perwalian dan sebagainya)
                        </li>
                        <li><i class="color-green">3. </i>
                            Bertempat tinggal dan berkedudukan di Lintas Provinsi pada
							Wilayah Negara Republik Indonesia
                        </li>
                        <li><i class="color-green">4. </i>
                            Mengisi permohonan pendaftaran sebagai Anggota
                        </li>
                        <li><i class="color-green">5. </i>
                            Menyertakan data Nama Lengkap, KTP, NPWP, Email aktif,
							Nomor Telepon aktif, Data / Nomor rekening bank yang valid
							dan aktif
                        </li>
                        <li><i class="color-green">6. </i>
                            Mempunyai motivasi yang kuat untuk Belajar tentang
							Perkembangan Dunia Digital untuk Perkembangan Pribadi
							dan Perkembangan Koperasi
                        </li>
                        <li><i class="color-green">7. </i>
                            Telah menyatakan kesanggupan tertulis untuk melunasi
							simpanan awal sebesar Rp 600.000,- (enam ratus ribu
							rupiah) yang merupakan simpanan pokok sebesar Rp 500.000
							(lima ratus ribu rupiah) dan simpanan wajib di bulan pertama
							sebesar Rp 100.000 (seratus ribu rupiah)
                        </li>
                        <li><i class="color-green">8. </i>
                            Keanggotaan Koperasi diperoleh jika seluruh persyaratan
							telah dipenuhi, simpanan pokok telah dilunasi dan pendaftar
							telah mengeklik syarat dan ketentuan berlaku
                        </li>
                        <li><i class="color-green">9. </i>
                            Pendaftar telah menyetujui isi Anggaran Dasar / Anggaran
							Rumah Tangga dan syarat dan ketentuan. Hal-hal yang
							belum diatur di syarat dan ketentuan akan diatur dalam
							peraturan khusus
                        </li> -->
                    </ul>
                </div>
            </div>

            @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12">
                    <a href="javascript:void(0)" onclick="editImageSK()" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-10 col-md-offset-1 pt50 pb75">
                <img src="{{!$bgsk['dokumen'] ? asset('template/pasific/assets/img/other/img-other-18.png') : url('images/'.$bgsk['dokumen']['path'])}}" alt="service" class="img-responsive center-block">
            </div>

            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    Ketentuan &amp; Keuntungan
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>

            @if(!Auth::guest() && Auth::user()->edit_mode)
            <div class="col-md-6">
                <a href="{{route('ketentuanKeanggotaan')}}" class="button button-md button-pasific">Ubah <span class="fa fa-cog"></span></a>
            </div>
            <div class="col-md-6">
                <a href="{{route('keuntunganAnggota')}}" class="button button-md button-pasific">Ubah <span class="fa fa-cog"></span></a>
            </div>
            @endif
            <div class="col-md-6">
                <div id="shop_item_description">
                    <h4>Ketentuan Keanggotaan</h4>

                    <ul class="icon-list" style="color : #747474 !important">
                        @foreach($ketentuan['object'] as $key => $ket)
                            <li><i class="color-green">{{$key + 1}}. </i>
                               	{{$ket->description}}
                            </li>
                        @endforeach
                        <!-- <li><i class="color-green">2. </i>
                            Bertempat tinggal dan berkedudukan di Lintas Provinsi pada
							Wilayah Negara Republik Indonesia
                        </li>
                        <li><i class="color-green">3. </i>
                            Apabila Anggota Koperasi meninggal dunia, maka nilai simpanan anggota dapat diwariskan.
                        </li>
                        <li><i class="color-green">4. </i>
                            Telah menyetujui isi Anggaran Dasar / Anggaran Rumah Tangga dan syarat adan ketentuan.
                        </li>
                        <li><i class="color-green">5. </i>
                            Hal-hal yang belum diatur di syarat dan ketentuan akan diatur dalam peraturan khusus.
                        </li> -->
                    </ul>

                    <p class="text-red">
                        Syarat dan Ketentuan tersebut merupakan bentuk persetujuan dan
						kesanggupan menjadi anggota Koperasi Jasa Millenium Swadaya Utama
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div id="shop_item_description">
                    <h4>Keuntungan Anggota</h4>
                    <ul class="icon-list" style="color : #747474 !important">
                        @foreach($keuntungan['object'] as $key => $keu)
                            <li><i class="color-green">{{$key + 1}}. </i>
                               	{{$keu->description}}
                            </li>
                        @endforeach
                        <!-- <li><i class="color-green">2. </i>
                            Memperoleh link pemasaran online untuk mengedukasi calon anggota dan untuk memasarkan produk yang diperjualbelikan pada platform koperasi
                        </li>
                        <li><i class="color-green">3. </i>
                            Memperoleh keuntungan tambahan dalam bentuk Point apabila mengedukasi calon anggota menjadi anggota koperasi
                        </li>
                        <li><i class="color-green">4. </i>
                            Memperoleh keuntungan tambahan atas setiap transaksi dalam Teamwork
                        </li>
                        <li><i class="color-green">5. </i>
                            Dapat mengikuti program promosi dan layanan hak istimewa Koperasi (privilege)
                        </li>
                        <li><i class="color-green">6. </i>
                            Memperoleh layanan pendidikan koperasi dan entrepreneurship melalui platform Koperasi
                        </li>
                        <li><i class="color-green">7. </i>
                            Memperoleh SHU Tahunan sebanding dengan jasa usaha yang dilakukan oleh setiap anggota
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- title and short description end -->
    </div>
</div><!-- New Block end -->
@include('sk.comp.modal.image-sk')
@endsection
@section('script')
    @include('sk.comp.script.script-image-sk')
@endsection