@extends('layout.app')

@section('title', 'Informasi')

@section('container')

  @include('layout.header')

  <section class="announcement">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Informasi') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Berikut ini merupakan informasi PKBM Bina Insan Mandiri.') }}</p>
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h6>{{ __('Pilihan paket yang diesediakan oleh pengurus') }}</h6>
              <ol>
                <li>{{ __('Paket A setara ijazah SD') }}</li>
                <li>{{ __('Paket B setara ijazah SMP') }}</li>
                <li>{{ __('Paket C setara ijazah SMA') }}</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h6>{{ __('Paket A') }}</h6>
              <span class="text-warning fw-bold mt-3">{{ __('Persyaratan pendafatran paket A') }}</span>
              <ol class="mt-3">
                <li>{{ __('Mengisi formulir pendaftaran') }}</li>
                <li>{{ __('Mengunggah File akte kelahiran') }}</li>
                <li>{{ __('Mengunggah File kartu keluarga') }}</li>
                <li>{{ __('Mengunggah pas photo 2x3 latar belakang merah') }}</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h6>{{ __('Paket B') }}</h6>
              <span class="text-warning fw-bold mt-3">{{ __('Persyaratan pendafatran paket B') }}</span>
              <ol class="mt-3">
                <li>{{ __('Mengisi formulir pendaftaran') }}</li>
                <li>{{ __('Mengunggah File akte kelahiran') }}</li>
                <li>{{ __('Mengunggah File kartu keluarga') }}</li>
                <li>{{ __('Mengunggah pas photo 2x3 latar belakang merah') }}</li>
                <li>{{ __('Mengunggah file ijazah SD') }}</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h6>{{ __('Paket C') }}</h6>
              <span class="text-warning fw-bold mt-3">{{ __('Persyaratan pendafatran paket C') }}</span>
              <ol class="mt-3">
                <li>{{ __('Mengisi formulir pendaftaran') }}</li>
                <li>{{ __('Mengunggah File akte kelahiran') }}</li>
                <li>{{ __('Mengunggah File kartu keluarga') }}</li>
                <li>{{ __('Mengunggah pas photo 2x3 latar belakang merah') }}</li>
                <li>{{ __('Mengunggah file ijazah SMP') }}</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection
