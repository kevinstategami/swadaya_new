 <!-- New Block Area -->
 <div id="visimisi">
     <div class="container">

         <!-- title and short description start -->
         <div class="row mt50 mb25">
            @if(!Auth::guest() && Auth::user()->edit_mode)
                <div class="col-md-12">
                    <a href="{{route('bVisi')}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif
             <div class="col-md-12 text-center">
                 <h1 class="font-size-normal">
                     <small class="mb-3">Visi &amp; Misi</small>
                     Visi
                     <small class="heading heading-solid center-block"></small>
                 </h1>
             </div>



             <div class="col-md-8 col-md-offset-2 text-center">
                 <p class="lead">
                        {{ $visi['object']->description }}
                 </p>
             </div>

            @if(!Auth::guest() && Auth::user()->edit_mode) 
                <div class="col-md-12">
                    <a href="{{route('misi')}}" class="button button-md button-pasific hover-ripple-out mt25">Ubah <span class="fa fa-cog"></span></a>
                </div>
            @endif

             <div class="col-md-12 text-center">
                 <h1 class="font-size-normal">
                     Misi
                     <small class="heading heading-solid center-block"></small>
                 </h1>
             </div>
         </div>
         <!-- title and short description end -->

         <div class="row">

             <!-- content box 1 -->
             @foreach ($misi['object'] as $misi)
                 <div class="col-md-4 col-sm-6 col-xs-12 mb35 hover-wobble-vertical">
                     <div class="content-box content-box-o content-box-center content-box-icon">
                         <span class="icon basic-lightbulb bg-grad-blood-mary"></span>
                         <h4>{{$misi->title}}</h4>
                         <p class="pr10 pl10">
                             {{$misi->description}}
                         </p>
                     </div>
                 </div>
             @endforeach
             <!-- end of content box 1-->
         </div><!-- row end -->

     </div><!-- container end -->
 </div><!-- New Block end -->
