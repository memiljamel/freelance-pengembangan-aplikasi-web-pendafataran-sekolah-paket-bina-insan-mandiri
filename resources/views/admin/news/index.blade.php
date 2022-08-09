@extends('admin.layout.app')

@section('title', 'Berita')

@section('container')

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Berita') }}</h1>
      <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('admin.news.create') }}">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        {{ __('Tambah') }}
      </a>
    </div>

    @if (session()->has('status'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('status') }}
      </div>
    @endif

    <div class="row">
      @forelse ($news as $new)
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <img src="{{ asset('storage/' . $new->thumbnail) }}" class="card-img-top" alt="{{ $new->title }}">
            <div class="card-body">
              <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <p>
                  <i class="fas fa-calendar"></i>
                  <small> {{ $new->date }}</small>
                </p>
                <h5>{{ $new->title }}</h5>
                <div class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                  {!! $new->content !!}
                </div>
                <a class="btn btn-warning btn-circle m-2" href="{{ route('admin.news.edit', $new->id) }}">
                  <i class="fas fa-edit"></i>
                </a>
                <button class="btn btn-danger btn-circle m-2">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <p class="ml-3">Tidak ada berita.</p>
      @endforelse
    </div>
  </div>

@endsection