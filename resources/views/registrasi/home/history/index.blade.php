@extends('registrasi.layout.app_home')
@section('content')

<div class="pt-3">
   <div class="page-title d-flex">
      <div class="align-self-center me-auto">
         <h1 class="color-theme">Riwayat Transaksi</h1>
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
         <div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">
            @foreach($history as $historys)
            <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-5">
               <div class="align-self-center">
                  <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-xs"><i class="bi bi-clock-history font-18 color-white"></i></span>
               </div>
               <div class="align-self-center ps-1">
                 @if($historys->invoice !=null)
                 <h6 class="pt-3 mb-n1 font-13">{{$historys->mutation_type == "PB" ? $historys->mutation_type == "SMT" "Transaksi simpanan akhir tahun buku " : "Peranikan Referal Bonus "}}
                   &nbsp;&nbsp;{{$historys->mutation_type == "PB" ? $historys->created_at->format('F') : $historys->created_at->format('y')}}
                 </h6>
                 @else
                 <h6 class="pt-3 mb-n1 font-13">{{$historys->description}}
                 </h6>
                 @endif

                     <p class="mb-1 font-13 opacity-70">Nominal : Rp. {{number_format($historys->amount, 0, '.', '.')}}</p>
                        <p>Tanggal : {{ $historys->created_at->format('d/F/Y H:s') }}</p>
                     </div>
                  </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>

   @endsection
   @section('script')
   @endsection
