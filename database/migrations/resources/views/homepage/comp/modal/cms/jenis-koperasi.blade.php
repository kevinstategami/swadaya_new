<!-- Modal -->
<div class="modal fade" id="cmsJenisKoperasiModal" tabindex="-1" role="dialog" aria-labelledby="cmsJenisKoperasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsJenisKoperasiModalLabel">Form Jenis Koperasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsJenisKoperasi" class="form-group row" method="POST" action="{{route('updateCmsJenisKoperasi')}}">
          @csrf
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" name="judul_jenis_koperasi" id="cmsTitleJenisKoperasiTitle"/>
            </div>
          </div>
          <input type="hidden" id="cmsTitleJenisKoperasiId" name="id_jenis_koperasi" id="cmsTitleJenisKoperasiId" />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{route('jenisKoperasi')}}" class="btn btn-primary text-white">Kelola Jenis Koperasi</a>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsJenisKoperasi()">Simpan</button>
      </div>
    </div>
  </div>
</div>