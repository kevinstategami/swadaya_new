 <!-- Service Area
===================================== -->
<div id="service" class="pt75 pb25">
    <div class="container">
        
        <!-- title and short description start -->
        <div class="row">
            @if(!Auth::guest() && Auth::user()->edit_mode)
            <div class="col-md-12">
                <a href="javascript:void(0)" onclick="editJenisKoperasi()" class="button button-md button-pasific">Ubah <span class="fa fa-cog"></span></a>
            </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    <small>JENIS KOPERASI</small>
                    {{$judul_jenis_koperasi->title}}
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>

            <!-- <div class="col-md-8 col-md-offset-2 text-center">
                <p class="lead">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt voluptatem. 
                </p>
            </div> -->
        </div>
        <!-- title and short description end -->
        
        @foreach($jenis_koperasi as $key => $value)
            @if($key % 2 == 0)
                <!-- service one start -->
                <div class="row mt75 jenis-koperasi">
                    <div class="col-md-6 animated" data-animation="fadeInLeft" data-animation-delay="100">
                        <img src="{{url('images/'.$value->dokumen->path)}}" alt="website service" class="img-responsive">
                    </div>
                    <div class="col-md-5 animated" data-animation="fadeIn" data-animation-delay="100">
                        
                        <h3 class="font-size-normal">
                            <small class="color-primary">Jenis Koperasi</small>
                            {{strtoupper($value->title)}}
                        </h3>
                        
                        <p class="mt20 deskripsi-jenis-koperasi">
                            {{$value->description}}
                        </p>
                    </div>
                </div>
                <!-- service one end -->
            @else
                <!-- service two start -->
                <div class="row mt100 jenis-koperasi">
                    <div class="col-md-6 col-md-push-6 animated" data-animation="fadeInRight" data-animation-delay="100">
                        <img src="{{url('images/'.$value->dokumen->path)}}" alt="website service" class="img-responsive">
                    </div>
                    <div class="col-md-5 col-md-pull-5">
                        
                        <h3 class="font-size-normal">
                            <small class="color-success">Jenis Koperasi</small>
                            {{strtoupper($value->title)}}
                        </h3>
                        
                        <p class="mt20 animated deskripsi-jenis-koperasi" data-animation="fadeIn" data-animation-delay="100">
                            {{$value->description}}
                        </p>
                    </div>
                </div>
                <!-- service two end -->
            @endif
        @endforeach
    </div><!-- container end -->
</div><!-- section service end -->