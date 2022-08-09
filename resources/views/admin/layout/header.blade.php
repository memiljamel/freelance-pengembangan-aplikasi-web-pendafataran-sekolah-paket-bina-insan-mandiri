<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          {{ auth()->user()->name }}
        </span>
        @if (auth()->user()->avatar === 'default.jpg')
          <img class="img-profile rounded-circle" src="{{ asset('img/avatar/' . auth()->user()->avatar) }}">
        @else
          <img class="img-profile rounded-circle" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
        @endif
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          {{ __('Akun Saya') }}
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="login.html" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          {{ __('Keluar') }}
        </a>
      </div>
    </li>
  </ul>
</nav>
