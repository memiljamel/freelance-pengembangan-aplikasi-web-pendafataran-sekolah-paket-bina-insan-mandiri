@extends('layout.app')

@section('title', 'Akun Saya')

@section('container')

  @include('layout.header')

  <section class="services">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Akun Saya') }}</h1>
      <p class="text-md-desc-page mb-4">{{ __('Berikut ini merupakan data diri Anda.') }}</p>

      @if (session()->has('status'))
        <div class="alert alert-success" role="alert">
          {{ session()->get('status') }}
        </div>
      @endif

      <div class="row">
        <div class="col-xl-4">
          <div class="card mb-4">
            <div class="card-header bg-transparent">
              <h6>{{ __('Status Pendaftaran') }}</h6>
            </div>
            <div class="card-body text-center">
              @if ($user->personal->status === 'Diproses')
                <div class="alert alert-warning" role="alert">{{ __('Harap bersabar! Proses pendaftaran Anda sedang diproses.') }}</div>
              @elseif ($user->personal->status === 'Diterima')
                <div class="alert alert-success" role="alert">
                  {{ $user->personal->notes ?: __('Selamat! Proses pendaftaran Anda diterima.') }}
                </div>
                <a class="btn btn-primary js-download-link button" href="{{ route('admin.export.pdf', $user->personal->id) }}">
                  {{ __('Unduh Bukti Pendaftaran') }}
                </a>
              @else
                <div class="alert alert-danger" role="alert">
                  {{ $user->personal->notes ?: __('Maaf! Proses pendaftaran Anda ditolak.') }}
                </div>
              @endif
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body text-center">
            <form class="needs-validation" action="{{ route('student.profile.avatar', $user->personal->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PATCH')

                <img class="img-account-profile rounded-circle mb-2" width="150px" height="150px" src="{{ asset('storage/' . $user->personal->avatar) }}" alt="{{ $user->personal->nickname }}">
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
                  {{ __('Ubah Gambar') }}
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xl-8">
          <form class="needs-validation" action="{{ route('student.profile.update', $user->personal->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PATCH')

            <div class="mb-1">
              <h5 class="fw-bold">{{ __('Keterangan Siswa') }}</h5>
              <div class="form-group">
                <label class="form-label" for="fullname">{{ __('Nama Lengkap') }}</label>
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" value="{{ $user->personal->fullname }}" required />
                @error('fullname')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="nickname">{{ __('Nama Panggilan') }}</label>
                <input type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" id="nickname" value="{{ $user->personal->nickname }}" required />
                @error('nickname')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="phone_number">{{ __('Nomor Ponsel') }}</label>
                <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ $user->phone_number }}" disabled />
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
                <label class="form-label" for="gender">{{ __('Jenis Kelamin') }}</label>
                <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" required>
                  <option value="Laki-laki" @if ($user->personal->gender === 'Laki-laki') selected @endif>{{ __('Laki-laki') }}</option>
                  <option value="Perempuan" @if ($user->personal->gender === 'Perempuan') selected @endif>{{ __('Perempuan') }}</option>
                </select>
                @error('gender')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="place_of_birth">{{ __('Tempat Lahir') }}</label>
                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" id="place_of_birth" value="{{ $user->personal->place_of_birth }}" required />
                @error('place_of_birth')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="date_of_birth">{{ __('Tanggal Lahir') }}</label>
                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth" value="{{ $user->personal->date_of_birth }}" required />
                @error('date_of_birth')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="religion">{{ __('Agama') }}</label>
                <select class="form-control @error('religion') is-invalid @enderror" name="religion" id="religion" required>
                  <option value="Islam" @if ($user->personal->religion === 'Islam') selected @endif>{{ __('Islam') }}</option>
                  <option value="Protestan" @if ($user->personal->religion === 'Protestan') selected @endif>{{ __('Protestan') }}</option>
                  <option value="Katolik" @if ($user->personal->religion === 'Katolik') selected @endif>{{ __('Katolik') }}</option>
                  <option value="Hindu" @if ($user->personal->religion === 'Hindu') selected @endif>{{ __('Hindu') }}</option>
                  <option value="Buddha" @if ($user->personal->religion === 'Buddha') selected @endif>{{ __('Buddha') }}</option>
                  <option value="Khonghucu" @if ($user->personal->religion === 'Khonghucu') selected @endif>{{ __('Khonghucu') }}</option>
                </select>
                @error('religion')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="everyday_language">{{ __('Bahasa Sehari-hari') }}</label>
                <select class="form-control @error('everyday_language') is-invalid @enderror" name="everyday_language" id="everyday_language" required>
                  <option value="Indonesia" @if ($user->personal->everyday_language === 'Indonesia') selected @endif>{{ __('Indonesia') }}</option>
                  <option value="Melayu" @if ($user->personal->everyday_language === 'Melayu') selected @endif>{{ __('Melayu') }}</option>
                  <option value="Jawa" @if ($user->personal->everyday_language === 'Jawa') selected @endif>{{ __('Jawa') }}</option>
                  <option value="Sunda" @if ($user->personal->everyday_language === 'Sunda') selected @endif>{{ __('Sunda') }}</option>
                  <option value="Bugis" @if ($user->personal->everyday_language === 'Bugis') selected @endif>{{ __('Bugis') }}</option>
                  <option value="Madura" @if ($user->personal->everyday_language === 'Madura') selected @endif>{{ __('Madura') }}</option>
                  <option value="Minangkabau" @if ($user->personal->everyday_language === 'Minangkabau') selected @endif>{{ __('Minangkabau') }}</option>
                </select>
                @error('everyday_language')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="body_height">{{ __('Tinggi Badan (Cm)') }}</label>
                <input type="number" class="form-control @error('body_height') is-invalid @enderror" name="body_height" id="body_height" value="{{ $user->personal->body_height }}" required />
                @error('body_height')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="body_weight">{{ __('Berat Badan (Kg)') }}</label>
                <input type="number" class="form-control @error('body_weight') is-invalid @enderror" name="body_weight" id="body_weight" value="{{ $user->personal->body_weight }}" required />
                @error('body_weight')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="address">{{ __('Alamat Rumah') }}</label>
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3" required>{{ $user->personal->address }}</textarea>
                @error('address')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="distance">{{ __('Jarak Dari Rumah ke Sekolah (Km)') }}</label>
                <input type="number" class="form-control @error('distance') is-invalid @enderror" name="distance" id="distance" value="{{ $user->personal->distance }}" required />
                @error('distance')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <h5 class="fw-bold">{{ __('Keterangan Orang Tua/Wali Siswa') }}</h5>
              <div class="form-group">
                <label class="form-label" for="father_name">{{ __('Nama Ayah') }}</label>
                <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" id="father_name" value="{{ $user->personal->father_name }}" required />
                @error('father_name')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="mother_name">{{ __('Nama Ibu') }}</label>
                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" id="mother_name" value="{{ $user->personal->mother_name }}" required />
                @error('mother_name')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="father_education">{{ __('Pendidikan Ayah') }}</label>
                <select class="form-control @error('father_education') is-invalid @enderror" name="father_education" id="father_education" required>
                  <option value="SD" @if ($user->personal->father_education === 'SD') selected @endif>{{ __('SD') }}</option>
                  <option value="SLTP" @if ($user->personal->father_education === 'SLTP') selected @endif>{{ __('SLTP') }}</option>
                  <option value="SLTA" @if ($user->personal->father_education === 'SLTA') selected @endif>{{ __('SLTA') }}</option>
                  <option value="D3" @if ($user->personal->father_education === 'D3') selected @endif>{{ __('D3') }}</option>
                  <option value="S1" @if ($user->personal->father_education === 'S1') selected @endif>{{ __('S1') }}</option>
                  <option value="S2" @if ($user->personal->father_education === 'S2') selected @endif>{{ __('S2') }}</option>
                  <option value="S3" @if ($user->personal->father_education === 'S3') selected @endif>{{ __('S3') }}</option>
                </select>
                @error('father_education')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="mother_education">{{ __('Pendidikan Ibu') }}</label>
                <select class="form-control @error('mother_education') is-invalid @enderror" name="mother_education" id="mother_education" required>
                  <option value="SD" @if ($user->personal->mother_education === 'SD') selected @endif>{{ __('SD') }}</option>
                  <option value="SLTP" @if ($user->personal->mother_education === 'SLTP') selected @endif>{{ __('SLTP') }}</option>
                  <option value="SLTA" @if ($user->personal->mother_education === 'SLTA') selected @endif>{{ __('SLTA') }}</option>
                  <option value="D3" @if ($user->personal->mother_education === 'D3') selected @endif>{{ __('D3') }}</option>
                  <option value="S1" @if ($user->personal->mother_education === 'S1') selected @endif>{{ __('S1') }}</option>
                  <option value="S2" @if ($user->personal->mother_education === 'S2') selected @endif>{{ __('S2') }}</option>
                  <option value="S3" @if ($user->personal->mother_education === 'S3') selected @endif>{{ __('S3') }}</option>
                </select>
                @error('mother_education')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="father_job">{{ __('Pekerjaan Ayah') }}</label>
                <input type="text" class="form-control @error('father_job') is-invalid @enderror" name="father_job" id="father_job" value="{{ $user->personal->father_job }}" required />
                @error('father_job')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="mother_job">{{ __('Pekerjaan Ibu') }}</label>
                <input type="text" class="form-control @error('mother_job') is-invalid @enderror" name="mother_job" id="mother_job" value="{{ $user->personal->mother_job }}" required />
                @error('mother_job')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="father_age">{{ __('Usia Ayah (Tahun)') }}</label>
                <input type="number" class="form-control @error('father_age') is-invalid @enderror" name="father_age" id="father_age" value="{{ $user->personal->father_age }}" required />
                @error('father_age')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="mother_age">{{ __('Usia Ibu (Tahun)') }}</label>
                <input type="number" class="form-control @error('mother_age') is-invalid @enderror" name="mother_age" id="mother_age" value="{{ $user->personal->mother_age }}" required />
                @error('mother_age')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <h5 class="fw-bold mt-2">{{ __('Pendididkan yang Dinginkan') }}</h5>
              <div class="form-group">
                <label class="form-label" for="education_category">{{ __('Kategori pendidikan') }}</label>
                <select class="form-control @error('education_category') is-invalid @enderror" name="education_category" id="education_category" required>
                  <option value="Paket A" @if ($user->personal->education_category === 'Paket A') selected @endif>{{ __('Paket A') }}</option>
                  <option value="Paket B" @if ($user->personal->education_category === 'Paket B') selected @endif>{{ __('Paket B') }}</option>
                  <option value="Paket C" @if ($user->personal->education_category === 'Paket C') selected @endif>{{ __('Paket C') }}</option>
                </select>
                @error('education_category')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label class="form-label" for="other_choice">{{ __('Pilihan Lain') }}</label>
                <input type="text" class="form-control @error('other_choice') is-invalid @enderror" name="other_choice" id="other_choice" value="{{ $user->personal->other_choice }}" />
                @error('other_choice')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <h5 class="fw-bold mt-2">Berkas</h5>
              <div class="form-group">
                <label class="form-label" for="birth_certificate">{{ __('Fotocopy Akte Kelahiran (Max: 2 MB)') }}</label>
                <input type="file" class="form-control @error('birth_certificate') is-invalid @enderror" name="birth_certificate" id="birth_certificate" required />
                @error('birth_certificate')
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
                <label class="form-label" for="identity_card">{{ __('Fotocopy KTP (Max: 2 MB)') }}</label>
                <input type="file" class="form-control @error('identity_card') is-invalid @enderror" name="identity_card" id="identity_card" required />
                @error('identity_card')
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
                <label class="form-label" for="family_card">{{ __('Fotocopy KK (Max: 2 MB)') }}</label>
                <input type="file" class="form-control @error('family_card') is-invalid @enderror" name="family_card" id="family_card" required />
                @error('family_card')
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
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  @include('layout.footer')

@endsection
