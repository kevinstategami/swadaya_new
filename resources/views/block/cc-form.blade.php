@extends('layouts.app')
@section('content')
<div id="cc-form">
    <div class="container">
        
        <div class="row mt50 mb25">
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    Form Card Content Block
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>
            
            <form id="updatecmsBlockCc" class="form-group row" method="POST" action="{{route('updateCmsBlock')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" id="cmsBlockCcTitle" value="{{$value->title}}"/>
              </div>
              <div class="col-md-12 row" id="cmsBlockCcMultipleValue">
                @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
                <div class="card-form-cms">
                  <!-- <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="file" class="form-control" id="cmsBlockCcFile_{{$i}}" onchange="uploadFile(this, 'previewImageBlockMc', 'cmsBlockCcPath')"/>
                      <input type="hidden" name="path" class="form-control" id="cmsBlockCcPath_{{$i}}"/>
                      <div class="previewCmsBlockCc"></div>
                    </div>
                  </div> -->
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="form-label">Judul</label>
                      <input type="text" class="form-control" name="title" id="cmsBlockCcTitle2_{{$i}}" value="{{isset(explode(',', $value->title2)[$i]) ? explode(',', $value->title2)[$i] : '' }}"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label">Deskripsi</label>
                      <textarea id="cmsBlockCcDescription_{{$i}}" class="form-control" name="description" rows="1" cols="1">{{isset(explode(',', $value->description)[$i]) ? explode(',', $value->description)[$i] : ''}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-1 d-flex align-items-center">
                    <a href="{{route('cmsBlockDeleteIndexValue', ['index'=>$i, 'id'=>$value->id])}}"><i class="fa fa-fw text-danger" style="font-size: 2rem">&#xf1f8</i></a>
                  </div>
                </div>
                @endfor
              </div>
              <div class="col-md-12">
                <a style="cursor: pointer;" onclick="updateCmsBlockCc(1)"><h5 style="color: orange"><i class="fa fa-fw fa-plus"></i> Add Value</h5></a>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Latar Belakang</label>
                  <input type="file" name="file" class="form-control" id="cmsBlockCcFileBg" onchange="uploadFile(this, 'previewcmsBlockCcBg', 'cmsBlockCcPathBg')"/>
                  <input type="hidden" name="background_path" class="form-control" id="cmsBlockCcPathBg" value="{{$value->background_path}}"/>
                  <div class="previewcmsBlockCcBg">
                        @if($value->background_path)
                            <img src="{{url('get-block-image/'. $value->background_path)}}" width="50%" />
                        @endif
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Urutan</label>
                  <input type="number" name="order" class="form-control" id="cmsBlockCcOrder" value="{{$value->order}}"/>
                </div>
              </div>

              <input type="hidden" id="cmsBlockCcId" name="id" value="{{$value->id}}" />
              <input type="hidden" id="cmsBlockCcIndexValue" name="indexValue" value="{{$value->index_value}}" />
            </form>
            <a href="{{url('/')}}" class="btn btn-secondary">Kembali</a>
            <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsBlockCc()">Simpan</button>
            <a href="{{url('cms/block/delete/'. $value->id)}}" class="btn btn-danger text-white">Hapus</a>
        </div>
    </div>
</div>
@endsection
