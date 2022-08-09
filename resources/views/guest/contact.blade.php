@extends('layout.app')

@section('title', 'Kontak')

@section('container')

  @include('layout.header')

  <section class="services">
    <div class="container">
      <h1 class="text-md-title-page">{{ __('Kontak') }}</h1>
      <p class="text-md-desc-page mb-5">{{ __('Anda dapat menghubungi kami disini') }}</p>

      @if (session()->has('status'))
        <div class="alert alert-success" role="alert">
          {{ session()->get('status') }}
        </div>
      @endif

      <div class="row">
        <div class="col-md-6">
          <form class="needs-validation" action="{{ route('contact.sendmail') }}" method="POST" novalidate>
            @csrf
            @method('POST')

            <div class="mb-3">
              <div class="form-group">
                <label for="subject" class="form-label">{{ __('Subyek') }}</label>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" value="{{ old('subject') }}" required />
                @error('subject')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required />
                @error('email')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <div class="mb-3">
                <label for="message" class="form-label">{{ __('Pesan') }}</label>
                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="3" required>{{ old('message') }}</textarea>
                @error('message')
                  <div class="text-danger mt-2">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Kirim') }}</button>
          </form>
        </div>
        <div class="col-md-6">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127658.54907466835!2d100.07980516207492!3d0.8967464790707731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302b6cb670e21019%3A0xfff34b2c18cf94fe!2sTangun%2C%20Bangun%20Purba%2C%20Rokan%20Hulu%20Regency%2C%20Riau%2C%20Indonesia!5e0!3m2!1sen!2snl!4v1659356623683!5m2!1sen!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 mt-5"></iframe>
        </div>
      </div>
    </div>
  </section>

  @include('layout.footer')
  
@endsection
