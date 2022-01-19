<!-- Modal -->
<div class="modal fade" id="cmsIntroductionModal" tabindex="-1" role="dialog" aria-labelledby="cmsIntroductionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsIntroductionModalLabel">Form Pengenalan Beranda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsIntroductionHm" class="form-group row" method="POST" action="{{route('updateCmsIntroductionHm')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" name="title_bgau" id="cmsTitleIntroduction"/>
            </div>
            <div class="form-group">
              <label class="form-label">Deskripsi</label>
              <textarea id="cmsDescriptionIntroduction" class="form-control" name="description_bgau" rows="10" cols="30"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Latar Belakang</label>
              <input type="file" name="path_bgau" class="form-control" id="cmsPathIntroduction" onchange="readURL(this, 'previewBgau')"/>
              <img id="previewBgau" style="margin-top: 2rem;" width="100%" />
            </div>
          </div>

          <input type="hidden" id="cmsIdIntroduction" name="id_bgau"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsIntroductionHm()">Simpan</button>
      </div>
    </div>
  </div>
</div>