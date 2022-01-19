<!-- Modal -->
<div class="modal fade" id="cmsSecaraUmumModal" tabindex="-1" role="dialog" aria-labelledby="cmsSecaraUmumModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsSecaraUmumModalLabel">Form Secara Umum Dan Sejarah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsProgress" class="form-group row" method="POST" action="{{route('updateCmsProgress')}}">
          @csrf
          <div class="col-md-12">
            <h4> Secara Umum </h4>
          </div>
          <div class="col-md-12">
            <label class="form-label">Konten</label>
            <textarea class="form-control" style="height: 150px" name="secara_umum" id="cmsSecaraUmumDesc"></textarea>
          </div>
          <div class="col-md-12 mt-5">
            <h4> Sejarah </h4>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Tahun</label>
              <input type="text" class="form-control" name="tahun_pertama" id="cmsTahunPertamaTitle"/>
            </div>
            <div class="form-group">
              <label class="form-label">Konten</label>
              <textarea class="form-control" style="height: 150px" name="desription_tahun_pertama" id="cmsTahunPertamaDescription"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Tahun</label>
              <input type="text" class="form-control" name="tahun_kedua" id="cmsTahunKeduaTitle" />
            </div>
            <div class="form-group">
              <label class="form-label">Konten</label>
              <textarea class="form-control" style="height: 150px" name="desription_tahun_kedua" id="cmsTahunKeduaDescription"></textarea>
            </div>
          </div>
          <input type="hidden" id="cmsSecaraUmumId" name="id_secara_umum">
          <input type="hidden" id="cmsTahunPertamaId" name="id_tahun_pertama">
          <input type="hidden" id="cmsTahunKeduaId" name="id_tahun_kedua">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsProgress()">Simpan</button>
      </div>
    </div>
  </div>
</div>