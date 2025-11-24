<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/png" href="{{ asset('storage/images/logo_ayam_kabogor.png') }}?v=3">
  <link rel="shortcut icon" href="{{ asset('storage/images/logo_ayam_kabogor.png') }}?v=3">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Index') - Ayam Kabogor</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">

  <style>
      /* Variabel Warna Footer */
      :root {
          --footer-text: #641E02;
          --primary-orange: #FB4A04;
      }

      .custom-footer {
          background-color: #FEF9E6;
          color: var(--footer-text);
          padding-top: 40px;
          padding-bottom: 20px;
          font-size: 0.95rem;
      }

      /* Header Footer: Halal, Sehat, Nikmat */
      .footer-tagline {
          text-align: center;
          font-weight: 700;
          font-size: 1.2rem;
          margin-bottom: 20px;
          color: #641E02;
      }

      /* Garis Pemisah Halus */
      .footer-divider {
          border-top: 1px solid #8D6E63;
          margin-bottom: 40px;
          width: 100%;
          opacity: 0.5;
      }

      .footer-bottom-divider {
          border-top: 1px solid #8D6E63;
          margin-top: 40px;
          margin-bottom: 20px;
          opacity: 0.5;
      }

      /* Logo di Footer */
      .footer-logo-img {
          max-height: 120px;
          margin-bottom: 15px;
      }

      /* Judul Kolom */
      .footer-heading {
          font-weight: 700;
          font-size: 1.1rem;
          margin-bottom: 20px;
          color: var(--footer-text);
      }

      /* Link di Footer */
      .footer-links {
          list-style: none;
          padding: 0;
          margin: 0;
      }

      .footer-links li {
          margin-bottom: 12px;
      }

      .footer-links a {
          text-decoration: none;
          color: var(--footer-text);
          font-weight: 500;
          transition: color 0.3s;
          display: flex;
          align-items: center; /* Agar ikon dan teks sejajar vertikal */
          gap: 8px; /* Jarak antara ikon dan teks */
      }

      .footer-links a:hover {
          color: var(--primary-orange);
      }

      .footer-address {
          line-height: 1.6;
          font-weight: 500;
          color: #641E02;
          text-decoration: none;
      }

      .copyright-text {
          font-weight: 700;
          color: var(--footer-text);
          text-align: center;
          font-size: 1rem;
      }

      @media (max-width: 768px) {
          .footer-divider { margin-bottom: 30px; }
          .footer-heading { margin-top: 30px; }
      }
  </style>
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
                
                <a href="https://www.google.com/maps/place/Ayam+Kabogor+(Ayam+Kampung+dan+Bebek)/@-6.5396366,106.7346767,15z/data=!4m6!3m5!1s0x2e69c57314e99fab:0xba5a28cb42daaa23!8m2!3d-6.5389454!4d106.7417237!16s%2Fg%2F11kf9llvxv?entry=ttu&g_ep=EgoyMDI1MTAwMS4wIKXMDSoASAFQAw%3D%3D" class="footer-address" target="_blank">
                    Jalan Atang Sanjaya KM. 2,<br>
                    Bantarsari, Rancabungur Bogor,<br>
                    Bogor, Indonesia 16310.
                </a>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-heading">About</h5>
                <ul class="footer-links">
                  <li><a href="#beranda" class="active">Beranda</a></li>
                  <li><a href="#produk">Produk</a></li>
                  <li><a href="#kelebihan">Kelebihan</a></li>
                  <li><a href="#testimoni">Testimoni</a></li>
                  <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-heading">Socials</h5>
                <ul class="footer-links">
                    <li>
                        <a href="https://wa.me/6282122103241?text=Halo%20Admin%20Ayam%20Kabogor%2C%20saya%20mau%20pesan" target="_blank">
                            <i class="fab fa-whatsapp me-2"></i> WhatsApp
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="fab fa-instagram me-2"></i> Instagram
                        </a>
                    </li>
                    <li>
                        <a href="https://www.tiktok.com/" target="_blank">
                            <i class="fab fa-tiktok me-2"></i> TikTok
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="fab fa-facebook me-2"></i> Facebook
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom-divider"></div>

        <div class="row">
            <div class="col-12">
                <p class="copyright-text mb-0">
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