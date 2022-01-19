<div class="modal fade" id="modal-anggota-aktivasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Bukti Transfer Anggota</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="image-payment"></div>
				<form action="{{ route('anggotaActivite', 1) }}" id="activateForm" method="POST">
					@csrf
					<input type="hidden" name="activation_member_id" id="activation_member_id">
				</form>
			</div>
			<div class="modal-footer">
				<button onclick="activateMember()" class="btn btn-success">Aktivasi</button>
				<button type="button" id="closeModalActivation" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>