<div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Alasan Penolakan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<textarea class="form-control" name="description" id="alasan_penolakan" rows="8" placeholder="Deskripsikan Alasan Penolakan"></textarea>
				<input type="hidden" name="id" id="id_invoice">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="declineInvoice();">Tolak</button>
				<button type="button" id="closeModalReject" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>