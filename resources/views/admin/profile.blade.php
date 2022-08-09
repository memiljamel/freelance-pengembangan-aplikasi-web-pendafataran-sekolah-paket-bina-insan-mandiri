@extends('admin.layout.app')

@section('title', 'Akun Saya')

@section('container')

  <div class="container-fluid">

    @if (session()->has('status'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('status') }}
      </div>
    @endif

    <div class="row">
      <div class="col-xl-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <form class="needs-validation" action="{{ route('admin.profile.avatar', $user->id) }}" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              @method('PATCH')

              @if ($user->avatar === 'default.jpg')
                <img class="img-account-profile rounded-circle mb-2" width="150px" height="150px" src="{{ asset('img/avatar/' . $user->avatar) }}" alt="{{ $user->name }}">
              @else
                <img class="img-account-profile rounded-circle mb-2" width="150px" height="150px" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
              @endif
              <div class="small font-italic text-muted mb-4">
                {{ __('Format: jpg,jpeg,png (Max: 2MB)') }}
              </div>
              <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar" required />
              @error('avatar')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
              <button class="btn btn-primary mt-4" type="submit">
                <i class="bi bi-pencil-square"></i>
                {{ __('Ubah Gambar') }}
              </button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card mb-4">
          <div class="card-header">{{ __('Akun Saya') }}</div>
          <div class="card-body">
            <form class="needs-validation" action="{{ route('admin.profile.update', $user->id) }}" method="POST" novalidate>
              @csrf
              @method('PATCH')

              <div class="form-group">
                <label class="form-label" for="name">{{ __('Nama') }}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $user->name }}" required />
                @error('name')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" disabled />
              </div>
              <div class="form-group">
                <label class="form-label" for="password">{{ __('Kata Sandi') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required />
                @error('password')
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
                <label class="form-label" for="role">{{ __('Hak Akses') }}</label>
                <input type="text" class="form-control" name="role" id="role" value="{{ $user->role }}" disabled />
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