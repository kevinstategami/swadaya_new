@extends('registrasi.layout.app_home')
@section('content')

   <div class="pt-3 disabled">
      <div class="page-title d-flex">
         <div class="align-self-center me-auto">
            <p class="color-white">Welcome Back</p>
            <h1 class="color-white">PayApp</h1>
         </div>
         <div class="align-self-center ms-auto">
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-sidebar" class="icon bg-white rounded-m">
            <i class="bi bi-list font-20"></i>
            </a>
         </div>
      </div>
   </div>
   <svg id="header-deco" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg">
      <path id="header-deco-1" d="M 0,600 C 0,600 0,120 0,120 C 92.36363636363635,133.79904306220095 184.7272727272727,147.59808612440193 287,148 C 389.2727272727273,148.40191387559807 501.4545454545455,135.40669856459328 592,129 C 682.5454545454545,122.5933014354067 751.4545454545455,122.77511961722489 848,115 C 944.5454545454545,107.22488038277511 1068.7272727272727,91.49282296650718 1172,91 C 1275.2727272727273,90.50717703349282 1357.6363636363635,105.25358851674642 1440,120 C 1440,120 1440,600 1440,600 Z"></path>
      <path id="header-deco-2" d="M 0,600 C 0,600 0,240 0,240 C 98.97607655502392,258.2105263157895 197.95215311004785,276.4210526315789 278,282 C 358.04784688995215,287.5789473684211 419.16746411483257,280.5263157894737 524,265 C 628.8325358851674,249.4736842105263 777.377990430622,225.47368421052633 888,211 C 998.622009569378,196.52631578947367 1071.3205741626793,191.57894736842107 1157,198 C 1242.6794258373207,204.42105263157893 1341.3397129186603,222.21052631578948 1440,240 C 1440,240 1440,600 1440,600 Z"></path>
      <path id="header-deco-3" d="M 0,600 C 0,600 0,360 0,360 C 65.43540669856458,339.55023923444975 130.87081339712915,319.1004784688995 245,321 C 359.12918660287085,322.8995215311005 521.9521531100479,347.1483253588517 616,352 C 710.0478468899521,356.8516746411483 735.3205741626795,342.3062200956938 822,333 C 908.6794258373205,323.6937799043062 1056.7655502392345,319.62679425837325 1170,325 C 1283.2344497607655,330.37320574162675 1361.6172248803828,345.1866028708134 1440,360 C 1440,360 1440,600 1440,600 Z"></path>
      <path id="header-deco-4" d="M 0,600 C 0,600 0,480 0,480 C 70.90909090909093,494.91866028708137 141.81818181818187,509.8373205741627 239,499 C 336.18181818181813,488.1626794258373 459.6363636363636,451.5693779904306 567,446 C 674.3636363636364,440.4306220095694 765.6363636363636,465.88516746411483 862,465 C 958.3636363636364,464.11483253588517 1059.8181818181818,436.8899521531101 1157,435 C 1254.1818181818182,433.1100478468899 1347.090909090909,456.555023923445 1440,480 C 1440,480 1440,600 1440,600 Z"></path>
   </svg>
   <div class="notch-clear"></div>
   <div class="pt-5 mt-4"></div>
   <div class="card card-style overflow-visible mt-5">
      <div class="mt-n5"></div>
      <img src="https://www.enableds.com/products/payapp/v103/images/pictures/31t.jpg" alt="img" width="180" class="mx-auto rounded-circle mt-n5 shadow-l">
      <h1 class="color-theme text-center font-30 pt-3 mb-0">{{Auth::user()->name}}</h1>
      @if(Auth::user()->status_aktivasi == 4)

      <p class="text-center font-11"><i class="bi bi-check-circle-fill color-green-dark pe-1"></i>Terverifikasi</p>
      @else
      <a href="{{url('membership/index/aktivasi/'.Auth::user()->id)}}"><p class="text-center font-11 text-danger">Tap untuk Aktivasi Akun</p></a>
      @endif

      <div class="content mt-0 mb-2">
         <div class="list-group list-custom list-group-flush list-group-m rounded-xs">
           <a href="{{url('membership/index/profil')}}" class="list-group-item">
              <i class="bi bi-person-badge"></i>
              <div>Profil Anggota</div>
              <i class="bi bi-chevron-right"></i>
           </a>
            <a href="{{url('membership/index/activity#tab-6')}}" class="list-group-item">
               <i class="bi bi-bell-fill"></i>
               <div>Riwayat Tagihan</div>
               <i class="bi bi-chevron-right"></i>
            </a>
            <a href="{{url('membership/index/history-wallet')}}" class="list-group-item">
               <i class="bi bi-clock-history"></i>
               <div>Riwayat Transaksi</div>
               <i class="bi bi-chevron-right"></i>
            </a>
         </div>
      </div>
   </div>
   <a href="{{url('membership/auth/logouts')}}" class="btn btn-full mx-3 gradient-red shadow-bg shadow-bg-xs">Logout</a>
@endsection
@section('script')
<script>

</script>
@endsection
