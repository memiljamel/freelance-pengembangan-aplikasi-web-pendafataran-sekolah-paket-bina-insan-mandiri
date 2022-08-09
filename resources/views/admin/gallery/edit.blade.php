@extends('admin.layout.app')

@section('title', 'Gallery')

@section('container')

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Gallery') }}</h1>
      <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('admin.gallery.index') }}">
        <i class="fas fa-undo fa-sm text-white-50"></i> 
        {{ __('Batal') }}
      </a>
    </div>

    @if (session()->has('status'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('status') }}
      </div>
    @endif

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Gallery') }}</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form class="needs-validation" action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              @method('PATCH')

              <div class="form-group">
                <label class="form-label" for="image">{{ __('Gambar (Max: 2 MB)') }}</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" required />
                @error('image')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
