<div id="mdlReq" class="menu-size" style="height:370px;">
   <div class="d-flex mx-3 mt-3 py-1">
      <div class="align-self-center">
         <h1 class="mb-0">Tarik Saldo ke Dompet</h1>
      </div>
      <div class="align-self-center ms-auto">
         <a href="#" class="ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
         <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
         </a>
      </div>
   </div>
   <div class="divider divider-margins mt-3"></div>
   <form action="{{url('tarikSaldo')}}" method="POST" id="fTarik">
     {{csrf_field()}}
   <div class="content mt-0">
      <div class="form-custom form-label form-icon">
         <i class="bi bi-receipt font-14"></i>
         <input type="email" class="form-control rounded-xs" id="c32" placeholder="" value="Tarik Saldo Simpanan ke Dompet ({{Auth::user()->name}}) " />
         <label for="c32" class="form-label-always-active color-highlight font-11">Keterangan</label>
         <span class="font-10"></span>
      </div>
      <div class="pb-3"></div>
      <div class="form-custom form-label form-icon">
         <i class="bi bi-code-square font-14"></i>
         <input type="number" class="form-control rounded-xs" id="c43" placeholder="150.000"/>
         <label for="c43" class="form-label-always-active color-highlight font-11">Amount</label>
         <span class="font-10">( IDR )</span>
      </div>
      <div class="pb-2"></div>
      <!-- <div class="form-check form-check-custom">
         <input class="form-check-input" type="checkbox" name="type" value="" id="c2a">
         <label class="form-check-label" for="c2a">I accept the Request <a href="#">Terms of Service</a></label>
         <i class="is-checked color-green-dark font-14 bi bi-check-circle-fill"></i>
         <i class="is-unchecked color-green-dark font-14 bi bi-circle"></i>
      </div> -->
   </div>
 </form>
   <a href="#" id="btn-tarik" class="mx-3 btn btn-full gradient-blue shadow-bg shadow-bg-s">Kirim</a>
</div>

@section('script')
<script>
$('#btn-tarik').on('click', function(){
  $.alert({
      title: 'Informasi',
      content: 'Fitur ini masih dalam pengembangan',
  });
</script>
@endsection
