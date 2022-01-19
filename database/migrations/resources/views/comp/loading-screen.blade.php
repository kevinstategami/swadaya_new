<!-- Page Loader
===================================== -->
<div id="pageloader" class="bg-grad-animation-1">
    <div class="loader-item">
        <img src="{{ !$cmsLogo['llg'] || !$cmsLogo['llg']['dokumen']  ? asset('img/logo.png') : url('images/'.$cmsLogo['llg']->dokumen->path) }}" alt="page loader">
    </div>
</div>