@extends('layout.app')

@section('title', 'Pengumuman')

@section('container')

  @include('layout.header')

  <section class="announcement">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Pengumuman') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Berikut ini merupakan layanan yang tersedia saat ini.') }}</p>
      <div class="row">
        @forelse ($announcements as $announcement)
          <div class="col-md-6">
            <a href="{{ route('announcement.show', $announcement->id) }}" target="_blank">
              <div class="card mb-4">
                <div class="card-body">
                  <h6>{{ $announcement->title }}</h6>
                  <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                    {{ $announcement->content }}
                  </p>
                  <small class="text-secondary">{{ $announcement->date }}</small>
                </div>
              </div>
            </a>
          </div>
        @empty
          <p>Tidak ada pengumuman.</p>
        @endforelse
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection
