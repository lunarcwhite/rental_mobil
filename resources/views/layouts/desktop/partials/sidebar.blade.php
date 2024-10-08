<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="{{ asset('img/logo/logo2.png') }}">
    </div>
    <div class="sidebar-brand-text mx-3">Ruang Admin</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <hr class="sidebar-divider">
  {{-- <div class="sidebar-heading">
    Features
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
      aria-expanded="true" aria-controls="collapseBootstrap">
      <i class="far fa-fw fa-window-maximize"></i>
      <span>Bootstrap UI</span>
    </a>
    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Bootstrap UI</h6>
        <a class="collapse-item" href="alerts.html">Alerts</a>
        <a class="collapse-item" href="buttons.html">Buttons</a>
        <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
        <a class="collapse-item" href="modals.html">Modals</a>
        <a class="collapse-item" href="popovers.html">Popovers</a>
        <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider"> --}}
  @can('Super Admin')
  <div class="sidebar-heading">
    Akun
  </div>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('superAdmin.persetujuanAkun.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Persetujuan Akun</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('superAdmin.kelolaAkun.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Kelola Akun</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Mobil
  </div>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('superAdmin.persetujuanMobil.index') }}">
      <i class="fas fa-fw fa-car"></i>
      <span>Persetujuan Mobil</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('superAdmin.gps.index') }}">
      <i class="fas fa-map-marked-alt"></i>
      <span>GPS</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Transaksi
  </div>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('superAdmin.historiTransaksi.index') }}">
      <i class="fas fa-fw fa-database"></i>
      <span>Histori Transaksi</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('superAdmin.laporanPendapatan.index') }}">
      <i class="fas fa-fw fa-money-bill-wave"></i>
      <span>Laporan Pendapatan</span>
    </a>
  </li>
  @endcan
  <hr class="sidebar-divider">
  <div class="version" id="version-ruangadmin"></div>
</ul>