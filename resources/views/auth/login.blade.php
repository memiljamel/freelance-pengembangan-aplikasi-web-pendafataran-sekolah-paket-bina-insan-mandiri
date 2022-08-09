@extends('layout.app')

@section('title', 'Masuk')

@section('container')

  <section class="auth">
    <div class="px-4 py-5 px-md-5" style="background-color: hsl(0, 0%, 96%)">
      <div class="container">

        <div class="row gx-lg-5">
          <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
            <h1 class="mb-4 display-3 fw-bold ls-tight">
              <span>{{ __('Selamat Datang') }}</span> <br />
              <span class="text-primary">{{ __('Di PKMB Bina Insan Mandiri') }}</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">{{ __('Kegiatan belajar masyarakat untuk meraih ilmu pengetahuan') }}</p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0">

            @if (session()->has('status'))
              <div class="alert alert-success" role="alert">
                {{ session()->get('status') }}
              </div>
            @endif

            <div class="card shadow">
              <div class="card-body py-5 px-md-5">
                <form action="{{ route('login.authenticate') }}" method="POST" class="needs-validation" novalidate>
                  @csrf
                  @method('POST')

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">{{ __('Email') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required />
                    @error('email')
                      <div class="text-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">{{ __('Kata Sandi') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required />
                    @error('password')
                      <div class="text-danger mt-2">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" @if (old('remember')) checked @endif />
                    <label class="form-check-label" for="remember">
                      {{ __('Ingat Saya') }}
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block mb-4">{{ __('Masuk') }}</button>
                </form>
              </div>
            </div>
            <p class="text-secondary mt-4 text-center">
              {{ __('Apakah Anda sudah mendaftar?') }}
              <a class="text-primary" href="{{ route('register.index') }}">Daftar sekarang.</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
