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
        <form id="form-create" method="POST" action="{{route('updateUserPengguna', $value->id)}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama</label>
             <input class="form-control" type="text" name="name" value="{{$value->name}}">
           </div>
           <div class="form-group">
             <label class="form-label">Email</label>
             <input class="form-control" type="email" name="email" value="{{$value->email}}">
           </div>
           <div class="form-group">
             <label class="form-label">Username</label>
             <input class="form-control" type="text" name="username" value="{{$value->username}}">
           </div>
           <div class="form-group">
             <label class="form-label">Password</label>
             <input class="form-control" type="password" name="password" id="password" placeholder="Biarkan jika tidak ingin dirubah!">
           </div>
           <div class="form-group">
            <label class="form-label">Level</label>
            <select class="form-control" name="type">
             <option value="CMS">CMS</option>
             <option value="ADMIN">ADMIN</option>
           </select>
           </div>
           <div class="form-group">
             <label class="form-label">Status</label>
             <select class="form-control" name="status_aktivasi">
              <option value="1" {{$value->status_aktivasi == 1 ? 'selected' : ''}}>Aktif</option>
              <option value="0" {{$value->status_aktivasi == 0 ? 'selected' : ''}}>Tidak Aktif</option>
            </select>
          </div>
        </div>
        {{-- <input type="hidden" name="type" value="ADMIN"/> --}}
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