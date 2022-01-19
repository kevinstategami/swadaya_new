<!-- Modal -->
<div class="modal fade" id="cmsImageAuModal" tabindex="-1" role="dialog" aria-labelledby="cmsImageAuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsImageAuModalLabel">Form Gambar Tentang Kami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsImageAu" class="form-group row" method="POST" action="{{route('updateCmsImgAu')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Gambar</label>
              <input type="file" name="path_imgau" class="form-control" id="cmdPathImgAu" onchange="readURL(this,'previewImgAu')"/>
              <img id="previewImgAu" style="margin-top: 2rem;" width="100%" />
            </div>
          </div>

          <input type="hidden" id="cmsIdImgAu" name="id_imgau"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsImageAu()">Simpan</button>
      </div>
    </div>
  </div>
</div>