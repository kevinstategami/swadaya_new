<!-- Modal -->
<div class="modal fade" id="cmsBlockMcModal" tabindex="-1" role="dialog" aria-labelledby="cmsBlockMcModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsBlockMcModalLabel">Form Middle Content Block</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsBlockMc" class="form-group row" method="POST" action="{{route('updateCmsBlock')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Gambar</label>
              <input type="file" name="file" class="form-control" id="cmsBlockMcFile" onchange="uploadFile(this, 'previewImageBlockMc', 'cmsBlockMcPath')"/>
              <input type="hidden" name="path" class="form-control" id="cmsBlockMcPath"/>
              <div class="previewImageBlockMc"></div>
            </div>
            <div class="form-group">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" name="title" id="cmsBlockMcTitle"/>
            </div>
            <div class="form-group">
              <label class="form-label">Deskripsi</label>
              <textarea id="cmsBlockMcDescription" class="form-control" name="description" rows="10" cols="30"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Latar Belakang</label>
              <input type="file" name="file" class="form-control" id="cmsBlockMcFileBg" onchange="uploadFile(this, 'previewCmsBlockMcBg', 'cmsBlockMcPathBg')"/>
              <input type="hidden" name="background_path" class="form-control" id="cmsBlockMcPathBg"/>
              <div class="previewCmsBlockMcBg"></div>
            </div>
            <div class="form-group">
              <label class="form-label">Urutan</label>
              <input type="number" name="order" class="form-control" id="cmsBlockMcOrder"/>
            </div>
          </div>

          <input type="hidden" id="cmsBlockMcId" name="id"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsBlockMc()">Simpan</button>
        <a href="" type="button" id="deleteBlockMc" class="btn btn-danger text-white">Hapus</a>
      </div>
    </div>
  </div>
</div>