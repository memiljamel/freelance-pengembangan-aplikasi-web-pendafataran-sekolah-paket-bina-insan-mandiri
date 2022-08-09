@extends('layout.app')

@section('title', 'Gallery')

@section('container')

  @push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
  @endpush

  @include('layout.header')

  <section class="blog">
    <div class="container">
      <h1 class="text-md-title-page">Gallery</h1>
      <p class="text-md-desc-page mb-5">{{ __('Berikut ini merupakan kegiatan yang dilakukan PKBM Insan Mandiri') }}</p>

      <div class="row">
        @forelse ($galleries as $gallery)
        <div class="col-lg-4 col-sm-6 col-sm-12 mb-4">
          <a class="with-caption image-link" title="images" href="{{ asset('storage/' . $gallery->image) }}">
            <img class="w-100" src="{{ asset('storage/' . $gallery->image) }}" />
          </a>
        </div>
        @empty
          <p>Tidak ada gallery.</p>
        @endforelse
      </div>
    </div>
  </section>

  @include('layout.footer')

  @push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
      $('.with-caption').magnificPopup({
        type: 'image',
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
          verticalFit: true,
          titleSrc: function(item) {
            var caption = item.el.attr('title');
            var pinItURL = "https://pinterest.com/pin/create/button/";
            // Refer to https://developers.pinterest.com/pin_it/
            pinItURL += '?url=' + 'http://dimsemenov.com/plugins/magnific-popup/';
            pinItURL += '&media=' + item.el.attr('href');
            pinItURL += '&description=' + caption;

            return caption + ' &middot; <a class="pin-it" href="' + pinItURL + '" target="_blank"><img src="https://assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>';
          }
        },
        gallery: {
          enabled: true
        },
        callbacks: {
          open: function() {
            this.wrap.on('click.pinhandler', '.pin-it', function(e) {});
          },
          beforeClose: function() {}
        }
      });
    </script>
  @endpush

@endsection