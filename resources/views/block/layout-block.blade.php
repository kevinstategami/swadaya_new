<!-- MC  -->

@foreach($cms as $key => $value)

@if($value->block_type == 'MC')
<header class="pt100 pb100 bg-grad-stellar" style="background-image: url({{$value->background_path ? url('get-block-image/'. $value->background_path) : ''}}); background-repeat: no-repeat; background-color: #fff; background-size: cover;">
        <div class="container mt100 mb70">
            
            <div class="row">
                <div class="col-md-12 text-center">
                    @if($value->path)
                    <img src="{{url('get-block-image/'.$value->path)}}" width="10%" />
                    @endif
                    <h1 class="font-source-sans-pro {{$value->background_path ? 'font-size-light color-light' : 'text-orange'}} animated" data-animation="fadeInUp" data-animation-delay="100">
                        {{$value ? $value->title : ''}}
                    </h1>

                    <small class="heading heading-solid center-block"></small>

                    <h4 class="mt25 {{$value->background_path ? 'color-gray' : ''}} animated" data-animation="fadeInUp" data-animation-delay="200">
                        {{$value ? $value->description : ''}}<br>
                        <!-- Kumpulan individu atau badan usaha yang menjalankan<br>
                        kegiatan usaha dengan asas kekeluargaan dan bertujuan<br>
                        untuk mensejahterakan anggotanya. -->
                        <!-- <a class="button button-circle button-grad-blood-mary button-lg mt20">Purchase Now</a> -->
                    </h4>
                    @if(!Auth::guest() && Auth::user()->edit_mode)
                        <a href="javascript:void(0)" onclick="editCmsBlock('{{$value->id}}')" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
                    @endif
                </div>
                
            </div>
        </div>
        
</header>
@endif

@if($value->block_type == 'CC')
<!-- New Block Area -->
<div style="background-image: url({{$value->background_path ? url('get-block-image/'. $value->background_path) : ''}}); background-repeat: no-repeat; background-color: #fff; background-size: cover;">
    <div class="container">
         <!-- title and short description start -->
         <div class="row mt50 mb25">
            @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12">
                    <a href="{{url('cms/block/edit-cc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif

             <div class="col-md-12 text-center">
                 <h1 class="font-size-normal">
                     {{$value->title}}
                     <small class="heading heading-solid center-block"></small>
                 </h1>
             </div>
         </div>
         <!-- title and short description end -->

         <div class="row">

             <!-- content box 1 -->
             @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
                 <div class="col-md-4 col-sm-6 col-xs-12 mb35 hover-wobble-vertical">
                     <div class="content-box content-box-o content-box-center content-box-icon">
                         <span class="icon basic-lightbulb bg-grad-blood-mary"></span>
                         <h4>{{isset(explode(',', $value->title2)[$i]) ? explode(',', $value->title2)[$i] : '' }}</h4>
                         <p class="pr10 pl10">
                             {{isset(explode(',', $value->description)[$i]) ? explode(',', $value->description)[$i] : ''}}
                         </p>
                     </div>
                 </div>
             @endfor
             <!-- end of content box 1-->
         </div><!-- row end -->

    </div><!-- container end -->
</div><!-- New Block end -->

@endif

@if($value->block_type == 'LC')
<!-- Content Box Align Left -->
<div class="container-fluid bg-gray">
    <div class="container">
        <div class="row pt50 pb40">                        
            <h4 class="text-center mb35">{{$value->title}}</h4>
            
            @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12 mb35">
                    <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif

            <!-- Content Box Align Left -->
            @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="content-box content-box-left-icon">
                    @if(isset(explode(',', $value->path)[$i]))
                        <img class="img-lc" src="{{isset(explode(',', $value->path)[$i]) ? url('get-block-image/'.explode(',', $value->path)[$i]) : ''}}" width="50%"/>
                    @else
                        <span class="icon-desktop color-orange"></span>
                    @endif
                    <h5 class="pl-1">{{isset(explode(',', $value->title2)[$i]) ? explode(',', $value->title2)[$i] : '' }}</h5><br/>         
                    <p>
                        {{isset(explode(',', $value->description)[$i]) ? explode(',', $value->description)[$i] : ''}}
                    </p>
              
                </div>
            </div>
            @endfor
    
        </div>
    </div>
</div>

@endif

@if($value->block_type == 'ZC')
 <!-- Service Area
===================================== -->
<div id="service" class="pt75 pb25">
    <div class="container">
        
        <!-- title and short description start -->
        <div class="row">
            @if(!Auth::guest() && Auth::user()->edit_mode)
                <div class="col-md-12 mb35">
                    <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    <small>JENIS KOPERASI</small>
                    {{$value->title}}
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
        
        @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
            @if($i % 2 == 0)
                <!-- service one start -->
                <div class="row mt75 jenis-koperasi">
                    <div class="col-md-6 animated" data-animation="fadeInLeft" data-animation-delay="100">
                        <img src="{{isset(explode(',', $value->path)[$i]) ? url('get-block-image/'.explode(',', $value->path)[$i]) : ''}}" alt="website service" class="img-responsive">
                    </div>
                    <div class="col-md-5 animated" data-animation="fadeIn" data-animation-delay="100">
                        
                        <h3 class="font-size-normal">
                            <small class="color-primary">Title</small>
                            {{isset(explode(',', $value->title2)[$i]) ? explode(',', $value->title2)[$i] : '' }}
                        </h3>
                        
                        <p class="mt20 deskripsi-jenis-koperasi">
                            {{isset(explode(',', $value->description)[$i]) ? explode(',', $value->description)[$i] : ''}}
                        </p>
                    </div>
                </div>
                <!-- service one end -->
            @else
                <!-- service two start -->
                <div class="row mt100 jenis-koperasi">
                    <div class="col-md-6 col-md-push-6 animated" data-animation="fadeInRight" data-animation-delay="100">
                        <img src="{{isset(explode(',', $value->path)[$i]) ? url('get-block-image/'.explode(',', $value->path)[$i]) : ''}}" alt="website service" class="img-responsive">
                    </div>
                    <div class="col-md-5 col-md-pull-5">
                        
                        <h3 class="font-size-normal">
                            <small class="color-success">Title</small>
                            {{isset(explode(',', $value->title2)[$i]) ? explode(',', $value->title2)[$i] : '' }}
                        </h3>
                        
                        <p class="mt20 animated deskripsi-jenis-koperasi" data-animation="fadeIn" data-animation-delay="100">
                            {{isset(explode(',', $value->description)[$i]) ? explode(',', $value->description)[$i] : ''}}
                        </p>
                    </div>
                </div>
                <!-- service two end -->
            @endif
        @endfor
    </div><!-- container end -->
</div><!-- section service end -->
@endif
@endforeach


@if($value->block_type == 'MMC')
<!-- New Block Area
===================================== -->
<div id="service">
    <div class="container">
        
        @if(!Auth::guest() && Auth::user()->edit_mode)
            <a href="javascript:void(0)" onclick="editCmsBlock('{{$value->id}}')" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
        @endif
        <!-- title and short description start -->
        <div class="row mt50 mb25">
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    {{$value->title}}
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>
            
            <div class="col-md-8 col-md-offset-2 text-center">
                <p class="lead">
                    {{$value->description}}
                </p>
            </div>
            
        </div>
        <!-- title and short description end -->
    </div><!-- container end -->
    
    @if($value->path)
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <img src="{{url('get-block-image/'.$value->path)}}" alt="image" class="">
            </div>
        </div>
    </div>
    @endif
</div><!-- New Block end -->
@endif
@include('block.modal.mc-modal')
@include('block.modal.cc-modal')