<script>
	function editIntroduction() {
		$.get("{{route('cmsIntroduction')}}", function(data, status){
			$('#cmsIntroductionModal').modal('show')

			if(data){
				$('#cmsIdIntroduction').val(data.id);
				$('#cmsTitleIntroduction1').val(data.title);
				$('#cmsDescriptionIntroduction').val(data.description);
				// $('#cmsPathIntroduction').val('{{url('images')}}/'+data['bgau'].dokumen.path);
				$('#previewBgau').attr('src','{{url('images')}}/'+data.dokumen.path);
			}
		});
	}

	function updateCmsIntroduction(){
		$('#updateCmsIntroduction').submit();
	}

	function readURL(input, id) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#'+id)
                  .attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>