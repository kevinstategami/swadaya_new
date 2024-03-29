@extends('registrasi.layout.app_home')
@section('content')

<div class="pt-3">
   <div class="page-title d-flex">
      <div class="align-self-center me-auto">
         <h1 class="color-theme">Detail Insentif Referal</h1>
      </div>
      <div class="align-self-center ms-auto">
         <div class="dropdown-menu">
            <div class="card card-style shadow-m mt-1 me-1">
               <div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">
                  <a href="{{url('membership/auth/logouts')}}" class="list-group-item">
                     <i class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
                     <strong class="font-13">Log Out</strong>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="card card-style">
   <div class="content">
      <div class="tabs tabs-pill" id="tab-group-2">
         <div class="mt-3"></div>
         <div class="card overflow-visible card-style">
           <div class="content">
             <h4>Detail Insentif Referal</h4>
             <p>
               Berikut adalah rincian untuk detail insentif referal yang sudah <strong style="color:green">terverifikasi</strong>.</b>
             </p>
             <div class="border border-blue-dark rounded-s overflow-hidden">
               <table class="table color-theme border-blue-dark mb-0">
                 <thead class="rounded-s bg-blue-dark border-l">
                   <tr class="color-white">
                     <th scope="col">
                       <h5 class="color-white font-15 mb-0">Nama Member
                       </h5>
                     </th>
                     <th scope="col">
                       <h5 class="color-white font-15 mb-0">Nominal
                       </h5>
                     </th>
                   </tr>
                 </thead>
                 <tbody>

                   @foreach($walletHistory as $walletHistorys)
                   <?php
                    $pecah = explode(' ', $walletHistorys->description);
                    $memberAcc = App\Models\Membership\Member::where('member_no', $pecah[3])->first();
                   ?>
                   <tr>
                     <td><strong>{{$memberAcc->fullname}}</strong></td>
                     <td>{{number_format($walletHistorys->amount, 0, '.', '.')}}</td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
             </div>

           </div>
         </div>
         <div class="align-self-center ms-auto text-end">
           <a href="{{url('membership/index/home')}}">
            <span class="btn btn-xxs gradient-orange shadow-bg-xs">Kembali</span>
            </a>
         </div>
            </div>
         </div>
      </div>
   </div>

   @endsection
   @section('script')
   @endsection
