@extends('admin.layout.app')

@section('title', 'Pengumuman')

@section('container')

  <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Pengumuman') }}</h1>
      <a href="{{ route('admin.announcement.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
      @forelse ($announcements as $announcement)
        <div class="col-md-6">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ __('Pengumuman') }}</h6>
            </div>
            <div class="card-body">
              <form action="{{ route('admin.announcement.destroy', $announcement->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <p>
                  <i class="fas fa-calendar"></i>
                  <small> {{ $announcement->date }}</small>
                </p>
                <h5>{{ $announcement->title }}</h5>
                <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">{{ $announcement->content }}</p>
                <a class="btn btn-warning btn-circle m-2" href="{{ route('admin.announcement.edit', $announcement->id) }}">
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
