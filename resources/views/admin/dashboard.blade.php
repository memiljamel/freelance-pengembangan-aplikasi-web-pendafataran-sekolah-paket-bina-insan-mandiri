@extends('admin.layout.app')

@section('title', 'Beranda')

@section('container')

  <div class="container-fluid">
    <h1 class="h3 text-gray-800">{{ __('Beranda') }}</h1>
    <p class="mb-4">Halo! Selamat datang, {{ $user->name }} 👋.</p>
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 1-->
        <div class="card border-left-primary border-0 shadow">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <div class="small fw-bold text-primary mb-1">{{ __('Jumlah Siswa') }}</div>
                <div class="h5">{{ $students->count() }}<small> Siswa</small></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 1-->
        <div class="card border-left-success border-0 shadow">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <div class="small fw-bold text-success mb-1">{{ __('Jumlah Berita') }}</div>
                <div class="h5">{{ $news->count() }}<small> {{ __('Berita') }}</small></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 1-->
        <div class="card border-left-warning border-0 shadow">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <div class="small fw-bold text-warning mb-1">{{ __('Jumlah Pengumuman') }}</div>
                <div class="h5">{{ $announcements->count() }}<small> {{ __('Pengumuman') }}</small></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 1-->
        <div class="card border-left-info border-0 shadow">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="flex-grow-1">
                <div class="small fw-bold text-info mb-1">{{ __('Jumlah Gallery') }}</div>
                <div class="h5">{{ $galleries->count() }}<small> {{ __('Jumlah Gallery') }}</small></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection