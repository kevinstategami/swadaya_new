<!-- Modal -->
<div class="modal fade" id="cmsImageSkModal" tabindex="-1" role="dialog" aria-labelledby="cmsImageSkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsImageSkModalLabel">Form Gambar Syarat Keanggotaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsImageSk" class="form-group row" method="POST" action="{{route('updateCmsImageSk')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Gambar</label>
              <input type="file" name="path_bgsk" class="form-control" id="cmdPathImgSk" onchange="readURL(this,'previewImgSk')"/>
              <img id="previewImgSk" style="margin-top: 2rem;" width="100%" />
            </div>
          </div>

          <input type="hidden" id="cmsIdImgSk" name="id_imgSk"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsImageSk()">Simpan</button>
      </div>
    </div>
  </div>
</div>