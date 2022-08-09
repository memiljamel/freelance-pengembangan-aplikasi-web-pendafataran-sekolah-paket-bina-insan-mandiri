@extends('layout.app')

@section('title', 'Pengumuman')

@section('container')

  @include('layout.header')

  <section class="announcement">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Pengumuman') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Berikut ini merupakan detail pengumuman.') }}</p>
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-body">
              <h6>{{ $announcement->title }}</h6>
              <p>{{ $announcement->content }}</p>
              <small class="text-secondary">{{ $announcement->date }}</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection