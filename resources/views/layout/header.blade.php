<nav class="navbar navbar-expand-lg navbar-light bg-white px-0 py-2 fixed-top">
  <div class="container-xl">
    <a class="navbar-brand" href="{{ route('welcome') }}">
      <img src="{{ asset('img/logo/logo-img.svg') }}" class="h-8" alt="pkmb-app">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav mx-lg-auto">
        <a class="nav-item nav-link @if (request()->routeIs('welcome')) active @endif" href="{{ route('welcome') }}" aria-current="page">{{ __('Beranda') }}</a>
        <a class="nav-item nav-link @if (request()->routeIs('about')) active @endif" href="{{ route('about') }}">{{ __('Profil') }}</a>
        <a class="nav-item nav-link @if (request()->routeIs('service')) active @endif" href="{{ route('service') }}">{{ __('Layanan') }}</a>
        <a class="nav-item nav-link @if (request()->routeIs('information')) active @endif" href="{{ route('information') }}">{{ __('Informasi') }}</a>
        <a class="nav-item nav-link @if (request()->routeIs('contact')) active @endif" href="{{ route('contact.index') }}">{{ __('Kontak') }}</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Kegiatan') }}</a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="{{ route('news.index') }}">{{ __('Berita') }}</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('galleries') }}">{{ __('Gallery') }}</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('announcement.index') }}">{{ __('Pengumuman') }}</a>
            </li>
          </ul>
        </li>
      </div>
      <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
        @auth
          @if (Auth::user()->role === 'admin')
            <a href="{{ route('login.index') }}" class="btn btn-sm btn-light w-full w-lg-auto me-4">{{ __('Kembali ke Beranda') }}</a>
          @else
            <div class="nav-item dropdown list-unstyled">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->personal->fullname }}
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="{{ route('student.profile.index') }}">{{ __('Akun Saya') }}</a>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="dropdown-item">{{ __('Keluar') }}</button>
                  </form>
                </li>
              </ul>
            </div>
          @endif
        @endauth

        @guest
          <a href="{{ route('login.index') }}" class="btn btn-sm btn-light w-full w-lg-auto me-4">{{ __('Masuk') }}</a>
          <a href="{{ route('register.index') }}" class="btn btn-sm btn-primary w-full w-lg-auto">{{ __('Daftar') }}</a>
        @endguest
      </div>
    </div>
  </div>
</nav>
