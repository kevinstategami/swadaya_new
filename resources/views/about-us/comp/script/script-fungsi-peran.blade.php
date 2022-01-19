<script>
    var fpd1 = document.getElementById("cmsDescriptionFungsiPeran1");
    var fpd2 = document.getElementById("cmsDescriptionFungsiPeran2");
 	var editor1 = CKEDITOR.replace(fpd1,{
     language:'en-gb'
   	});

 	var editor2 = CKEDITOR.replace(fpd2,{
     language:'en-gb'
   	});
   	CKEDITOR.config.allowedContent = true;

	function editFungsiPeran() {
		$.get("{{route('cmsFungsiPeran')}}", function(data, status){
			$('#cmsFungsiPeranModal').modal('show')

			if(data){
				$('#cmsTitleFungsiPeran1').val(data['fungsi_peran_1'].title);
				$('#cmsIdFungsiPeran1').val(data['fungsi_peran_1'].id);

				$('#cmsTitleFungsiPeran2').val(data['fungsi_peran_2'].title);
				$('#cmsIdFungsiPeran2').val(data['fungsi_peran_2'].id);

				CKEDITOR.instances['cmsDescriptionFungsiPeran1'].setData(data['fungsi_peran_1'].description)
				CKEDITOR.instances['cmsDescriptionFungsiPeran2'].setData(data['fungsi_peran_2'].description)
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

	function updateCmsFungsiPeran(){
		$('#updateCmsFungsiPeran').submit();
	}
</script>