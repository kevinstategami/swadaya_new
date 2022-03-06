<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top bg-white">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand navbar-brand-img page-scroll p-0" href="{{url('/')}}" style="position: relative">
                <img src="{{ !$cmsLogo['lg'] || !$cmsLogo['lg']['dokumen']  ? asset('img/Logo-KJMSU-Rev-02.png') : url('images/'.$cmsLogo['lg']->dokumen->path) }}" class="img-logo-navbar" width="200px" alt="logo">
                <!-- @if(!Auth::guest() && Auth::user()->edit_mode && Auth::user()->type == 'CMS')
                    <i class="fa fa-edit edit-logo-icon" onclick="editLogo()"></i>
                @endif -->
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="megamenu-fw">
                    <a href="{{url('/')}}">Beranda </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#mmc-1">Apa Itu Songgomas? </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#mc-2">Songgomas Spirit </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#ZC-7">Layanan Songgomas </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#mmc-5">Apa Kata Mereka? </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#rsc-8">Our Contact </a>
                </li>
                @if(Auth::guest())
                <li class="megamenu-fw">
                    <a href="https://anggota.songgomas.id/membership/auth/index">Masuk / Daftar</a>
                </li>
                @else
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">{{Auth::user()->name}} </a>
                    <ul class="dropdown-menu has-submenu" role="menu">
                        <li><a href="{{route('index')}}">Dashboard</a></li>
                        @if(Auth::user()->type == 'CMS')
                        <li>
                            <a href="{{route('setEditMode', Auth::user()->edit_mode ? 'y' : 'n')}}">Edit Mode ({{Auth::user()->edit_mode ? 'On' : 'Off'}}) </a>
                        </li>
                        @endif
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
