<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" href="{{ asset('img/logo/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ mix('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @stack('styles')
</head>

<body>

  <noscript>You need to enable JavaScript to run this app.</noscript>
  @yield('container')
  <script src="{{ mix('js/bootstrap.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>