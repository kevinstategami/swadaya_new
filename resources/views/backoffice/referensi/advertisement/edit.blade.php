@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Iklan
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/advertisement/update/'.$value->id)}}" enctype="multipart/form-data">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Status</label>
             <select class="form-control" name="status">
                <option selected disabled>Pilih Status</option>
                <option value="1" {{$value->status == '1' ? 'selected ' : ''}}>Aktif</option>
                <option value="0" {{$value->status == '1' ? 'selected ' : ''}}>Tidak Aktif</option>
             </select>
           </div>
           <div class="form-group">
             <label class="form-label">Gambar</label>
             <input type="file" class="form-control" name="ads_file" accept="image/png, image/gif, image/jpeg" onchange="previewImage(this, 'previewAds')"/>
             <img src="{{url('backoffice/referensi/advertisement/get-file/'.$value->dokumen_repo->filename)}}" class="mt-3" width="50%" id="previewAds" />
           </div>
          <div class="card-footer bg-white text-right">
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
       </div>
     </form>
   </div>
 </div>
 <!-- /.col-->
</div>
</section>
<!-- /.content -->
@endsection