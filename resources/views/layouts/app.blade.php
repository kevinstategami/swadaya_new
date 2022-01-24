<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from myboodesign.com/pasific/mp-index-new-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Nov 2021 11:22:36 GMT -->
<head>
    <title>Songgomas</title>
    @include('layouts.comp.meta')
    <?php
        $cmsLogo = (new App\Http\Controllers\CMS\LogoController)->index();
    ?>
    @include('layouts.comp.css')
    
</head>
<body  id="page-top" data-spy="scroll" data-target=".navbar" data-offset="100">
    @include('comp.loading-screen')
    <a href="#page-top" class="go-to-top">
        <i class="fa fa-long-arrow-up"></i>
    </a>
    @include('layouts.comp.navbar')
    @include('comp.modal-search')
        @yield('content')
    @include('layouts.comp.footer')
    @include('layouts.comp.modal.logo')
    @include('layouts.comp.script')
        @yield('script')
</body>

<!-- Mirrored from myboodesign.com/pasific/mp-index-new-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Nov 2021 11:22:41 GMT -->
</html>