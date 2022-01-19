<!-- Modal -->
<div class="modal fade" id="cmsAboutUsModal" tabindex="-1" role="dialog" aria-labelledby="cmsAboutUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsAboutUsModalLabel">Form Tentang Kami</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsAboutUs" class="form-group row" method="POST" action="{{route('updateCmsAboutUs')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Judul</label>
              <input id="cmsTitleAboutUs" class="form-control" name="title_au" />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Deskripsi</label>
              <textarea id="cmsDescriptionAboutUs" class="form-control" name="description_au" rows="10" cols="30"></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Isi</label>
              <textarea id="cmsContentAboutUs" class="form-control" name="content_au" rows="10" cols="50"></textarea>
            </div>
          </div>
          <div class="col-md-12">
              <label class="form-label">Latar Belakang</label>
              <input type="file" name="path_bgauhm" class="form-control" id="cmsPathAboutUs" onchange="readURL(this, 'previewBgauhm')"/>
              <img id="previewBgauhm" style="margin-top: 2rem;" width="100%" />
            </div>
          <input type="hidden" id="cmsIdAboutUs" name="id_au"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsAboutUs()">Simpan</button>
      </div>
    </div>
  </div>
</div>