<script>
	function editSecaraUmum() {
		$.get("{{route('cmsProgress')}}", function(data, status){
			$('#cmsSecaraUmumModal').modal('show');
	   		
	   		if(data.secara_umum){
	   			$('#cmsSecaraUmumDesc').val(data.secara_umum.description)
	   			$('#cmsSecaraUmumId').val(data.secara_umum.id)
	   		}

	   		if(data.sejarah.length == 2) {
	   			$('#cmsTahunPertamaTitle').val(data.sejarah[0].title)
	   			$('#cmsTahunPertamaDescription').val(data.sejarah[0].description)
	   			$('#cmsTahunPertamaId').val(data.sejarah[0].id)

	   			$('#cmsTahunKeduaTitle').val(data.sejarah[1].title)
	   			$('#cmsTahunKeduaDescription').val(data.sejarah[1].description)
	   			$('#cmsTahunKeduaId').val(data.sejarah[1].id)
	   		}
		});
	}

	function updateCmsProgress(){
		$('#updateCmsProgress').submit();
	}
</script>