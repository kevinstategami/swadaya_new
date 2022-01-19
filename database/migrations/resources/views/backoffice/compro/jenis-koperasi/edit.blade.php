@extends('backoffice.layouts.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            Form Jenis Koperasi
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <form method="POST" action="{{ url('backoffice/konfigurasi/jenis-koperasi/update/' . $value->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">Judul</label>
                                <input class="form-control" name="title" placeholder="Judul" value="{{ $value->title }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="description">{{ $value->description }}</textarea>

                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Foto </label>
                                <img style="width: 250px" id="previewImg" src="{{url('images/'. $value->dokumen->path) }}">
                                <input type="file" class="form-control" name="picture_file" onchange="readURL1(this)">
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
