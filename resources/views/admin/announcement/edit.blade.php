@extends('admin.layout.app')

@section('title', 'Pengumuman')

@section('container')

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Pengumuman') }}</h1>
      <a href="{{ route('admin.announcement.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Pengumuman') }}</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form class="needs-validation" action="{{ route('admin.announcement.update', $announcement->id) }}" method="POST" novalidate>
              @csrf
              @method('PATCH')

              <div class="form-group">
                <label class="form-label" for="title">{{ __('Judul') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $announcement->title }}" required />
                @error('title')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="content">{{ __('Isi Pengumuman') }}</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3" required>{{ $announcement->content }}</textarea>
                @error('content')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="date">{{ __('Tanggal') }}</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ $announcement->date }}" required />
                @error('date')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <hr class="d-none d-md-block">
              <div class="float-right">
                <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
