@extends('layout.app')

@section('title', 'Daftar')

@section('container')

  @include('layout.header')

  <section class="services">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Form Pendaftaran Siswa Baru') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('PKMB BINA INSAN MANDIRI TP. 2021/2022') }}</p>
      <form class="needs-validation" action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf
        @method('POST')

        <div class="row">
          <div class="col-md-5">
            <h5 class="fw-bold">{{ __('Keterangan Siswa') }}</h5>
            <div class="form-group">
              <label class="form-label" for="fullname">{{ __('Nama Lengkap') }}</label>
              <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" value="{{ old('fullname') }}" required />
              @error('fullname')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="nickname">{{ __('Nama Panggilan') }}</label>
              <input type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" id="nickname" value="{{ old('nickname') }}" required />
              @error('nickname')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="phone_number">{{ __('Nomor Ponsel') }}</label>
              <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required />
              @error('phone_number')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="password">{{ __('Kata Sandi') }}</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required />
              @error('password')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="gender">{{ __('Jenis Kelamin') }}</label>
              <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" required>
                <option value="Laki-laki" @if (old('gender') === 'Laki-laki') selected @endif>{{ __('Laki-laki') }}</option>
                <option value="Perempuan"  @if (old('gender') === 'Perempuan') selected @endif>{{ __('Perempuan') }}</option>
              </select>
              @error('gender')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="place_of_birth">{{ __('Tempat Lahir') }}</label>
              <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth') }}" required />
              @error('place_of_birth')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="date_of_birth">{{ __('Tanggal Lahir') }}</label>
              <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required />
              @error('date_of_birth')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="religion">{{ __('Agama') }}</label>
              <select class="form-control @error('religion') is-invalid @enderror" name="religion" id="religion" required>
                <option value="Islam" @if (old('religion') === 'Islam') selected @endif>{{ __('Islam') }}</option>
                <option value="Protestan" @if (old('religion') === 'Protestan') selected @endif>{{ __('Protestan') }}</option>
                <option value="Katolik" @if (old('religion') === 'Katolik') selected @endif>{{ __('Katolik') }}</option>
                <option value="Hindu" @if (old('religion') === 'Hindu') selected @endif>{{ __('Hindu') }}</option>
                <option value="Buddha" @if (old('religion') === 'Buddha') selected @endif>{{ __('Buddha') }}</option>
                <option value="Khonghucu" @if (old('religion') === 'Khonghucu') selected @endif>{{ __('Khonghucu') }}</option>
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
                <option value="Indonesia" @if (old('everyday_language') === 'Indonesia') selected @endif>{{ __('Indonesia') }}</option>
                <option value="Melayu" @if (old('everyday_language') === 'Melayu') selected @endif>{{ __('Melayu') }}</option>
                <option value="Jawa" @if (old('everyday_language') === 'Jawa') selected @endif>{{ __('Jawa') }}</option>
                <option value="Sunda" @if (old('everyday_language') === 'Sunda') selected @endif>{{ __('Sunda') }}</option>
                <option value="Bugis" @if (old('everyday_language') === 'Bugis') selected @endif>{{ __('Bugis') }}</option>
                <option value="Madura" @if (old('everyday_language') === 'Madura') selected @endif>{{ __('Madura') }}</option>
                <option value="Minangkabau" @if (old('everyday_language') === 'Minangkabau') selected @endif>{{ __('Minangkabau') }}</option>
              </select>
              @error('everyday_language')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="body_height">{{ __('Tinggi Badan (Cm)') }}</label>
              <input type="number" class="form-control @error('body_height') is-invalid @enderror" name="body_height" id="body_height" value="{{ old('body_height') }}" required />
              @error('body_height')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="body_weight">{{ __('Berat Badan (Kg)') }}</label>
              <input type="number" class="form-control @error('body_weight') is-invalid @enderror" name="body_weight" id="body_weight" value="{{ old('body_weight') }}" required />
              @error('body_weight')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="address">{{ __('Alamat Rumah') }}</label>
              <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3" required>{{ old('address') }}</textarea>
              @error('address')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="distance">{{ __('Jarak Dari Rumah ke Sekolah (Km)') }}</label>
              <input type="number" class="form-control @error('distance') is-invalid @enderror" name="distance" id="distance" value="{{ old('distance') }}" required />
              @error('distance')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>

          <div class="col-md-5">
            <h5 class="fw-bold">{{ __('Keterangan Orang Tua/Wali Siswa') }}</h5>
            <div class="form-group">
              <label class="form-label" for="father_name">{{ __('Nama Ayah') }}</label>
              <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" id="father_name" value="{{ old('father_name') }}" required />
              @error('father_name')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="mother_name">{{ __('Nama Ibu') }}</label>
              <input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" id="mother_name" value="{{ old('mother_name') }}" required />
              @error('mother_name')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="father_education">{{ __('Pendidikan Ayah') }}</label>
              <select class="form-control @error('father_education') is-invalid @enderror" name="father_education" id="father_education" required>
                <option value="SD" @if (old('father_education') === 'SD') selected @endif>{{ __('SD') }}</option>
                <option value="SLTP" @if (old('father_education') === 'SLTP') selected @endif>{{ __('SLTP') }}</option>
                <option value="SLTA" @if (old('father_education') === 'SLTA') selected @endif>{{ __('SLTA') }}</option>
                <option value="D3" @if (old('father_education') === 'D3') selected @endif>{{ __('D3') }}</option>
                <option value="S1" @if (old('father_education') === 'S1') selected @endif>{{ __('S1') }}</option>
                <option value="S2" @if (old('father_education') === 'S2') selected @endif>{{ __('S2') }}</option>
                <option value="S3" @if (old('father_education') === 'S3') selected @endif>{{ __('S3') }}</option>
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
                <option value="SD" @if (old('mother_education') === 'SD') selected @endif>{{ __('SD') }}</option>
                <option value="SLTP" @if (old('mother_education') === 'SLTP') selected @endif>{{ __('SLTP') }}</option>
                <option value="SLTA" @if (old('mother_education') === 'SLTA') selected @endif>{{ __('SLTA') }}</option>
                <option value="D3" @if (old('mother_education') === 'D3') selected @endif>{{ __('D3') }}</option>
                <option value="S1" @if (old('mother_education') === 'S1') selected @endif>{{ __('S1') }}</option>
                <option value="S2" @if (old('mother_education') === 'S2') selected @endif>{{ __('S2') }}</option>
                <option value="S3" @if (old('mother_education') === 'S3') selected @endif>{{ __('S3') }}</option>
              </select>
              @error('mother_education')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="father_job">{{ __('Pekerjaan Ayah') }}</label>
              <input type="text" class="form-control @error('father_job') is-invalid @enderror" name="father_job" id="father_job" value="{{ old('father_job') }}" required />
              @error('father_job')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="mother_job">{{ __('Pekerjaan Ibu') }}</label>
              <input type="text" class="form-control @error('mother_job') is-invalid @enderror" name="mother_job" id="mother_job" value="{{ old('mother_job') }}" required />
              @error('mother_job')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="father_age">{{ __('Usia Ayah (Tahun)') }}</label>
              <input type="number" class="form-control @error('father_age') is-invalid @enderror" name="father_age" id="father_age" value="{{ old('father_age') }}" required />
              @error('father_age')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="mother_age">{{ __('Usia Ibu (Tahun)') }}</label>
              <input type="number" class="form-control @error('mother_age') is-invalid @enderror" name="mother_age" id="mother_age" value="{{ old('mother_age') }}" required />
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
                <option value="Paket A" @if (old('education_category') === 'Paket A') selected @endif>{{ __('Paket A') }}</option>
                <option value="Paket B" @if (old('education_category') === 'Paket B') selected @endif>{{ __('Paket B') }}</option>
                <option value="Paket C" @if (old('education_category') === 'Paket C') selected @endif>{{ __('Paket C') }}</option>
              </select>
              @error('education_category')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="other_choice">{{ __('Pilihan Lain') }}</label>
              <input type="text" class="form-control @error('other_choice') is-invalid @enderror" name="other_choice" id="other_choice" value="{{ old('other_choice') }}" />
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
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="identity_card">{{ __('Fotocopy KTP (Max: 2 MB)') }}</label>
              <input type="file" class="form-control @error('identity_card') is-invalid @enderror" name="identity_card" id="identity_card" required />
              @error('identity_card')
                <div class="text-danger mt-2">
                  {{ $message }}
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
              @enderror
            </div>
            <div class="form-group">
              <label class="form-label" for="avatar">{{ __('Pas Foto (Max: 2 MB, Berwarna Merah)') }}</label>
              <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" id="avatar" required />
              @error('avatar')
                <div class="text-danger mt-2">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <span class="fw-bold">Catatan :</span><br>
            <small class="text-secondary">
              {{ __('Sekolah gratis (tanpa dipungut biaya) pendaftaran harap dilampirkan fotocopy Akte Kelahiran/KTP/KK') }}
            </small>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Daftar Sekarang') }}</button>
      </form>
    </div>
  </section>

  @include('layout.footer')

@endsection
