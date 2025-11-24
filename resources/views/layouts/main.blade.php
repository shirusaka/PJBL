<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Index') - Ayam Kabogor</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome/all.min.js') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="{{ url('/') }}" class="">
        <img src="{{ asset('assets/img/logo_ayam.png') }}" alt="" style="height: 65px; width: auto; object-fit: contain;">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#beranda" class="active">Beranda<br></a></li>
          <li><a href="#produk">Produk</a></li>
          <li><a href="#kelebihan">Kelebihan</a></li>
          <li><a href="#testimoni">Testimoni</a></li>
          <li><a href="#faq">FAQ</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer class="custom-footer">
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <h3 class="footer-tagline">Halal, Sehat, Nikmat</h3>
                <div class="footer-divider"></div>
            </div>
        </div>

        <div class="row justify-content-between">
            
            <div class="col-lg-5 col-md-12 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('assets/img/logo_ayam.png') }}" alt="Ayam Kabogor Logo" class="footer-logo-img me-2" style="width: 180px; height: auto;">
                </div>
                
                <a href="https://www.google.com/maps/place/Ayam+Kabogor+(Ayam+Kampung+dan+Bebek)/@-6.5396366,106.7346767,15z/data=!4m6!3m5!1s0x2e69c57314e99fab:0xba5a28cb42daaa23!8m2!3d-6.5389454!4d106.7417237!16s%2Fg%2F11kf9llvxv?entry=ttu&g_ep=EgoyMDI1MTAwMS4wIKXMDSoASAFQAw%3D%3D" class="footer-address">
                    Jalan Atang Sanjaya KM. 2,<br>
                    Bantarsari, Rancabungur Bogor,<br>
                    Bogor, Indonesia 16310.
                </a>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-heading" style="color: #641E02;">About</h5>
                <ul class="footer-links">
                  <li><a href="#beranda" class="active" style="color: #641E02;">Beranda<br></a></li>
                  <li><a href="#produk" style="color: #641E02;">Produk</a></li>
                  <li><a href="#kelebihan" style="color: #641E02;">Kelebihan</a></li>
                  <li><a href="#testimoni" style="color: #641E02;">Testimoni</a></li>
                  <li><a href="#faq" style="color: #641E02;">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-heading">Socials</h5>
                <ul class="footer-links">
                    <li><a href="https://wa.me/6282122103241" target="_blank" style="color: #641E02;">WhatsApp</a></li>
                    <li><a href="https://instagram.com/" target="_blank" style="color: #641E02;">Instagram</a></li>
                    <li><a href="https://tiktok.com/" target="_blank" style="color: #641E02;">TikTok</a></li>
                    <li><a href="https://facebook.com/" target="_blank" style="color: #641E02;">Facebook</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom-divider"></div>

        <div class="row">
            <div class="col-12">
                <p class="copyright-text mb-0" style="color: #641E02;">
                    © 2025 Ayam Kabogor. All rights reserved
                </p>
            </div>
        </div>

    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/@popperjs/popper.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/is/is.min.js') }}"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="{{ asset('assets/vendor/fontawesome/all.min.js') }}"></script>
  
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/theme.js') }}"></script>

  @stack('scripts')

</body>
</html>