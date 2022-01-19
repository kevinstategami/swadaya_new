 <!-- New Block Area -->
<div id="visimisi">
    <div class="container">
        
        <!-- title and short description start -->
        <div class="row mt50 mb25">
            @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12">
                    <a href="{{route('bAboutUs')}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    Tentang Kami
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>
            
            <div class="col-md-12 text-center">
                {!! $aboutUs['object']->content !!}
            </div>

             @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12">
                    <a href="javascript:void(0)" onclick="editImageAU()" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif

            <div class="col-md-10 col-md-offset-1 pt50 pb75">
                <img src="{{!$imgau->dokumen ? asset('template/pasific/assets/img/other/img-other-18.png') : url('images/'.$imgau->dokumen->path)}}" alt="service" class="img-responsive center-block">
            </div>

            @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12">
                    <a href="javascript:void(0)" onclick="editFungsiPeran()" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    FUNGSI / PERAN
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>

            <div class="col-md-6">
                <div id="shop_item_description">
                    <h4>{{$fungsi_peran['fungsi_peran_1']['title']}}</h4>
                    <p>
                        {!! $fungsi_peran['fungsi_peran_1']['description'] !!}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div id="shop_item_description">
                    <h4>{{$fungsi_peran['fungsi_peran_2']['title']}}</h4>
                    <p style="color : #747474 !important">
                        {!! $fungsi_peran['fungsi_peran_2']['description'] !!}
                    </p>
                    <!-- <h4>Pasal 4 UU No 25 Tahun 1992</h4>
                    <ul class="icon-list" style="color: #747474 !important">
                        <li><i class="color-green">1. </i>
                            Membangun dan mengembangkan potensi dan kemampuan ekonomi anggota
                            pada khususnya serta masyarakat pada umumnya untuk meningkatkan
                            kesejahteraan ekonomi dan social.
                        </li>
                        <li><i class="color-green">2. </i>
                            Berperan secara aktif dalam upaya meningkatkan kualitas kehidupan masyarakat
                        </li>
                        <li><i class="color-green">3. </i>
                            Memperkukuh perekonomian rakyat sebagai dasar kekuatan dan ketahanan
                            perekonomian nasional dengan koperasi sebagai saka gurunya
                        </li>
                        <li><i class="color-green">4. </i>
                            Berusaha mewujudkan dan mengembangkan perekonomian nasional yang
                            merupakan usaha bersama berdasarkan asas kekeluargaan dan demokrasi
                            ekonomi.
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
        <!-- title and short description end -->
    </div>
</div><!-- New Block end -->