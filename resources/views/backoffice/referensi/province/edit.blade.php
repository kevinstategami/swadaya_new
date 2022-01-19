@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Provinsi
          </h3>
        </div>
        <form method="POST" action="{{url('backoffice/referensi/provinsi/update/'. $value->id)}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama</label>
             <input class="form-control" type="text" name="nama" value="{{$value->nama}}">
           </div>
           <div class="form-group">
            <label class="form-label">Latitude</label>
            <input class="form-control" type="text" name="latitude" value="{{$value->latitude}}">
          </div>
          <div class="form-group">
            <label class="form-label">Longitude</label>
            <input class="form-control" type="text" name="longitude" value="{{$value->longitude}}">
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