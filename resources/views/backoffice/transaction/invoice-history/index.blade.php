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
             <h3 class="card-title">Tagihan</h3>
           </div>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
           <div class="table-responsive">
             <table id="table-tagihan-history" class="table table-bordered" width="100%" cellspacing="0">
               <thead>
                 <tr>
                  <th>Nama</th>
                  <th>No Member</th>
                  <th>Email</th>
                  <th>Jumlah</th>
                  <th>Tipe Invoice</th>
                  <th>Tanggal Terbit</th>
                  <th>Status</th>
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
@include('backoffice.transaction.invoice-history.image')
@include('backoffice.transaction.invoice-history.script')
@endsection