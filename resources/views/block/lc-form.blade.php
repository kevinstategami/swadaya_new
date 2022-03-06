@extends('layouts.app')
@section('content')
<div id="cc-form">
    <div class="container">
        
        <div class="row mt50 mb25">
            <div class="col-md-12 text-center">
                <h1 class="font-size-normal">
                    Form List Content Block
                    <small class="heading heading-solid center-block"></small>
                </h1>
            </div>
            
            <form id="updatecmsBlockLc" class="form-group row" method="POST" action="{{route('updateCmsBlock')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control" name="title" id="cmsBlockLcTitle" value="{{$value->title}}"/>
              </div>
              <div class="col-md-12 row" id="cmsBlockLcMultipleValue">
                @for($i = 0; $i < ($value->index_value ? $value->index_value : 1); $i++)
                <div class="card-form-cms">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-label">Gambar</label>
                      <input type="file" name="file" class="form-control" id="cmsBlockLcFile_{{$i}}" onchange="uploadFile(this, 'previewImageBlockLc_{{$i}}', 'cmsBlockLcPath_{{$i}}')"/>
                      <input type="hidden" name="path" class="form-control" id="cmsBlockLcPath_{{$i}}" value="{{isset(explode('||', $value->path)[$i]) ? explode('||', $value->path)[$i] : '' }}"/>
                      <div class="previewImageBlockLc_{{$i}}">
                        <img src="{{isset(explode('||', $value->path)[$i]) ? url('get-block-image/'.explode('||', $value->path)[$i]) : ''}}" style="margin-top: 2rem;" width="50%"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="form-label">Judul</label>
                      <input type="text" class="form-control" name="title" id="cmsBlockLcTitle2_{{$i}}" value="{{isset(explode('||', $value->title2)[$i]) ? explode('||', $value->title2)[$i] : '' }}"/>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-label">Deskripsi</label>
                      <textarea id="cmsBlockLcDescription_{{$i}}" class="form-control" name="description" rows="1" cols="1">{{isset(explode('||', $value->description)[$i]) ? explode('||', $value->description)[$i] : ''}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-1 d-flex align-items-center">
                    <a href="{{route('cmsBlockDeleteIndexValue', ['index'=>$i, 'id'=>$value->id])}}"><i class="fa fa-fw text-danger" style="font-size: 2rem">&#xf1f8</i></a>
                  </div>
                </div>
                @endfor
              </div>
              <div class="col-md-12">
                <a style="cursor: pointer;" onclick="updateCmsBlockLc(1)"><h5 style="color: orange"><i class="fa fa-fw fa-plus"></i> Add Value</h5></a>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Latar Belakang</label>
                  <input type="file" name="file" class="form-control" id="cmsBlockLcFileBg" onchange="uploadFile(this, 'previewcmsBlockLcBg', 'cmsBlockLcPathBg')"/>
                  <input type="hidden" name="background_path" class="form-control" id="cmsBlockLcPathBg" value="{{$value->background_path}}"/>
                  <div class="previewcmsBlockLcBg">
                        @if($value->background_path)
                            <img src="{{url('get-block-image/'. $value->background_path)}}" width="50%" />
                        @endif
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-label">Urutan</label>
                  <input type="number" name="order" class="form-control" id="cmsBlockLcOrder" value="{{$value->order}}"/>
                </div>
              </div>

              <input type="hidden" id="cmsBlockLcId" name="id" value="{{$value->id}}" />
              <input type="hidden" id="cmsBlockLcIndexValue" name="indexValue" value="{{$value->index_value}}" />
            </form>
            <a href="{{url('/')}}" class="btn btn-secondary">Kembali</a>
            <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsBlockLc()">Simpan</button>
            <a href="{{url('cms/block/delete/'. $value->id)}}" class="btn btn-danger text-white">Hapus</a>
        </div>
    </div>
</div>
@endsection
