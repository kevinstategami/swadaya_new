@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Tipe Dokumen
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/document-type/store')}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Kode</label>
             <input class="form-control" type="text" name="code" placeholder="Kode">
           </div>
           <div class="form-group">
             <label class="form-label">Deskripsi</label>
             <input class="form-control" type="text" name="description" placeholder="Deskripsi">
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