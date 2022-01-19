@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
          	<div class="d-flex flex-row align-items-center justify-content-between">
            	<h3 class="card-title">Referensi > Jenis Simpanan</h3>
            	<a href="{{url('backoffice/referensi/jenis-simpanan/create')}}" class="btn btn-primary">Tambah</a>
      		</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          	<div class="table-responsive">
	            <table id="table-jenisSimpanan" class="table table-bordered" width="100%" cellspacing="0">
	              <thead>
	              <tr>
	                <th>ID</th>
	                <th>Kode Tipe</th>
                  <th>Nama Tipe</th>
                  <th>Minimal Deposit</th>
                  <th>Maximal Deposit</th>
                  <th>SHU</th>
                  <th>Status</th>
	                <th>Aksi</th>
	              </tr>
	              </thead>
	              <tbody>
	              </tbody>
	            </table>
	        </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('script')
	@include('backoffice.referensi.jenis-simpanan.script')
@endsection