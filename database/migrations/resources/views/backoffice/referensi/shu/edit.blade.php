@extends('backoffice.layouts.app')
@section('content')
<!-- Main content -->
<section class="content mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
            Form SHU
          </h3>
        </div>
        <!-- /.card-header -->
        <form method="POST" action="{{url('backoffice/referensi/shu/update/'. $value->id)}}">
        	@csrf
          <div class="card-body">
           <div class="form-group">
             <label class="form-label">Nama SHU</label>
             <input class="form-control" type="text" name="shu_name" value="{{$value->shu_name}}">
           </div>
           <div class="form-group">
            <label class="form-label">Persentase %</label>
            <input class="form-control" type="number" name="percentage" value="{{$value->percentage}}">
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