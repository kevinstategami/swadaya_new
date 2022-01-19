<!-- Modal -->
<div class="modal fade" id="cmsFungsiPeranModal" tabindex="-1" role="dialog" aria-labelledby="cmsFungsiPeranModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cmsFungsiPeranModalLabel">Form Fungsi / Peran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsFungsiPeran" class="form-group row" method="POST" action="{{route('updateCmsFungsiPeran')}}">
          @csrf
          <div class="col-md-12">
            <h4> Fungsi Peran 1 </h4>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Pasal</label>
              <input type="text" class="form-control" name="title_fp_1" id="cmsTitleFungsiPeran1"/>
            </div>
            <div class="form-group">
              <label class="form-label">Isi</label>
              <textarea id="cmsDescriptionFungsiPeran1" class="form-control" name="description_fp_1" rows="10" cols="50"></textarea>
            </div>
          </div>

          <div class="col-md-12">
            <h4> Fungsi Peran 2 </h4>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label">Pasal</label>
              <input type="text" class="form-control" name="title_fp_2" id="cmsTitleFungsiPeran2"/>
            </div>
            <div class="form-group">
              <label class="form-label">Isi</label>
              <textarea id="cmsDescriptionFungsiPeran2" class="form-control" name="description_fp_2" rows="10" cols="50"></textarea>
            </div>
          </div>
          <input type="hidden" id="cmsIdFungsiPeran1" name="id_fp_1"/>
          <input type="hidden" id="cmsIdFungsiPeran2" name="id_fp_2"/>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsFungsiPeran()">Simpan</button>
      </div>
    </div>
  </div>
</div>