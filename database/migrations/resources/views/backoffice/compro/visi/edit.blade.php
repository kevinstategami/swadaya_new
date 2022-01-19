@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Visi
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/konfigurasi/visi/update/'. $value->id)}}">
        	@csrf
	        <div class="card-body">
	          <label class="form-label">Visi</label>
            <input class="form-control" name="description" placeholder="deskripsi" value="{{$value->description}}">
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