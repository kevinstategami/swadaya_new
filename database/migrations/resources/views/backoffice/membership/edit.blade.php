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
                <form method="POST" action="{{ route('updateAnggota', $value->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="hidden" name="user_id" value="{{$value->user_id}}">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email" value="{{$value->email}}" disabled>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Member</label>
                                        <input class="form-control" type="text" name="member_no" value="{{$value->member_no}}" disabled>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input class="form-control" type="text" name="fullname" value="{{$value->fullname}}">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Identitas</label>
                                        <input class="form-control" type="text" name="identity_no" value="{{$value->identity_no}}" disabled>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Provinsi</label>
                                        <select class="select2" id="province" name="province_id" style="width: 100%;" data-placeholder="Pilih Provinsi">
                                            <option value="{{$value->province_id}}">{{\App\Models\MasterData\Province::where('id',$value->province_id)->value('nama')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Kota/Kabupaten</label>
                                        <select class="select2" id="cities" name="city_id" style="width: 100%;" data-placeholder="Pilih Kota/Kabupaten">
                                            <option value="{{$value->city_id}}">{{\App\Models\MasterData\City::where('id',$value->city_id)->value('nama')}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="address">{{$value->address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Kode Pos</label>
                                        <input class="form-control" type="number" name="postal_code" value="{{$value->postal_code}}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Telp</label>
                                        <input class="form-control" type="text" name="phone_no" value="{{$value->phone_no}}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Templat Lahir</label>
                                        <input class="form-control" type="text" name="birth_place" value="{{$value->birth_place}}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" name="birth_date" value="{{$value->birth_date}}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="gender">
                                            <option value="{{$value->gender}}" selected>{{$value->gender}}</option>
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
                                        <textarea class="form-control" name="description">{{$value->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-4">
                                    @if($value->profile_pic)
                                    <img style="width: 250px; border-radius: 10px;" id="previewImg" src="{{url('images/'. $value->profile_pic) }}">
                                    @else
                                    <img id="previewImg"  style="width: 250px; border-radius: 10px;" src="https://i.pinimg.com/736x/0d/36/e7/0d36e7a476b06333d9fe9960572b66b9--profile-pictures-doe.jpg">
                                    @endif
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
    $("select#province").select2().select2('destroy').val('{{$value->province_id}}').trigger('change').select2({
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
    $("select#cities").select2().select2('destroy').val('{{$value->city_id}}').trigger('change').select2({
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
