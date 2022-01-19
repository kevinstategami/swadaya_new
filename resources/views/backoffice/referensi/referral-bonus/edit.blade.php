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
        <form method="POST" action="{{url('backoffice/referensi/referral-bonus/update/'. $value->id)}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama</label>
             <input class="form-control" type="text" name="name" value="{{$value->name}}">
           </div>
           <div class="form-group">
            <label class="form-label">Tipe Nilai</label>
            <select class="form-control" name="type">
              <option disabled selected>Pilih Tipe Nilai</option>
              <option value="PERSENTASE" {{$value->type == 'PERSENTASE' ? 'selected' : ''}}>PERSENTASE</option>
              <option value="NOMINAL" {{$value->type == 'NOMINAL' ? 'selected' : ''}}>NOMINAL</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Nilai</label>
            <input class="form-control" type="number" name="value" value="{{$value->value}}">
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