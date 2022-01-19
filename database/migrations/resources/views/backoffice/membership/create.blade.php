@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Form Anggota
                    </h3>
                </div>
                <!-- /.card-header -->
                <form method="POST" action="{{ route('saveAnggota') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input class="form-control" type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Kata Sandi</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="fullname">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Identitas</label>
                                        <input class="form-control" type="text" name="identity_no">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Provinsi</label>
                                        <select class="select2" id="province" name="province_id" style="width: 100%;" data-placeholder="Pilih Provinsi">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Kota/Kabupaten</label>
                                        <select class="select2" id="cities" name="city_id" style="width: 100%;" data-placeholder="Pilih Kota/Kabupaten">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Kode Pos</label>
                                        <input class="form-control" type="number" name="postal_code">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Telp</label>
                                        <input class="form-control" type="text" name="phone_no">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input class="form-control" type="text" name="birth_place">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="birth_date">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="gender">
                                            <option value="L">L</option>
                                            <option value="P">P</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Foto</label>
                                        <input type="file" class="form-control" name="picture_file" onchange="readURL1(this)">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <img style="width: 250px; border-radius: 10px;" id="previewImg"  src="https://i.pinimg.com/736x/0d/36/e7/0d36e7a476b06333d9fe9960572b66b9--profile-pictures-doe.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
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

  $(document).ready(function(){
      getProvince();
  });

  $("select#province").on("change", function(){
    var val = $("select#province").val();
    if(val != null){
        getCities();
    }
  })

  function getProvince(){
    $("select#province").select2().select2('destroy').val(null).trigger('change').select2({
        theme: 'bootstrap',
        allowClear: true,
        ajax: {
            url: '{{ url()->full() }}',
            data: function(params) {
                var query = {
                    search: params.term,
                    province: true
                }
                return query;
            }
        }
    });
}

function getCities(){
    $("select#cities").select2().select2('destroy').val(null).trigger('change').select2({
        theme: 'bootstrap',
        allowClear: true,
        ajax: {
            url: '{{ url()->full() }}',
            data: function(params) {
                var query = {
                    search: params.term,
                    cities: true,
                    province_id: $("select#province").val()
                }
                return query;
            }
        }
    });
}
</script>
@endsection
