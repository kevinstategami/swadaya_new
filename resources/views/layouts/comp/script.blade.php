<!-- JQuery Core
=====================================-->
<script src="{{asset('template/pasific/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/core/bootstrap-3.3.7.min.js')}}"></script>

<!-- Magnific Popup
=====================================-->
<script src="{{asset('template/pasific/assets/js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/magnific-popup/magnific-popup-zoom-gallery.js')}}"></script>

<!-- Progress Bars
=====================================-->
<script src="{{asset('template/pasific/assets/js/progress-bar/bootstrap-progressbar.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/progress-bar/bootstrap-progressbar-main.js')}}"></script>        

<!-- Text Rotator
=====================================-->
<script src="{{asset('template/pasific/assets/js/text-rotator/jquery.simple-text-rotator.min.js')}}"></script>

<!-- JQuery Main
=====================================-->
<script src="{{asset('template/pasific/assets/js/main/jquery.appear.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/parallax.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/jquery.countTo.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/owl.carousel.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/jquery.sticky.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('template/pasific/assets/js/main/main.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
@if(Session::has('title') || Session::has('text') || Session::has('icon'))
      Swal.fire({
        title: '{{Session::get('title')}}',
        text: '{{Session::get('text')}}',
        icon: '{{Session::get('icon')}}',
      })
    @elseif(count($errors) == 0)
@endif

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

function editLogo() {
	$.get("{{route('cmsLogo')}}", function(data, status){
		$('#cmsLogoModal').modal('show')
		if(data){
			if(data['lg']){
				if(data['lg'].dokumen){
					$('#previewLogo').attr('src','{{url('images')}}/'+data['lg'].dokumen.path);

				}
				$('#cmsIdLogo').val(data['lg'].id);
			}

			if(data['llg']){
				if(data['llg'].dokumen){
					$('#previewLoadingLogo').attr('src','{{url('images')}}/'+data['llg'].dokumen.path);
				}
				$('#cmsIdLlg').val(data['llg'].id);
			}
		}
	});
}

function updateCmsLogo(){
	$('#updateCmsLogo').submit();
}


</script>