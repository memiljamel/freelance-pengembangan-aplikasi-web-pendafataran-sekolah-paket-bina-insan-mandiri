@extends('admin.layout.app')

@section('title', 'Berita')

@section('container')

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Berita') }}</h1>
      <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('admin.news.index') }}">
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
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Berita') }}</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form class="needs-validation" action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              @method('PATCH')

              <div class="form-group">
                <label class="form-label" for="title">{{ __('Judul') }}</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $news->title }}" required />
                @error('title')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="editor">{{ __('Isi Berita') }}</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor" rows="3" required>{{ $news->content }}</textarea>
                @error('content')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror  
              </div>
              <div class="form-group">
                <label class="form-label" for="thumbnail">{{ __('Thumbnail (Max: 2 MB)') }}</label>
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail" required />
                @error('thumbnail')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @else
                  <div class="text-dark mt-2">
                    {{ __('Harap dikosongkan jika tidak terdapat perubahan') }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="date">{{ __('Tanggal') }}</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ $news->date }}" required />
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

  @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
      ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>
  @endpush

@endsection
