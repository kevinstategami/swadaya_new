@extends('registrasi.layout.app_home')
@section('content')

<div class="pt-3">
   <div class="page-title d-flex">
      <div class="align-self-center me-auto">
         <h1 class="color-theme">Transaksi</h1>
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
         <div class="tab-controls rounded-m p-1 overflow-visible">
            <a class="font-11 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">Menunggu Pembayaran</a>
            <a class="font-11 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-5" aria-expanded="false">Menunggu Verifikasi</a>
            <a class="font-11 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-6" aria-expanded="false">Riwayat</a>
         </div>
         <div class="mt-3"></div>
         <div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">
            <div class="divider my-2 opacity-50"></div>
            @foreach($pending as $pendings)
            <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-5">
               <div class="align-self-center">
                  <span class="icon rounded-s me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-cash font-18 color-white"></i></span>
               </div>
               <div class="align-self-center ps-1">
                  <h5 class="pt-3 mb-n1">{{$pendings->invoice_code}} - <span class="text-danger" style="font-size:12px">Belum Bayar</span></h5>

                     <p class="mb-1 font-13 opacity-70">Tagihan : Rp. {{number_format($pendings->total_amount, 0, '.', '.')}}<br>

                        Terbit Pada : {{ $pendings->created_at->format('d/F/Y') }}</p>
                     </div>

                        @if($pendings->invoice_type != "CRRFBNS")

                        <div class="align-self-center ms-auto text-end">
                          <a href="{{url('membership/index/activity-detail/'.$pendings->id)}}">
                           <span class="btn btn-xxs gradient-orange shadow-bg-xs">Detail Transaksi</span>
                           </a>
                          <a href="{{url('membership/index/uploadBukti/'.$pendings->id)}}">
                           <span class="btn btn-xxs gradient-green shadow-bg-xs">Upload Bukti</span>
                           </a>
                        </div>
                        @endif

                  </a>
              @endforeach
               </div>
               <div class="collapse" id="tab-5" data-bs-parent="#tab-group-2">
                <div class="divider my-2 opacity-50"></div>
                @foreach($waiting as $waitings)
                <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-5">
                   <div class="align-self-center">
                      <span class="icon rounded-s me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-cash font-18 color-white"></i></span>
                   </div>
                   <div class="align-self-center ps-1">
                      <h5 class="pt-3 mb-n1">{{$waitings->invoice_code}} - <span class="text-info" style="font-size:12px">Menunggu Verifikasi</span></h5>
                      <p class="mb-1 font-13 opacity-70">Tagihan : Rp. {{number_format($waitings->total_amount, 0, '.', '.')}}<br>

                        Tanggal Terbit : {{ $waitings->created_at->format('d/F/Y') }}</p>
                     </div>
                     @if($waitings->invoice_type != "CRRFBNS")
                     <div class="align-self-center ms-auto text-end">
                       <a href="{{url('membership/index/activity-detail/'.$waitings->id)}}">
                        <span class="btn btn-xxs gradient-orange shadow-bg-xs">Detail Transaksi</span>
                        </a>
                     </div>
                     @endif
                  </a>
                  @endforeach
               </div>
               <div class="collapse" id="tab-6" data-bs-parent="#tab-group-2">
                  <div class="divider my-2 opacity-50"></div>
                  @foreach($history as $historys)
                  <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-5">
                     <div class="align-self-center">
                        <span class="icon rounded-s me-2 gradient-blue shadow-bg shadow-bg-xs"><i class="bi bi-cash font-18 color-white"></i></span>
                     </div>
                     <div class="align-self-center ps-1">
                        <h5 class="pt-3 mb-n1">{{$historys->invoice_code}} - <span class="{{$historys->status == "2" ? "text-success" : "text-danger"}}" style="font-size:12px">{{$historys->status == "2" ? "Terverifikasi" : "Ditolak"}}</span></h5>
                        <p class="mb-1 font-13 opacity-70">Tagihan : Rp. {{number_format($historys->total_amount, 0, '.', '.')}}<br>
                        Tanggal Terbit : {{ $historys->created_at->format('d/F/Y') }}</p>
                     </div>
                     @if($historys->historys != "CRRFBNS")
                     <div class="align-self-center ms-auto text-end">
                       <a href="{{url('membership/index/activity-detail/'.$historys->id)}}">
                        <span class="btn btn-xxs gradient-orange shadow-bg-xs">Detail Transaksi</span>
                        </a>
                     </div>
                     @endif
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
