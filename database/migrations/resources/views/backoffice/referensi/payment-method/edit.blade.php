@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Metode Pembayaran
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/payment-method/update/'. $value->id)}}">|
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama Metode</label>
             <input class="form-control" type="text" name="method_name" value="{{$value->method_name}}">
           </div>
         </div>
         <div class="card-footer text-right">
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
       </form>
     </div>
   </div>
   <!-- /.col-->
 </div>
</section>
<!-- /.content -->
@endsection