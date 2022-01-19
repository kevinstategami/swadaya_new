@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form Limit Transaksi
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/limit-transaksi/store')}}">
        	@csrf
          <div class="card-body">
            <div class="form-group">
              <label class="form-label">Anggota</label>
              <select class="form-control" name="member_id">
                <option disabled selected>Pilih Anggota</option>
                @foreach($membership as $value)
                <option value="{{$value->id}}">{{$value->member_no}} || {{$value->fullname}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label class="form-label">Limit Transaksi</label>
              <input class="form-control" type="number" name="transaction_limit" placeholder="Limit Transaksi">
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