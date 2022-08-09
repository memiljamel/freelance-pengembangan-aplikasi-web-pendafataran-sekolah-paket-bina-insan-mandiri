<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  {{-- Sidebar - Brand --}}
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="{{ asset('img/logo/logo-white.svg') }}" alt="pkbm-app">
    </div>
    <div class="sidebar-brand-text mx-3">{{ __('PKBM') }}</div>
  </a>

  {{-- Divider --}}
  <hr class="sidebar-divider my-0">

  {{-- Nav Item - Dashboard --}}
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>{{ __('Beranda') }}</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.news.index') }}">
      <i class="fas fa-newspaper"></i>
      <span>{{ __('Berita') }}</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.gallery.index') }}">
      <i class="fas fa-images"></i>
      <span>{{ __('Gallery') }}</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.announcement.index') }}">
      <i class="fas fa-bullhorn"></i>
      <span>{{ __('Pengumuman') }}</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.student.index') }}">
      <i class="far fa-list-alt"></i>
      <span>{{ __('Pendaftaran') }}</span></a>
  </li>

  {{-- Divider --}}
  <hr class="sidebar-divider d-none d-md-block">

  {{-- Sidebar Toggler (Sidebar) --}}
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
