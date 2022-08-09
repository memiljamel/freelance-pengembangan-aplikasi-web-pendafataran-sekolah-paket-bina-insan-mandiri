@extends('layout.app')

@section('title', 'Beranda')

@section('container')

  @include('layout.header')

    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="text">
              <h1>{{ __('Sekolah Paket PKBM Bina Insan Mandiri') }}</h1>
              <p>{{ __('Kegiatan belajar masyarakat untuk meraih ilmu pengetahuan.') }}</p>
              <a href="{{ route('service') }}" class="btn btn-primary">{{ __('Lihat Layanan') }}</a>
            </div>
          </div>
          <div class="col-md-6">
            <img src="{{ asset('img/hero-img/img-hiro.svg') }}" alt="img-hero" class="w-100">
          </div>
        </div>
      </div>
    </section>

    <section class="what">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <img src="{{ asset('img/section-img/img-section-1.svg') }}" alt="img">
          </div>
          <div class="col-lg-7">
            <h1 class="text-md-title">{{ __('Apa itu PKBM Bina Insan Mandiri?') }}</h1>
            <p class="text-md-desc">
              {{ __('PKBM merupakan pusat kegiatan belajar masyarakat, dengan arti lain sebagai tempat belajar
              bagi peserta didik jalur pendidikan non formal. Tempat belajar identik dengan sekolah, 
              hanya saja, PKBM merupakan pendidikan nor formal. Meskipun nonformal, tetap memenuhi 
              ketentuan yang ditetapkan.') }}
            </p>
            <a href="{{ route('service') }}" class="btn btn-primary">{{ __('Selengkapnya') }}</a>
          </div>
        </div>
      </div>
    </section>

    <section class="terms">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-5">
            <div class="text-title">
              <h1 class="text-md-title">{{ __('Ketentuan Penerimaan') }}</h1>
              <p class="text-md-desc">
                {{ __('Kami menerima mereka dari berbagai kalangan yang telah kami cantumkan dibawah ini.') }}
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card bg-warning bg-opacity-10 mb-4">
              <div class="card-body">
                <img src="{{ asset('img/icons/icons-1.svg') }}" alt="icons">
              </div>
              <p>{{ __('Siswa Putus Sekolah') }}</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card bg-warning bg-opacity-10 mb-4">
              <div class="card-body">
                <img src="{{ asset('img/icons/icons-1.svg') }}" alt="icons">
              </div>
              <p>{{ __('Siswa Reguler Usia Sekolah') }}</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card bg-warning bg-opacity-10 mb-4">
              <div class="card-body">
                <img src="{{ asset('img/icons/icons-1.svg') }}" alt="icons">
              </div>
              <p>{{ __('Siswa Berkebutuhan Khusus') }}</p>
          </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card bg-warning bg-opacity-10 mb-4">
              <div class="card-body">
                <img src="{{ asset('img/icons/icons-1.svg') }}" alt="icons">
              </div>
              <p>{{ __('Pelatihan Ketarampilan') }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="program">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="text">
              <h1 class="text-md-title">{{ __('Segera Lakukan Pendaftaran') }}</h1>
              <p class="text-md-desc">
                {{ __('Pusat kegiatan belajar masyarakat yang melayani anak homeschooling, 
                anak putus sekolah dan juga memberikan layanan kursus belajar.') }}
              </p>
              <a href="{{ route('service') }}" class="btn btn-primary">{{ __('Selengkapnya') }}</a>
            </div>
          </div>
          <div class="col-lg-5">
            <img src="{{ asset('img/section-img/img-section-1.svg') }}" alt="img">
          </div>
        </div>
      </div>
    </section>

    <section class="whyus">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="text-md-title">{{ __('Kenapa Harus Dengan Kami?') }}</h1>
            <p class="text-md-desc">
              {{ __('PKBM Bina Warga telah berdiri sejak tahun 2009 dan terlah meluluskan ratusan peserta didik unggul.') }}
            </p>
          </div>
          <div class="col-md-6">
            <div class="float-end">
              <div class="d-flex mb-4">
                <img src="{{ asset('img/icons/icon-why-1.svg') }}" alt="icons" class="pe-4">
                <p class="text-why">{{ __('Izin Resmi dari Kemendikbud') }}</p>
              </div>
              <div class="d-flex mb-4">
                <img src="{{ asset('img/icons/icon-why-2.svg') }}" alt="icons" class="pe-4">
                <p class="text-why">{{ __('Ijazah kesetaran dengan aket A, B, C, dll') }}</p>
              </div>
              <div class="d-flex mb-4">
                <img src="{{ asset('img/icons/icon-why-3.svg') }}" alt="icons" class="pe-4">
                <p class="text-why">{{ __('Kegiatan belajar mengajar yang aktif') }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('layout.footer')

@endsection
