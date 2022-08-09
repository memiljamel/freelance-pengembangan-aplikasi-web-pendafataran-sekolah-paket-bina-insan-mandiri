@extends('admin.layout.app')

@section('title', 'Pendaftaran')

@section('container')

  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{ __('Daftar Data Calon Siswa') }}</h1>
      <a href="{{ route('admin.student.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-undo fa-sm text-white-50"></i> 
        {{ __('Kembali') }}
      </a>
    </div>

    @if (session()->has('status'))
      <div class="alert alert-success" role="alert">
        {{ session()->get('status') }}
      </div>
    @endif

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Data Calon Siswa') }}</h6>
      </div>
      <div class="card-body">
        <form class="needs-validation" action="{{ route('admin.student.update', $user->personal->id) }}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          @method('PATCH')
        
          <div class="row">
            <div class="col-md-6">
              <h5 class="fw-bold">{{ __('Keterangan Siswa') }}</h5>
              <div class="form-group">
                <span class="form-label">{{ __('Nama Lengkap') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->fullname }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Nama Panggilan') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->nickname }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Email') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->email }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Jenis Kelamin') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->gender }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Tempat Lahir') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->place_of_birth }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Tanggal Lahir') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->date_of_birth }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Agama') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->religion }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Bahasa Sehari-hari') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->everyday_language }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Tinggi Badan') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->body_height }} Cm</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Berat Badan') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->body_weight }} Kg</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Alamat Rumah') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->address }} Kg</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Jarak Dari Rumah ke Sekolah') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->distance }} Km</div>
              </div>
            </div>
            <div class="col-md-6">
              <h5 class="fw-bold">{{ __('Keterangan Orang Tua/Wali Siswa') }}</h5>
              <div class="form-group">
                <span class="form-label">{{ __('Nama Ayah') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->father_name }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Nama Ibu') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->mother_name }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Pendidikan Ayah') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->father_education }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Pendidikan Ibu') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->mother_education }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Pekerjaan Ayah') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->father_job }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Pekerjaan Ibu') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->mother_job }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Usia Ayah') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->father_age }} Tahun</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Usia Ibu') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->mother_age }} Tahun</div>
              </div>

              <h5 class="fw-bold mt-2">{{ __('Pendididkan yang Dinginkan') }}</h5>
              <div class="form-group">
                <span class="form-label">{{ __('Kategori pendidikan') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->education_category }}</div>
              </div>
              <div class="form-group">
                <span class="form-label">{{ __('Pilihan Lain') }}</span>
                <div class="font-weight-normal text-justify text-dark">{{ $user->personal->other_choice }}</div>
              </div>

              <h5 class="fw-bold mt-2">{{ __('Keputusan Terhadap Siswa') }}</h5>
              <div class="form-group">
                <label class="form-label" for="status">{{ __('Status Pendaftaran') }}</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                  <option value="Diproses" @if ($user->personal->status === 'Diproses') selected @endif>{{ __('Diproses') }}</option>
                  <option value="Diterima" @if ($user->personal->status === 'Diterima') selected @endif>{{ __('Diterima') }}</option>
                  <option value="Ditolak" @if ($user->personal->status === 'Ditolak') selected @endif>{{ __('Ditolak') }}</option>
                </select>
                @error('status')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <hr class="d-none d-md-block">
          <div class="float-right">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
