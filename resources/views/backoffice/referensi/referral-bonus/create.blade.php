@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Referral Bonus
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/referral-bonus/store')}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama</label>
             <input class="form-control" type="text" name="name" placeholder="Nama Referral Bonus">
           </div>
           <div class="form-group">
            <label class="form-label">Tipe Nilai</label>
            <select class="form-control" name="type">
              <option disabled selected>Pilih Tipe Nilai</option>
              <option value="PERSENTASE">PERSENTASE</option>
              <option value="NOMINAL">NOMINAL</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Nilai</label>
            <input class="form-control" type="number" name="value" placeholder="Nilai">
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