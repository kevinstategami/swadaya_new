<!-- Modal -->
<div class="modal fade" id="addBlockModal" tabindex="-1" role="dialog" aria-labelledby="addBlockModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBlockModalLabel">Add New Block</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateCmsLogo" class="form-group row" method="POST" action="{{route('updateCmsLogo')}}" enctype="multipart/form-data">
          @csrf
          <div class="col-md-4 mb-3" onclick="createBlock('MC')">
            <div class="card">
              <div class="card-body">
                <img class="w-100" src="{{asset('img/block_layout/middle_content.png')}}">
              </div>
              <div class="card-footer text-center">
                <h5>Middle Content</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" onclick="createBlock('CC')">
            <div class="card">
              <div class="card-body">
                <img class="w-100" src="{{asset('img/block_layout/card_content.png')}}">
              </div>
              <div class="card-footer text-center">
                <h5>Card Content</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" onclick="createBlock('LC')">
            <div class="card">
              <div class="card-body">
                <img class="w-100" src="{{asset('img/block_layout/list_content.png')}}">
              </div>
              <div class="card-footer text-center">
                <h5>List Content</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" onclick="createBlock('ZC')">
            <div class="card">
              <div class="card-body">
                <img class="w-100" src="{{asset('img/block_layout/zigzag_content.png')}}">
              </div>
              <div class="card-footer text-center">
                <h5>Zigzag Content</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3" onclick="createBlock('MMC')">
            <div class="card">
              <div class="card-body">
                <img class="w-100" src="{{asset('img/block_layout/media_center_content.png')}}">
              </div>
              <div class="card-footer text-center">
                <h5>Media Center Content</h5>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="page_cms"/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning bg-orange text-white" onclick="updateCmsLogo()">Simpan</button>
      </div>
    </div>
  </div>
</div>