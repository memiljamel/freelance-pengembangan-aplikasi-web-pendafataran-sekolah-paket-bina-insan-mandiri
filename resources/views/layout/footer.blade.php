<footer>
  <div class="container">
    <div class="row">
      <div class=" col-12">
        <div class="row pt-5">
          <div class="col-xl-4 col-12 mr-auto">
            <img src="{{ asset('img/logo/logo-white.svg') }}" alt="logo">
            <div class="address">
              <h6>{{ __('Kab. Rokan Hulu') }}</h6>
              <p>{{ __('Desa Tangun, Kec. Bangun Purba, Kab. Rokan Hulu, Riau, 28713') }}</p>
            </div>
          </div>
          <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
            <div class="row justify-content-around">
              <div class="col-md-3 col-12 mt-md-0 mt-3">
                <ul class="list-unstyled">
                  <li class="h6 fw-bold">{{ __('Tentang Kami') }}</li>
                  <li><a href="{{ route('contact.index') }}">{{ __('Kontak') }}</a></li>
                  <li><a href="{{ route('about') }}">{{ __('Profil') }}</a></li>
                </ul>
              </div>
              <div class="col-md-3 col-12 mt-md-0 mt-3">
                <ul class="list-unstyled">
                  <li class="h6 fw-bold">{{ __('Sitemap') }}</li>
                  <li><a href="{{ route('welcome') }}">{{ __('Beranda') }}</a></li>
                  <li><a href="{{ route('about') }}">{{ __('Profil') }}</a></li>
                  <li><a href="{{ route('service') }}">{{ __('Layanan') }}</a></li>
                  <li><a href="{{ route('contact.index') }}">{{ __('Kontak') }}</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4 bottom-row justify-content-between">
          <div class="col-auto ml-2 ">
            <small>&copy; {{ __('2022, Bina Insan Mandiri. All Right Reserved.') }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
