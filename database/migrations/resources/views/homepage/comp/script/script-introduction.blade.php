<script>
	function editIntroduction() {
		$.get("{{route('cmsIntroductionHm')}}", function(data, status){
			$('#cmsIntroductionModal').modal('show')

			if(data){
				$('#cmsIdIntroduction').val(data.id);
				$('#cmsTitleIntroduction').val(data.title);
				$('#cmsDescriptionIntroduction').val(data.description);
				// $('#cmsPathIntroduction').val('{{url('images')}}/'+data['bgau'].dokumen.path);
				$('#previewBgau').attr('src','{{url('images')}}/'+data.dokumen.path);
			}
		});
	}

	function updateCmsIntroductionHm(){
		$('#updateCmsIntroductionHm').submit();
	}
</script>