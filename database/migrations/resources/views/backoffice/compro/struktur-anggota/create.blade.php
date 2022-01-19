@extends('backoffice.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Form Struktur Anggota
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="{{ url('backoffice/konfigurasi/struktur-anggota/store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input class="form-control" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Divisi</label>
                                    <input class="form-control" name="divisi" placeholder="Divisi">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Foto </label>
                                    <img style="width: 250px" id="previewImg">
                                    <input type="file" class="form-control" name="picture_file" onchange="readURL1(this)" required>
                                </div>
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
<script>
  function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#previewImg')
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
