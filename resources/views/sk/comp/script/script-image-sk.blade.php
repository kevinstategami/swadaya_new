<script>
	function editImageSK() {
		$.get("{{route('cmsImgSk')}}", function(data, status){
			$('#cmsImageSkModal').modal('show')

			if(data){
				if(data.dokumen){
					$('#previewImgSk').attr('src','{{url('images')}}/'+data.dokumen.path);
				}
				$('#cmsIdImgSk').val(data.id);
			}
		});
	}

	function updateCmsImageSk(){
		$('#updateCmsImageSk').submit();
	}
</script>