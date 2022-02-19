<script>
	var table = $("#table-data-anggota-activation").DataTable({
		"processing": true,
		"ordering": false,
		"serverSide": true,
		"ajax":{
			"url": "{{ url()->current() }}",
			"data": function ( d ) {
				return $.extend( {}, d, {
					type: true
				} );
			}
		},
		columns: [
		{data: 'membership_account.member_no'},
		{data: 'membership_account.fullname'},
		{data: 'membership_account.email'},
		{data: 'membership_account.identity_no'},
		{data: 'membership_account.address'},
		{data: 'membership_account.phone_no'},
		{data: 'membership_account.gender'},
		{
			data: "membership_account.member_since",
			render: function(data, type, row){
				if(type === "sort" || type === "type"){
					return data;
				}
				return moment(data).format("MM-DD-YYYY HH:mm");
			}
		},
		{
			data: 'invoice_account.status',
			render : function (data, type, row, meta) {
				if(data == 0) {
					return '<a class="badge badge-pill badge-secondary">Belum Bayar</a>';
				}else if(data == 3){
					return '<a class="badge badge-pill badge-danger">Ditolak</a>';
				}else if(data == 1){
					return '<a class="badge badge-pill badge-info">Menunggu Verifikasi</a>';
				}else if(data == 2){
					return '<a class="badge badge-pill badge-success">Disetujui</a>';
				}else {
					return '<a class="badge badge-pill badge-warning text-white">Tidak ada Status</a>';
				}
			}
		},
		{
			data: "membership_account.id",
			"render": function ( data, type, row, meta )
			{
				var buttonActivation = '';
				if(row.invoice_account.status == 2){
					buttonActivation = '<a class="mb-1 btn btn-success btn-sm text-white" onclick="activateMember(' + data + ');"><i class="fa fa-check" title="Aktivasi"></i></a>&NewLine;';
				}
				return '<div class="text-center">'+
				buttonActivation
				+
				'<a class="mb-1 btn btn-danger btn-sm text-white" onclick="deleteRecord(' + data + ');" title="Hapus"><i class="fa fa-ban"></i></a>'+
				'</div>';
			}
		}
		],
		colReorder: true,
	});

	function deleteRecord(id){
		Swal.fire({
			title: 'Apakah Anda Yakin?',
			showDenyButton: true,
			confirmButtonText: 'Iya',
			confirmButtonColor: '#28a745',	
			denyButtonText: `Tidak`,
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "{!! url('backoffice/keanggotaan/activation/decline') !!}/" + id,
					dataType: "json",
					type: "get",
					success: function(data) {
						$('#table-data-anggota-activation').DataTable().ajax.reload();
					}
				});
			}
		})
	}

	function getActivationDetail(id){
		$.ajax
		({ 
			url: '{{URL::current()}}/detail/' + id,
			type: 'get',
			success: function(result){
				$('#image-payment').html('<img width="100%" src="{{URL::to('/')}}/'+ result.path +'">');
				$('#activation_member_id').val(id)
			},
			error: function () {
				$('#closeModalActivation').click();
			}
		});
	}

	function activateMember(id){
		Swal.fire({
			title: 'Apakah Anda Yakin melakukan aktivasi?',
			showDenyButton: true,
			confirmButtonText: 'Iya',
			confirmButtonColor: '#28a745',	
			denyButtonText: `Tidak`,
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "{!! url('backoffice/keanggotaan/activation/activate') !!}/" + id,
					dataType: "json",
					type: "get",
					success: function(data) {
						$('#table-data-anggota-activation').DataTable().ajax.reload();
					}
				});
			}
		})
	}
</script>