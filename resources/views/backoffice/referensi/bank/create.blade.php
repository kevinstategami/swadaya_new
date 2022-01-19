@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Bank
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/bank/store')}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Kode Bank</label>
             <input class="form-control" type="text" name="bank_code" placeholder="Kode Bank">
           </div>
           <div class="form-group">
            <label class="form-label">Nama Bank</label>
            <input class="form-control" type="text" name="bank_name" placeholder="Nama Bank">
          </div>
          <div class="form-group">
            <label class="form-label">Nomor Rekening</label>
            <input class="form-control" type="text" name="account_number" placeholder="Nomor Rekening">
          </div>
          <div class="form-group">
            <label class="form-label">Nama Rekening</label>
            <input class="form-control" type="text" name="account_name" placeholder="Nama Rekening">
          </div>
          <div class="form-group">
            <label class="form-label">Kode Swift</label>
            <input class="form-control" type="text" name="swift_code" placeholder="Kode Swift">
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