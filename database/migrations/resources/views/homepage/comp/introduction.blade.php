<!-- Intro Area
===================================== -->
<header class="pt100 pb100 bg-grad-stellar" style="background-image: url({{$introduction_homepage ? url('images/'. $introduction_homepage->dokumen->path) : 'template/pasific/assets/img/bg/bg-parallax-7.jpg'}}); background-repeat: no-repeat; background-color: #fff; background-size: cover;">
<!-- <header class="pt100 pb100 bg-grad-stellar" style="background-image: url(img/songgomas/4.jpeg); background-repeat: no-repeat; background-color: #fff; background-size: cover;"> -->
        <div class="container mt100 mb70">
            
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="fs-75 font-source-sans-pro font-size-light color-light animated" data-animation="fadeInUp" data-animation-delay="100">
                        {{$introduction_homepage ? $introduction_homepage->title : 'Swadaya Utama'}}
                    </h1>
                    <p class="lead mt25 color-gray animated" data-animation="fadeInUp" data-animation-delay="200">
                        {{$introduction_homepage ? $introduction_homepage->description : 'Koperasi Jasa Millenium'}}<br>
                        <!-- Kumpulan individu atau badan usaha yang menjalankan<br>
                        kegiatan usaha dengan asas kekeluargaan dan bertujuan<br>
                        untuk mensejahterakan anggotanya. -->
                        <!-- <a class="button button-circle button-grad-blood-mary button-lg mt20">Purchase Now</a> -->
                    </p>
                    @if(!Auth::guest() && Auth::user()->edit_mode)
                        <a href="javascript:void(0)" onclick="editIntroduction()" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
                    @endif
                </div>
                
            </div>
        </div>
        
</header>