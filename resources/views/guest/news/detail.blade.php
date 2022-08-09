@extends('layout.app')

@section('title', 'Berita')

@section('container')

  @include('layout.header')

  <section class="detail__blog">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Berita') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Berikut ini merupakan detail berita.') }}</p>
      <div class="row">
        <div class="col-md-12">
          <div class="thumbnail">
            <img class="w-100" src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
          </div>
        </div>
        <div class="col-sm-9 col-md-7 col-lg-8 mx-auto my-4">
          <h3>{{ $news->title }}</h3>
          <div class="date mb-3">{{ $news->user->name }} • {{ $news->date }}</div>
          <div class="content-blog-area">
            {!! $news->content !!}
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection