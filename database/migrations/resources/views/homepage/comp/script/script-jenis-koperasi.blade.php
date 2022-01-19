<script>
	function editJenisKoperasi() {
		$.get("{{route('cmsJenisKoperasi')}}", function(data, status){
			$('#cmsJenisKoperasiModal').modal('show')

			if(data){
				$('#cmsTitleJenisKoperasiTitle').val(data.title);
				$('#cmsTitleJenisKoperasiId').val(data.id);
			}
		});
	}

	function updateCmsFungsiPeran(){
		$('#updateCmsFungsiPeran').submit();
	}
</script>