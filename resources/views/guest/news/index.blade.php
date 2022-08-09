@extends('layout.app')

@section('title', 'Berita')

@section('container')

  @include('layout.header')

  <section class="blog">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Berita') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Berikut ini merupakan berita yang tersedia saat ini.') }}</p>
      <div class="row">
        @forelse ($news as $new)
          <div class="col-md-4">
            <div class="card">
              <img class="card-img-top w-100" src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}">
              <div class="card-body">
                <div class="date mb-2">{{ $new->user->name }} • {{ $new->date }}</div>
                <a class="h5 card-title" href="{{ route('news.show', $new->id) }}">{{ $new->title }}</a>
                <div class="card-text mt-2">{!! $new->title !!}</div>
              </div>
            </div>
          </div>
        @empty
          <p>Tidak ada berita.</p>
        @endforelse
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection
