<!-- Navigation Area
===================================== -->
<nav class="navbar navbar-pasific navbar-mp megamenu navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand navbar-brand-img page-scroll p-0" href="#page-top" style="position: relative">
                <img src="{{ !$cmsLogo['lg'] || !$cmsLogo['lg']['dokumen']  ? asset('img/Logo-KJMSU-Rev-02.png') : url('images/'.$cmsLogo['lg']->dokumen->path) }}" class="img-logo-navbar" width="200px" alt="logo">
                @if(!Auth::guest() && Auth::user()->edit_mode)
                    <i class="fa fa-edit edit-logo-icon" onclick="editLogo()"></i>
                @endif
            </a>
        </div>

        <div class="navbar-collapse collapse navbar-main-collapse">
            <ul class="nav navbar-nav">
                <li class="megamenu-fw">
                    <a href="{{url('/')}}" class="color-gray">Beranda </a>
                </li>
                <li class="megamenu-fw">
                    <a href="{{url('/about-us')}}" class="color-gray">Tentang Kami </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#service" class="color-gray">Jenis Koperasi </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#visimisi" class="color-gray">Visi &amp; Misi </a>
                </li>
                <li class="megamenu-fw">
                    <a href="#team" class="color-gray">Struktur Organisasi </a>
                </li>
                @if(Auth::guest())
                <li class="megamenu-fw">
                    <a href="{{route('indexMembership')}}" class="color-gray">Masuk / Daftar</a>
                </li>
                @else
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle color-light">{{Auth::user()->name}} </a>
                    <ul class="dropdown-menu has-submenu" role="menu">
                        <li><a href="{{route('index')}}">Dashboard</a></li>
                        @if(Auth::user()->type == 'ADMIN')
                        <li>
                            <a href="{{route('setEditMode', Auth::user()->edit_mode ? 'y' : 'n')}}">Edit Mode ({{Auth::user()->edit_mode ? 'On' : 'Off'}}) </a>
                        </li>
                        @endif
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    </ul>
                </li>
                @endif
                <li><a href="#" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search fa-fw color-green"></i></a></li>

            </ul>

        </div>
    </div>
</nav>
