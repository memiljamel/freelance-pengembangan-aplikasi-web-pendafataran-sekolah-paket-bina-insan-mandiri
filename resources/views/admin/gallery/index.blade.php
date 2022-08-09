@extends('admin.layout.app')

@section('title', 'Gallery')

@section('container')

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Gallery') }}</h1>
      <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('admin.gallery.create') }}">
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
      @forelse ($galleries as $gallery)
        <div class="col-md-4">
          <div class="card shadow mb-4">
            <img class="card-img-top img-fluid" src="{{ asset('storage/' . $gallery->image) }}" alt="">
            <div class="card-body">
              <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <a class="btn btn-warning btn-circle m-2" href="{{ route('admin.gallery.edit', $gallery->id) }}">
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
        <p class="ml-3">Tidak ada gallery.</p>
      @endforelse
    </div>
  </div>

@endsection
