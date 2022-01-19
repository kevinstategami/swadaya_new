<!-- Info Area  -->
<div id="info-1" class="pt50 pb50 mt75 parallax-window" data-parallax="scroll" data-speed="0.5" data-image-src="{{!$aboutUs['dokumen'] ? asset('template/pasific/assets/img/bg/img-bg-2.jpg') : url('images/'.$aboutUs['dokumen']['path'])}}">
    <div class="container">
        <div class="row pt75">
            <div class="col-md-12 text-center about-content">
                <h1 class="color-light">
                    <small class="color-light">{{$aboutUs ? $aboutUs['title'] : 'Tentang Kami!'}}</small>
                    {{$aboutUs ? $aboutUs['description'] : 'Apa itu swadaya utama?'}}
                </h1> 
                <div class="col-md-6 col-md-offset-3">
                    <div class="color-light text-left about-us-content">
                        {!!$aboutUs['content']!!}
                    </div> <br/>
                </div>
                <div class="col-md-12">
                    @if(!Auth::guest() && Auth::user()->edit_mode)
                    <a href="javascript:void(0)" onclick="editAboutUs()" class="button button-md button-pasific hover-ripple-out mt25">Edit <span class="fa fa-cog"></span></a>
                    @endif
                    <a class="button button-md button-pasific hover-ripple-out mt25">Informasi Lebih Lanjut</a>
                </div> 
            </div>   
        </div>
    </div>
</div>