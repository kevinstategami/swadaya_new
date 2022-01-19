<!-- Modal -->
<div class="modal fade" id="cmsLogoModal" tabindex="-1" role="dialog" aria-labelledby="cmsLogoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsLogoModalLabel">Form Gambar Logo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsLogo" class="form-group row" method="POST" action="{{route('updateCmsLogo')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Logo</label>
              <input type="file" name="lg" class="form-control" id="cmsLogo" onchange="readURL(this,'previewLogo')"/>
              <img id="previewLogo" style="margin-top: 2rem;" width="100%" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Loading Screen Logo</label>
              <input type="file" name="llg" class="form-control" id="cmsLoadingLogo" onchange="readURL(this,'previewLoadingLogo')"/>
              <img id="previewLoadingLogo" style="margin-top: 2rem;" width="100%" />
            </div>
          </div>

          <input type="hidden" id="cmsIdLogo" name="id_logo"/>
          <input type="hidden" id="cmsIdLlg" name="id_llg"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsLogo()">Simpan</button>
      </div>
    </div>
  </div>
</div>