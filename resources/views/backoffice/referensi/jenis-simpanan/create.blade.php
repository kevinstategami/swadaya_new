@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Jenis Simpanan
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/jenis-simpanan/store')}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Kode Tipe</label>
             <input class="form-control" type="text" name="type_code" placeholder="Kode Tipe">
           </div>
           <div class="form-group">
            <label class="form-label">Nama Tipe</label>
            <input class="form-control" type="text" name="type_name" placeholder="Nama Tipe">
          </div>
          <div class="form-group">
            <label class="form-label">Minimal Deposit</label>
            <input class="form-control" type="number" name="deposit_min" placeholder="Minimal Deposit">
          </div>
          <div class="form-group">
            <label class="form-label">Maximal Deposit</label>
            <input class="form-control" type="number" name="deposit_max" placeholder="Maximal Deposit">
          </div>
          <div class="form-group">
            <label class="form-label">SHU</label>
            <select class="form-control" name="shu_id">
              <option disabled selected>Pilih SHU</option>
              @foreach($shu as $value)
              <option value="{{$value->id}}">{{$value->shu_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Status</label>
            <select class="form-control" name="status">
              <option disabled selected>Pilih Status</option>
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
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