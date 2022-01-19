@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Tentang Kami
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/konfigurasi/about-us/update/'. $value->id)}}">
          @csrf
          <div class="card-body">
            <label class="form-label">Konten</label>
            <textarea id="content" name="content" height="250px">{{ $value->content }}</textarea>
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
@section('script')
<script>
  // Summernote
    $('#content').summernote({
      height: 250
    })
</script>
@endsection