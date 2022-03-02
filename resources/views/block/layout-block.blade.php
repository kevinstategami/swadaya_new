@foreach($cms as $key => $value)

<!-- SS -->
@if($value->block_type == 'SSC')
<div id="block-carousel-{{$key}}" class="carousel slide" data-ride="carousel" style="margin-top: 57px;">
    <ol class="carousel-indicators">
        <li data-target="#block-carousel-{{$key}}" data-slide-to="0" class="active"></li>
        <li data-target="#block-carousel-{{$key}}" data-slide-to="1"></li>
        <li data-target="#block-carousel-{{$key}}" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
        <div class="item carousel-img {{$i == 0 ? 'active' : ''}}" style="background-image: url({{isset(explode(',', $value->path)[$i]) ? url('get-block-image/'. rawurlencode(explode(',', $value->path)[$i])) : '' }});">
            <div class="container">
                <div class="carousel-caption animated" data-animation="bounceInDown" data-animation-delay="100">
                    <h1 class="font-pacifico text-capitalize color-light">{{isset(explode(',', $value->title2)[$i]) ? explode(',', $value->title2)[$i] : '' }}</h1>
                    <p class="color-light mt25">{{isset(explode(',', $value->description)[$i]) ? explode(',', $value->description)[$i] : '' }}<br>
                        @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
                            <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <a class="left carousel-control" href="#block-carousel-{{$key}}" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#block-carousel-{{$key}}" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
@endif

<!-- MC  -->
@if($value->block_type == 'MC')
<header class="pt100 pb100 bg-grad-stellar" style="background-image: url({{$value->background_path ? url('get-block-image/'. $value->background_path) : ''}}); background-repeat: no-repeat; background-color: #fff; background-size: cover;" id="mc-{{$key}}">
        <div class="container mt100 mb70">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if($value->path)
                    <img src="{{url('get-block-image/'.$value->path)}}" width="10%" />
                    @endif
                    <h1 class="font-source-sans-pro {{$value->background_path ? 'font-size-light color-light' : 'text-orange'}} animated color-primary fw-600" data-animation="fadeInUp" data-animation-delay="100">
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
                    @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
                        <a href="javascript:void(0)" onclick="editCmsBlock('{{$value->id}}')" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
                    @endif
                </div>
                
            </div>
        </div>
</header>
@endif

@if($value->block_type == 'CC')
<!-- New Block Area -->
<div style="background-image: url({{$value->background_path ? url('get-block-image/'. $value->background_path) : ''}}); background-repeat: no-repeat; background-color: #fff; background-size: cover;" id="cc-{{$key}}">
    <div class="container">
         <!-- title and short description start -->
         <div class="row mt50 mb25">
            @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS') 
                <div class="col-md-12">
                    <a href="{{url('cms/block/edit-cc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif

             <div class="col-md-12 text-center">
                 <h3 class="color-primary fw-600">
                     {{$value->title}}
                     <small class="heading heading-solid center-block"></small>
                 </h3>
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
<div class="container-fluid bg-gray" id="LC-{{$key}}">
    <div class="container">
        <div class="row pt50 pb40">
            <h3 class="text-center color-primary" style="margin-bottom: 2rem;">{{$value->title}}</h3>
            
            @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS') 
                <div class="col-md-12 mb35">
                    <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif

            <!-- Content Box Align Left -->
            @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
            <div class="col-md-6 col-sm-6 col-xs-12 mheight-150 m-3">
                <div class="content-box content-box-icon content-box-left-icon d-flex flex-row align-items-center">
                    @if(explode('||', $value->path)[$i] != "")
                        <img class="img-lc" src="{{isset(explode('||', $value->path)[$i]) ? url('get-block-image/'.explode('||', $value->path)[$i]) : ''}}" width="50%"/>
                    @else
                        <img class="img-lc" src="{{asset('img/songgomas/big-check-mark.png')}}" />
                    @endif
                    <div>
                        @if(isset(explode('||', $value->description)[$i]))
                        <h5 style="margin-top: 5%">{{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}</h5>     
                        @else
                        <h5>{{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}</h5>     
                        @endif
                        <p>
                            {{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : ''}}
                        </p>
                    </div>
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
<div id="ZC-{{$key}}" class="pt75 pb25">
    <div class="container">
        
        <!-- title and short description start -->
        <div class="row">
            @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
                <div class="col-md-12 mb35">
                    <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal color-primary fw-600">
                    <!-- <small>JENIS KOPERASI</small> -->
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
                        <img src="{{isset(explode('||', $value->path)[$i]) ? url('get-block-image/'.explode('||', $value->path)[$i]) : ''}}" alt="website service" class="img-responsive">
                    </div>
                    <div class="col-md-5 animated" data-animation="fadeIn" data-animation-delay="100">
                        
                        <h3 class="font-size-normal">
                            <!-- <small class="color-primary">Title</small> -->
                            {{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}
                        </h3>
                        
                        <p class="mt20 deskripsi-jenis-koperasi">
                            {{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : ''}}
                        </p>
                    </div>
                </div>
                <!-- service one end -->
            @else
                <!-- service two start -->
                <div class="row mt100 jenis-koperasi">
                    <div class="col-md-6 col-md-push-6 animated" data-animation="fadeInRight" data-animation-delay="100">
                        <img src="{{isset(explode('||', $value->path)[$i]) ? url('get-block-image/'.explode('||', $value->path)[$i]) : ''}}" alt="website service" class="img-responsive">
                    </div>
                    <div class="col-md-5 col-md-pull-5">
                        
                        <h3 class="font-size-normal">
                            <!-- <small class="color-success">Title</small> -->
                            {{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}
                        </h3>
                        
                        <p class="mt20 animated deskripsi-jenis-koperasi" data-animation="fadeIn" data-animation-delay="100">
                            {{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : ''}}
                        </p>
                    </div>
                </div>
                <!-- service two end -->
            @endif
        @endfor
    </div><!-- container end -->
</div><!-- section service end -->
@endif
@if($value->block_type == 'MMC')
<!-- New Block Area
===================================== -->
<div id="mmc-{{$key}}" class="mb35">
    <div class="container">
        
        @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
            <a href="javascript:void(0)" onclick="editCmsBlock('{{$value->id}}')" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
        @endif
        <!-- title and short description start -->
        <div class="row mt50 mb25">
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal color-primary fw-600">
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
            <div class="col-md-12 col-md-offset-1 text-center">
                <img src="{{url('get-block-image/'.$value->path)}}" alt="image" class="" width="100%">
            </div>
        </div>
    </div>
    @endif
</div><!-- New Block end -->
@endif

@if($value->block_type == 'ACC')
<div class="pt100 pb100 bg-grad-mojito" id="acc-{{$key}}">
    <div class="container">
        <div class="row">
            @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
                <div class="col-md-12 mb35">
                    <a href="{{url('cms/block/edit-cc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
            <div class="col-md-12 pt50 text-center">
                <h1 class="brand-heading font-montserrat text-uppercase color-primary fw-600" data-in-effect="fadeInDown">{{$value->title}}</h1>                            
            </div>
            <div class="col-md-8 col-md-offset-2 text-center">
                <form class="form-horizontal">
                    <label class="sr-only" for="inputHelpBlock">Input with help text</label>
                </form>

                <!-- <p class="intro-text color-light text-open-sans text-uppercase mt25" data-in-effect="swing">
                    {{$value->description}}
                </p> -->
            </div>
        </div>       

        
        <div class="row mt35">
            <div class="col-md-6 col-sm-6 col-xs-6">                    
                <div class="panel-group" id="accordion5">
                    @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
                        @if($i % 2 == 0)
                            <div class="panel">
                                <div class="panel-heading">
                                    <a href="#collapse{{$i}}" class="collapsed accordian-toggle-chevron-left" data-toggle="collapse" data-parent="#accordion5">
                                        {{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}
                                    </a>
                                </div>
                                <div id="collapse{{$i}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        {{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : '' }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>                        
            </div>
            
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="panel-group" id="accordion6">
                    @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
                        @if($i % 2 != 0)
                            <div class="panel">
                                <div class="panel-heading">
                                    <a href="#collapse{{$i}}" class="collapsed accordian-toggle-chevron-left" data-toggle="collapse" data-parent="#accordion5">
                                        {{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}
                                    </a>
                                </div>
                                <div id="collapse{{$i}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        {{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : '' }}
                                    </div>
                                </div>                                
                            </div>
                        @endif
                    @endfor
                </div>                        
            </div>
        </div>
        
    </div>
</div>
@endif

@if($value->block_type == 'CMC')
<div class="container" id="cmc-{{$key}}">
    <div class="row">
        @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
            <div class="col-md-12 mb35">
                <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
            </div>
        @endif
        <!-- team member one start -->
        @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
            <div class="col-md-3 col-sm-3 col-xs-6 mt30">
                <div class="team team-two">
                    <img src="{{isset(explode('||', $value->path)[$i]) ? url('get-block-image/'.explode('||', $value->path)[$i]) : ''}}" alt=""
                        class="img-responsive">
                    <!-- <div class="team-social">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-github"></i></a>
                    </div> -->
                    <h5>
                        {{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}
                        <small class="color-pasific">{{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : '' }}</small>
                    </h5>
                </div>
            </div>
        @endfor
        <!-- team member one end -->
    </div><!-- row end -->
</div><!-- container end -->
@endif
@if($value->block_type == 'RSC')
<div class="container mt35 mb35" id="rsc-{{$key}}">
    @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
        <div class="col-md-12 mb35">
            <a href="{{url('cms/block/edit-lc/'.$value->id)}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
        </div>
    @endif
    <div class="col-md-6 align-items-center justify-content-center text-center">
        <img src="{{$value->background_path ? url('get-block-image/'.$value->background_path) : asset('template\pasific\assets\img\shop\img-shop-1.png')}}" width="100%" />
    </div>
    <div class="col-md-6">
        @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
        <h3 class="font-size-normal">
            <small class="color-primary fw-600">{{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}</small>
        </h3>
        
        <p class="deskripsi-jenis-koperasi">
            {{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : '' }}
            @if(explode('||', $value->path)[$i] != null)
            <img src="{{isset(explode('||', $value->path)[$i]) ? url('get-block-image/'.explode('||', $value->path)[$i]) : ''}}" width="100%" class="img-responsive" />
            @endif
        </p>
        @endfor
    </div>
</div>
@endif

@if($value->block_type == 'LFC')
<div class="container mt35 mb35" id="lfc-{{$key}}">
    <div class="row">
        @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
            <div class="col-md-12">
                <a href="javascript:void(0)" onclick="editCmsBlock('{{$value->id}}')" class="button button-pasific button-lg hover-ripple-out animated">Ubah <span class="fa fa-cog"></span></a>
            </div>
        @endif
        <div class="col-md-12">
            <h3 class="color-primary mb0 fw-600">{{$value->title}}</h3>
            <h4 class="mt0 mb0">{{$value->title2}}</h4>
        </div>
        <div class="col-md-6">
            <hr style="border-top: 1px solid #337ab7 !important" />
        </div>
        <div class="col-md-12">
            {!! $value->description !!}
        </div>
        @if($value->path)
        <div class="col-md-12">
            <img src="{{url('get-block-image/'.$value->path)}}" alt="image" class="img-responsive">
        </div>
        @endif
    </div>
</div>
@endif
@endforeach

@include('block.modal.mc-modal')
@include('block.modal.ft-modal')