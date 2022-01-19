@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Syarat Keanggotaan
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/konfigurasi/syarat-keanggotaan/store')}}">
        	@csrf
	        <div class="card-body">
	          <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Deskripsi"></textarea>
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