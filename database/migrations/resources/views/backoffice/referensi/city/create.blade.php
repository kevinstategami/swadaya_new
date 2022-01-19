@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Kota
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/kota/store')}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama Kota</label>
             <input class="form-control" type="text" name="nama" placeholder="Nama Kota">
           </div>
           <div class="form-group">
            <label class="form-label">Provinsi</label>
            <select class="form-control" name="idProv">
              <option disabled selected>Pilih Provinsi</option>
              @foreach($province as $value)
              <option value="{{$value->id}}">{{$value->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label">Latitude</label>
            <input class="form-control" type="text" name="latitude" placeholder="Latitude">
          </div>
          <div class="form-group">
            <label class="form-label">Longitude</label>
            <input class="form-control" type="text" name="longitude" placeholder="Longitude">
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