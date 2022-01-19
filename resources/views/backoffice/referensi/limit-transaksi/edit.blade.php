@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Limit Transaksi
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/limit-transaksi/update/'. $value->id)}}">
        	@csrf
          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Anggota</label>
              <select class="form-control" name="member_id">
                <option disabled selected>Pilih Anggota</option>
                @foreach($membership as $member)
                <option value="{{$member->id}}" {{$value->user_id == $member->user_id ? 'selected' : ''}}>{{$member->member_no}} || {{$member->fullname}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Limit Transaksi</label>
              <input class="form-control" type="number" name="transaction_limit" value="{{$value->transaction_limit}}">
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