<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
  <link rel="shortcut icon" href="{{ asset('img/logo/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ mix('css/admin/fontawesome-free.css') }}">
  <link rel="stylesheet" href="{{ mix('css/admin/sb-admin-2.css') }}">
  <link rel="stylesheet" href="{{ mix('css/admin/dataTables.bootstrap4.css') }}">
</head>

<body id="page-top">

  <noscript>You need to enable JavaScript to run this app.</noscript>
  <div id="wrapper">
    @include('admin.layout.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include('admin.layout.header')
        @yield('container')
      </div>
      @include('admin.layout.footer')
    </div>
  </div>

  {{-- Scroll to Top Button --}}
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  {{-- Logout Modal --}}
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda yakin untuk mengakhiri session saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="btn btn-primary">{{ __('Keluar') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
  <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>
  <script src="{{ mix('js/admin/sb-admin-2.js') }}"></script>
  <script src="{{ mix('js/admin/app.js') }}"></script>
  <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('js/admin/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ mix('js/admin/datatables-demo.js') }}"></script>
  @stack('scripts')

</body>

</html>