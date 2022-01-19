<!-- Team Area
===================================== -->
<div id="team" class="pt75">
    <div class="container">

        <!-- title and short description start -->
        <div class="row">
            @if(!Auth::guest() && Auth::user()->edit_mode)
                <div class="col-md-12">
                    <a href="{{route('strukturAnggota')}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    Struktur Organisasi
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>

            <div class="col-md-8 col-md-offset-2 text-center">
                <p class="lead">
                    Struktur Organisasi Swadaya Utama terbagi menjadi dua bagian , yaitu Pengurus Koperasi
                    dan Pengawas Koperasi
                </p>
            </div>
        </div>
        <!-- title and short description end -->

    </div>

    <div class="container">
        <div class="row">

            <!-- team member one start -->
            @foreach ($struktur['object'] as $teams)
                <div class="col-md-4 col-sm-4 col-xs-6 mt30">
                    <div class="team team-two">
                        <img src="{{ url('profile/'.$teams->profile_pic) }}" alt=""
                            class="img-responsive">
                        <div class="team-social">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                        <h5>{{$teams->nama}}<small class="color-pasific">{{$teams->divisi}}</small></h5>
                    </div>
                </div>
            @endforeach
            <!-- team member one end -->
        </div><!-- row end -->
    </div><!-- container end -->
</div><!-- section team end -->
