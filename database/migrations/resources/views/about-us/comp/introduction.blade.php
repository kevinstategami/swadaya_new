<!-- Intro Area
===================================== -->
<header class="intro pt100 pb100 parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="{{!$bgau->dokumen ? asset('template/pasific/assets/img/bg/img-bg-1.jpg') : url('images/'.$bgau->dokumen->path)}}">
    <div class="intro-body">
       
        <div class="container">
            
            <div class="row">
                <div class="col-md-8 col-md-offset-2  mt-100">
                    <h1 class="brand-heading text-capitalize font-pacifico mt-100 color-light animated" data-animation="fadeInUp" data-animation-delay="100">
                        {{$bgau->title}}
                    </h1>
                    <p class="intro-text mt25 color-gray animated" data-animation="fadeInUp" data-animation-delay="200">{{$bgau->description}}</p>
                    <a href="{{url('syarat-keanggotaan')}}" class="button button-pasific button-lg hover-ripple-out animated" data-animation="fadeInUp" data-animation-delay="300">Syarat Keanggotaan</a><br/>
                    @if(!Auth::guest() && Auth::user()->edit_mode)
                        <a href="javascript:void(0)" onclick="editIntroduction()" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- <div class="intro-direction">
            <a href="#welcome">
                <div class="mouse-icon"><div class="wheel"></div></div>
            </a>
        </div> -->
        
    </div>
</header>