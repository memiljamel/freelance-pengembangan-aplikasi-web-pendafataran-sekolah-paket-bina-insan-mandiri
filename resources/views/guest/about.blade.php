@extends('layout.app')

@section('title', 'Profil')

@section('container')

  @include('layout.header')
 
  <section class="regards">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>{{ __('Kata Sambutan') }}</h3>
          <p>{{ __('Selamat Datang di Website PKBM Binai') }}</p>
        </div>
        <div class="col-md-6">
          <p>{{ __('Assalamu’alaikum wr. wb.') }}</p>
          <p>
            {{ __('Puji syukur kami panjatkan kehadirat Allah SWT atas limpahan rahmat dan karunia-Nya sehingga
            PKBM Bina Warga berhasil membangun website. Kehadiran Website PKBM Bina Warga diharapkan dapat
            memudahkan penyampaian informasi secara terbuka kepada warga belajar, calon warga belajar dan
            masyarakat serta instansi lain yang terkait.') }} 
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="grow">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h1 class="text-md-title-page pt-5">{{ __('PKBM Bina Warga') }}</h1>
          <p class="text-md-desc">
            {{ __('Pendidikan Non Formal yang berdiri sejak 2009. PKBM ini dipimpin dan
            dikelola oleh seseorang yang berpengalaman sebagai praktisi dalam membimbing anak berkebutuhan
            khusus dan pendidikan non formal. PKBM Bina Warga dikelola oleh orang-orang yang berlatar
            belakang sarjana pendidikan, pendidikan anak berkebutuhan khusus dan sarjana psikologi.') }}
          </p>
        </div>
        <div class="col-lg-5">
          <img src="{{ asset('img/section-img/img-section-1.svg') }}" alt="img">
        </div>
      </div>
    </div>
  </section>

  <section class="vision">
    <div class="container">
      <h1 class="text-md-title-page mb-5">{{ __('Visi Misi & Tujuan') }}</h1>
      <div class="row">
        <div class="col-md-4">
          <h5>{{ __('Visi') }}</h5>
          <p>
            {{ __('Menjadi Lembaga Pendidikan Non Formal yang berkualitas dan peduli dengan pengembangan Sumber Daya
            Manusia di Kabupaten Kotawaringin Barat.') }}
          </p>
        </div>
        <div class="col-md-4">
          <h5>{{ __('Misi') }}</h5>
          <p>
            {{ __('Menjadi Lembaga Pendidikan Non Formal yang berkualitas dan peduli dengan pengembangan Sumber Daya
            Manusia di Kabupaten Kotawaringin Barat.') }}
          </p>
        </div>
        <div class="col-md-4">
          <h5>{{ __('Tujuan') }}</h5>
          <p>{{ __('Memberikan program-program dan layanan pendidikan kesetaraan yang berkualitas sesuai perkembangan zaman') }}</p>
        </div>
      </div>
    </div>
  </section>

  <section class="legal">
    <div class="container">
      <h1 class="text-md-title-page mb-5">{{ __('Legalitas Formal') }}</h1>
      <p><b>{{ __('NPSN: ') }}</b>{{ __('P2962028') }}</p>
      <p><b>{{ __('No. Ijin Operasional: ') }}</b>{{ __('152/KPTS/DIKPORA/2009') }}</p>
      <p><b>{{ __('SK Kemenkumham: ') }}</b>{{ __('C-398 HT 03.01 Th1999 Tgl 24 Februari 1999') }}</p>
      <p><b>{{ __('Akta Notaris: ') }}</b>{{ __('No. 8 Tanggal 1 Juli 2009. Notaris Noviani Ardjan, SH.') }}</p>
    </div>
  </section>

  @include('layout.footer')

@endsection
