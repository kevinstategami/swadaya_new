<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link bg-white">
    <img src="{{ !$cmsLogo['lg'] || !$cmsLogo['lg']['dokumen']  ? asset('img/Logo-KJMSU-Rev-02.png') : url('images/'.$cmsLogo['lg']->dokumen->path) }}" alt="Logo" class="brand-image">
    <span class="brand-text font-weight-light">&nbsp;</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
         <li class="nav-item">
          <a href="{{url('/backoffice')}}" class="nav-link {{Request::is('backoffice') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item {{Request::segment(2) == 'konfigurasi' ? 'menu-open' : ''}}">
          <a href="#" class="nav-link {{Request::segment(2) == 'konfigurasi' ? 'active' : ''}}">
            <i class="nav-icon fas fas fa-globe"></i>
            <p>
              Konfigurasi Website
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/about-us')}}" class="nav-link {{Request::segment(3) == 'about-us' ? 'active' : ''}}">
                <i class="fas fas fa-id-card nav-icon"></i>
                <p>Tentang Kami</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/jenis-koperasi')}}" class="nav-link {{Request::segment(3) == 'jenis-koperasi' ? 'active' : ''}}">
                <i class="fas fas fa-font nav-icon"></i>
                <p>Jenis Koperasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/struktur-anggota')}}" class="nav-link {{Request::segment(3) == 'struktur-anggota' ? 'active' : ''}}">
                <i class="fas fas fa-sitemap nav-icon"></i>
                <p>Struktur Anggota</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/visi')}}" class="nav-link {{Request::segment(3) == 'visi' ? 'active' : ''}}">
                <i class="fas fa fa-glasses nav-icon"></i>
                <p>Visi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/misi')}}" class="nav-link {{Request::segment(3) == 'misi' ? 'active' : ''}}">
                <i class="fas fas fa-thumbtack nav-icon"></i>
                <p>Misi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/syarat-keanggotaan')}}" class="nav-link {{Request::segment(3) == 'syarat-keanggotaan' ? 'active' : ''}}">
                <i class="fas fas fa-head-side-cough nav-icon"></i>
                <p>Syarat Keanggotaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/ketentuan-keanggotaan')}}" class="nav-link {{Request::segment(3) == 'ketentuan-keanggotaan' ? 'active' : ''}}">
                <i class="fas fas fa-pencil-ruler nav-icon"></i>
                <p>Ketentuan Keanggotaan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('backoffice/konfigurasi/keuntungan-anggota')}}" class="nav-link {{Request::segment(3) == 'keuntungan-anggota' ? 'active' : ''}}">
                <i class="fas fas fa-hand-holding-usd nav-icon"></i>
                <p>Keuntungan Anggota</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{Request::segment(2) == 'keanggotaan' ? 'menu-open' : ''}}">
          <a href="#" class="nav-link {{Request::segment(2) == 'keanggotaan' ? 'active' : ''}}">
            <i class="nav-icon fas fas fa-users-cog"></i>
            <p>
              Keanggotaan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('anggota') }}" class="nav-link {{Request::segment(3) == 'anggota' ? 'active' : ''}}">
                <i class="fas fas fa-users nav-icon"></i>
                <p>Data Anggota</p>
              </a>
              <a href="{{ route('anggotaActivation') }}" class="nav-link {{Request::segment(3) == 'activation' ? 'active' : ''}}">
                <i class="fas fas fa-user-shield nav-icon"></i>
                <p>Aktivasi Anggota</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{Request::segment(2) == 'transaction' ? 'menu-open' : ''}}">
          <a href="#" class="nav-link {{Request::segment(2) == 'transaction' ? 'active' : ''}}">
            <i class="nav-icon fas fas fa-receipt"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{ route('invoiceMaster') }}" class="nav-link {{Request::segment(3) == 'invoice' ? 'active' : ''}}">
                <i class="fas fas fa-money-check nav-icon"></i>
                <p>Tagihan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('invoiceHistoryMaster') }}" class="nav-link {{Request::segment(3) == 'invoice-history' ? 'active' : ''}}" class="nav-link">
                <i class="fas fas fa-history nav-icon"></i>
                <p>History Tagihan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('walletMaster') }}" class="nav-link {{Request::segment(3) == 'wallet' ? 'active' : ''}}" class="nav-link">
                <i class="fas fas fa-wallet nav-icon"></i>
                <p>Dompet Anggota</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fas fa-building"></i>
            <p>
              Investasi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fas fa-project-diagram nav-icon"></i>
                <p>Projek</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{Request::segment(2) == 'referensi' ? 'menu-open' : ''}}">
          <a href="#" class="nav-link {{Request::segment(2) == 'referensi' ? 'active' : ''}}">
            <i class="nav-icon fas fas fa-server"></i>
            <p>
              Referensi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('jenisSimpanan')}}" class="nav-link {{Request::segment(3) == 'jenis-simpanan' ? 'active' : ''}}">
                <i class="fas fas fa-newspaper nav-icon"></i>
                <p>Jenis Simpanan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('SHU')}}" class="nav-link {{Request::segment(3) == 'shu' ? 'active' : ''}}">
                <i class="fas fas fa-hands nav-icon"></i>
                <p>SHU</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('bank')}}" class="nav-link {{Request::segment(3) == 'bank' ? 'active' : ''}}">
                <i class="fas fas fa-university nav-icon"></i>
                <p>Bank</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('limitTransaksi')}}" class="nav-link {{Request::segment(3) == 'limit-transaksi' ? 'active' : ''}}">
                <i class="fas fas fa-list-alt nav-icon"></i>
                <p>Limit Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('paymentMethod')}}" class="nav-link {{Request::segment(3) == 'payment-method' ? 'active' : ''}}">
                <i class="fas fas fa-funnel-dollar nav-icon"></i>
                <p>Metode Pembayaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('provinsi')}}" class="nav-link {{Request::segment(3) == 'provinsi' ? 'active' : ''}}">
                <i class="fas fas fa-globe-asia nav-icon"></i>
                <p>Provinsi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('kota')}}" class="nav-link {{Request::segment(3) == 'kota' ? 'active' : ''}}">
                <i class="fas fas fa-atlas nav-icon"></i>
                <p>Kota</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('documentType')}}" class="nav-link {{Request::segment(3) == 'document-type' ? 'active' : ''}}">
                <i class="fas fa-file-alt nav-icon"></i>
                <p>Tipe Dokumen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('referralBonus')}}" class="nav-link {{Request::segment(3) == 'referral-bonus' ? 'active' : ''}}">
                <i class="fas fa-money-check nav-icon"></i>
                <p>Referral Bonus</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('advertisement')}}" class="nav-link {{Request::segment(3) == 'advertisement' ? 'active' : ''}}">
                <i class="fas fa-ad nav-icon"></i>
                <p>Iklan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('userPengguna')}}" class="nav-link {{Request::segment(2) == 'user-pengguna' ? 'active' : ''}}">
            <i class="nav-icon fas fas fa-users"></i>
            <p>
              Pengguna
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>