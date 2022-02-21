@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Pengguna
          </h3>
        </div>
        <!-- /.card-header -->
        <form id="form-create" method="POST" action="{{route('storeUserPengguna')}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama</label>
             <input class="form-control" type="text" name="name" placeholder="Nama">
           </div>
           <div class="form-group">
             <label class="form-label">Email</label>
             <input class="form-control" type="email" name="email" placeholder="Email">
           </div>
           <div class="form-group">
             <label class="form-label">Username</label>
             <input class="form-control" type="text" name="username" placeholder="Username">
           </div>
           <div class="form-group">
             <label class="form-label">Password</label>
             <input class="form-control" type="password" name="password" id="password" placeholder="Password">
           </div>
           <div class="form-group">
             <label class="form-label">Konfirmasi Password</label>
             <input class="form-control" type="password" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password">
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
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
        </div>
        <div class="card-footer text-right">
         <button type="button" class="btn btn-primary" onclick="checkPassword()">Simpan</button>
       </div>
     </form>
   </div>
 </div>
 <!-- /.col-->
</div>
</section>
<!-- /.content -->
@endsection
@section('script')
<script>
  function checkPassword() {
    var password = $('#password').val()
    var konfirmasiPassword = $('#konfirmasi_password').val()

    if(password == konfirmasiPassword){
      $('#form-create').submit();
    }else{
      Swal.fire('Validasi!', 'Password dan Konfirmasi Password belum sesuai!', 'error')
    }
  }
</script>
@endsection