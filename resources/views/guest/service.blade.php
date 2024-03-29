@extends('layout.app')

@section('title', 'Layanan')

@section('container')

  @include('layout.header')

  <section class="services">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Daftar Layanan Kami') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Layanan yang tersedia saat ini') }}</p>
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <img src="{{ asset('img/icons/icon-services.svg') }}" alt="services-icons">
              <h6>{{ __('Paket A') }}</h6>
              <p>{{ __('Layanan paket A setara dengan SD') }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <img src="{{ asset('img/icons/icon-services.svg') }}" alt="services-icons">
              <h6>{{ __('Paket B') }}</h6>
              <p>{{ __('Layanan paket B setara dengan SLTP') }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-body">
              <img src="{{ asset('img/icons/icon-services.svg') }}" alt="services-icons">
              <h6>{{ __('Paket C') }}</h6>
              <p>{{ __('Layanan paket C setara dengan SLTA') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection
