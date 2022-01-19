<script>
    var descAu = document.getElementById("cmsContentAboutUs");
 	var editor1 = CKEDITOR.replace(descAu,{
     language:'en-gb'
   	});
   	CKEDITOR.config.allowedContent = true;

	function editAboutUs() {
		$.get("{{route('cmsAboutUs')}}", function(data, status){
			$('#cmsAboutUsModal').modal('show')

			if(data){
				$('#cmsIdAboutUs').val(data.id);
				$('#cmsTitleAboutUs').val(data.title);
				$('#cmsDescriptionAboutUs').val(data.description);
				if(data.dokumen){
					$('#previewBgauhm').attr('src','{{url('images')}}/'+data.dokumen.path);
				}
				CKEDITOR.instances['cmsContentAboutUs'].setData(data.content)
			}
		});
	}

	function editImageAU() {
		$.get("{{route('cmsImgAu')}}", function(data, status){
			$('#cmsImageAuModal').modal('show')

			if(data){
				if(data.dokumen){
					$('#previewImgAu').attr('src','{{url('images')}}/'+data.dokumen.path);
				}
				$('#cmsIdImgAu').val(data.id);
			}
		});
	}

	function updateCmsImageAu(){
		$('#updateCmsImageAu').submit();
	}

	function updateCmsAboutUs(){
		$('#updateCmsAboutUs').submit();
	}
</script>