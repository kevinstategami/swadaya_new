@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<!-- Main content -->
<section class="content mt-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title">Keanggotaan > Aktivasi Data Anggota</h3>
          </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="table-data-anggota-activation" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>ID Member</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Nomor Identitas</th>
                  <th>Alamat</th>
                  <th>No. Telp</th>
                  <th>Jenis Kelamin</th>
                  <th>Bergabung Sejak</th>
                  <th>Status Pembayaran</th>
                  <th>Tindakan</th>
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
  @include('backoffice.membership.activation.activation')
	@include('backoffice.membership.activation.script')
@endsection