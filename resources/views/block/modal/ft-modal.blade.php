<!-- Modal -->
<div class="modal fade" id="cmsBlockFtModal" tabindex="-1" role="dialog" aria-labelledby="cmsBlockFtModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsBlockFtModalLabel">Form Card Content Block</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsBlockFt" class="form-group row" method="POST" action="{{route('updateCmsBlock')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Gambar</label>
              <input type="file" name="file" class="form-control" id="cmsBlockFtFile" onchange="uploadFile(this, 'previewImageBlockFt', 'cmsBlockFtPath')"/>
              <input type="hidden" name="path" class="form-control" id="cmsBlockFtPath"/>
              <div class="previewImageBlockFt"></div>
            </div>
            <div class="form-group">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" name="title" id="cmsBlockFtTitle"/>
            </div>
            <div class="form-group">
              <label class="form-label">Sub Judul</label>
              <input type="text" class="form-control" name="title2" id="cmsBlockFtTitle2"/>
            </div>
            <div class="form-group">
              <label class="form-label">Deskripsi</label>
              <textarea id="cmsBlockFtDescription" class="form-control" name="description" rows="10" cols="30"></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Urutan</label>
              <input type="number" name="order" class="form-control" id="cmsBlockFtOrder"/>
            </div>
          </div>

          <input type="hidden" id="cmsBlockFtId" name="id"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsBlockFt()">Simpan</button>
        <a href="" type="button" id="deleteBlockFt" class="btn btn-danger text-white">Hapus</a>
      </div>
    </div>
  </div>
</div>