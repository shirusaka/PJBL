<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Ayam Kabogor</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Favicons page 2-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
  <link rel="manifest" href="assets/img/favicons/manifest.json">
  <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/theme.css')}}" rel="stylesheet" />
</head>

<body class="index-page">
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ... semua script lain ... -->
  <script src="assets/js/main.js"></script>

  <!-- pop up button pesan sekarang -->

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo_ayam.png" alt="" style="height: 65px; width: auto; object-fit: contain;">
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
    <!-- Hero Section [HOMEPAGE] -->
    <section id="beranda" class="hero section light-background">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <!-- judul 1 -->
            <h1 class="title1" data-aos="fade-up">Ayam Kabogor</h1>
            <br />

            <p data-aos="fade-up" data-aos-delay="100">
              Pilihan sehat, rasa nikmat untuk setiap acara anda. Dapatkan kelezatan autentik ayam kampung yang diolah secara alami tanpa bahan buatan.
              Selain ayam kampung, Ayam Kabogor juga menawarkan berbagai menu lainnya seperti olahan bebek, prasmanan, dan nasi kotak berbagai varian.
            </p>

            <!-- judul 2 -->
            <h2 class="title2" data-aos="fade-up">Ayam Kampung Asli Bogor yang <br /> Gurih dan Alami</h2>
            <p></p>

            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
              <a href="#" class="btn-get-started">Pesan Sekarang</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/ayam_homepage.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>
    </section><!-- Hero Section [HOMEPAGE CLOSE] -->


      <!-- Produk Section -->
        <section id="produk" class="section orange-background">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 mx-auto text-center mb-5">
                <h2 class="d-inline-block bg-warning text-dark px-6 py-3 rounded-pill fw-bold" style="font-size: 1.6rem;">
                  Daftar Produk
                </h2>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="carousel slide" id="carouselPopularItems" data-bs-touch="false" data-bs-interval="false">
                  <div class="carousel-inner">

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                      <div class="row gx-3 align-items-stretch">
                        
                        <!-- 1. Ayam Bakar Taliwang -->
                          <div class="col-sm-6 col-md-4 col-xl mb-5">
                            <div class="product-card rounded-3 p-3">
                              <img src="assets/img/ayam_ka/abak_tal.png" class="img-fluid rounded-3 w-100" alt="Ayam Bakar Taliwang">
                              <div class="mt-3">
                                <h5 class="fw-bold">Ayam Bakar Taliwang</h5>
                                <p class="small mt-2">Ayam kampung yang dibakar dengan bumbu khas Taliwang, pedas, gurih dan sedap beraroma rempah</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                  <span class="fw-bold">Rp 90.000</span>
                                  <span class="text-success fw-bold">Promo</span>
                                </div>
                                <div class="mt-3">
                                  <a href="#!" class="btn-orange">Detail</a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- 2. Ayam Frozen Ungkep -->
                          <div class="col-sm-6 col-md-4 col-xl mb-5">
                            <div class="product-card rounded-3 p-3">
                              <img src="assets/img/ayam_ka/af_ungkep.png" class="img-fluid rounded-3 w-100" alt="Ayam Frozen Ungkep">
                              <div class="mt-3">
                                <h5 class="fw-bold">Ayam Frozen Ungkep</h5>
                                <p class="small mt-2">Ayam yang sudah diungkep dengan bumbu rempah lengkap, siap goreng atau simpan beku</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                  <span class="fw-bold">Rp 80.000</span>
                                  <span class="text-success fw-bold">Hemat</span>
                                </div>
                                <div class="mt-3">
                                  <a href="#!" class="btn-orange">Detail</a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- 3. Ayam Frozen Kecap -->
                          <div class="col-sm-6 col-md-4 col-xl mb-5">
                            <div class="product-card rounded-3 p-3">
                              <img src="assets/img/ayam_ka/afro_kecap.png" class="img-fluid rounded-3 w-100" alt="Ayam Frozen Kecap">
                              <div class="mt-3">
                                <h5 class="fw-bold">Ayam Frozen Kecap</h5>
                                <p class="small mt-2">Ayam utuh marinated dengan bumbu kecap manis, siap masak jadi hidangan praktis nan lezat</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                  <span class="fw-bold">Rp 80.000</span>
                                  <span class="text-success fw-bold">Diskon</span>
                                </div>
                                <div class="mt-3">
                                  <a href="#!" class="btn-orange">Detail</a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- 4. Ayam Goreng Ungkep -->
                          <div class="col-sm-6 col-md-4 col-xl mb-5">
                            <div class="product-card rounded-3 p-3">
                              <img src="assets/img/ayam_ka/ag_ungkep.png" class="img-fluid rounded-3 w-100" alt="Ayam Goreng Ungkep">
                              <div class="mt-3">
                                <h5 class="fw-bold">Ayam Goreng Ungkep</h5>
                                <p class="small mt-2">Ayam utuh digoreng garing setelah direbus dalam bumbu rempah khas, gurih meresap dan renyah sempurna</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                  <span class="fw-bold">Rp 90.000</span>
                                  <span class="text-success fw-bold">Best Seller</span>
                                </div>
                                <div class="mt-3">
                                  <a href="#!" class="btn-orange">Detail</a>
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                      <div class="row gx-3 align-items-stretch">

                        <!-- 5. Ayam Bakar Kecap -->
                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/akampbak_kecap.png" class="img-fluid rounded-3 w-100" alt="Ayam Bakar Kecap">
                            <div class="mt-3">
                              <h5 class="fw-bold">Ayam Bakar Kecap</h5>
                              <p class="small mt-2">Ayam bakar berbalut bumbu kecap manis, dipanggang hingga karamelisasi sempurna, legit dan juicy</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp 90.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/bakakak_hamp.jpg" class="img-fluid rounded-3 w-100" alt="Bakakak Hampers">
                            <div class="mt-3">
                              <h5 class="fw-bold">Bakakak Hampers</h5>
                              <p class="small mt-2">Ayam kampung utuh yang dikemas eksklusif dalam hampers untuk hantaran ataupun acara spesial</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp 85.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/be_fro_ungkep.png" class="img-fluid rounded-3 w-100" alt="Bebek Frozen Ungkep">
                            <div class="mt-3">
                              <h5 class="fw-bold">Bebek Ungkep Frozen</h5>
                              <p class="small mt-2">Bebek utuh yang sudah diungkep dengan bumbu rempah, siap digoreng atau disimpan beku</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp 85.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/be_go_kremes.png" class="img-fluid rounded-3 w-100" alt="Bebek Goreng Kremes">
                            <div class="mt-3">
                              <h5 class="fw-bold">Bebek Goreng Kremes</h5>
                              <p class="small mt-2">Bebek yang digoreng garing dan disajikan dengan serundeng kremes yang renyah</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp 100.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                      <div class="row gx-3 align-items-stretch">

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/NB_ikan.jpg" class="img-fluid rounded-3 w-100" alt="Nasi Box Ikan">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box Ikan</h5>
                              <p class="small mt-2">Nasi putih hangat, ikan nila goreng dengan bumbu kuning, lalapan, tahu dan sambal dalam kemasan praktis</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/nasi_box.jpg" class="img-fluid rounded-3 w-100" alt="Nasi Box">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box Ayam Kecap</h5>
                              <p class="small mt-2">Nasi putih, ayam kecap empuk, sayur, telur balado dan jeruk dalam box siap saji</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/tumpeng.jpg" class="img-fluid rounded-3 w-100" alt="Tumpeng">
                            <div class="mt-3">
                              <h5 class="fw-bold">Tumpeng</h5>
                              <p class="small mt-2">Nasi kuning berbentuk kerucut dengan lauk komplit sebagai simbol syukur untuk acara istimewa</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp 350.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/tumpeng_mini.jpg" class="img-fluid rounded-3 w-100" alt="Tumpeng Mini">
                            <div class="mt-3">
                              <h5 class="fw-bold">Tumpeng Mini</h5>
                              <p class="small mt-2">Versi mini dari tumpeng lengkap, cocok untuk syukuran atau hadiah personal</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp 35.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- Slide 4-->
                    <div class="carousel-item">
                      <div class="row gx-3 align-items-stretch">

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/nasi_box2.jpg" class="img-fluid rounded-3 w-100" alt="Aneka Nasi Box">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box Ayam Serundeng</h5>
                              <p class="small mt-2">Nasi putih dengan ayam berbalut serundeng kelapa garing, gurih dan harum dalam box siap saji</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/nasi_box3.jpg" class="img-fluid rounded-3 w-100" alt="Aneka Nasi Box">
                            <div class="mt-3">
                              <h5 class="fw-bold">Bento Karakter</h5>
                              <p class="small mt-2">Nasi dan lauk berbentuk karakter lucu untuk anak-anak, sehat, bergizi dan menggemaskan</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/nasi_box5.jpg" class="img-fluid rounded-3 w-100" alt="Aneka Nasi Box">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box Ayam Goreng</h5>
                              <p class="small mt-2">Nasi putih, ayam goreng, sambal, lalapan, sayur dan irisan timun dalam kemasan yang praktis</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/prasmanan.jpg" class="img-fluid rounded-3 w-100" alt="Prasmanan">
                            <div class="mt-3">
                              <h5 class="fw-bold">Prasmanan</h5>
                              <p class="small mt-2">Sajian lengkap ala prasmanan untuk acara besar, bisa disesuaikan sesuai paket</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 65.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- Slide 5 -->
                    <div class="carousel-item">
                      <div class="row gx-3 align-items-stretch">

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/nasi_bok_AB.jpg" class="img-fluid rounded-3 w-100" alt="Aneka Nasi Box">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box Ayam Bakar</h5>
                              <p class="small mt-2">Nasi putih, ayam bakar bumbu rempah, lalapan, tahu dan sambal dalam kemasan siap saji</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/NB_kotak_makan.jpg" class="img-fluid rounded-3 w-100" alt="Aneka Nasi Box">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box + Kotak Makan</h5>
                              <p class="small mt-2">Paket nasi box lengkap dengan kotak makan eksklusif, cocok untuk hampers atau acara formal</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/nasi_box_ayam_kotak.jpg" class="img-fluid rounded-3 w-100" alt="Ayam Karkas">
                            <div class="mt-3">
                              <h5 class="fw-bold">Nasi Box Ayam Asam Manis</h5>
                              <p class="small mt-2">Nasi putih yang dipadukan dengan ayam fillet saus asam manis, sayuran, sambal, bakwan dan ikan fillet</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Mulai dari Rp 25.000</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xl mb-5">
                          <div class="product-card rounded-3 p-3">
                            <img src="assets/img/ayam_ka/karkas.jpeg" class="img-fluid rounded-3 w-100" alt="Ayam Karkas">
                            <div class="mt-3">
                              <h5 class="fw-bold">Ayam Karkas</h5>
                              <p class="small mt-2">Ayam potong bersih tanpa kepala, ceker, dan jeroan – siap olah untuk berbagai kebutuhan masak</p>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-bold">Rp -</span>
                                <span class="text-success fw-bold">Spesial</span>
                              </div>
                              <div class="mt-3">
                                <a href="#!" class="btn-orange">Detail</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>

                  </div>

                  <!-- Navigation Buttons -->
                  <button class="carousel-control-prev carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next carousel-icon" type="button" data-bs-target="#carouselPopularItems" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Produk Section -->


      <!-- Page 3 ============================-->
        <section id="kelebihan" class="hero section light-background">

          <div class="container">
            <div class="row justify-content-center g-0">
              <div class="col-xl-9">
                <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                  <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">Keunggulan</h5>
                  <p>Kenapa Memilih Ayam Kabogor</p>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-3 mb-6">
                    <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/location.png" height="112" alt="..." />
                      <h5 class="mt-4 fw-bold">Select location</h5>
                      <p class="mb-md-0">Choose the location where your food will be delivered.</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3 mb-6">
                    <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/order.png" height="112" alt="..." />
                      <h5 class="mt-4 fw-bold">Choose order</h5>
                      <p class="mb-md-0">Check over hundreds of menus to pick your favorite food</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3 mb-6">
                    <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/pay.png" height="112" alt="..." />
                      <h5 class="mt-4 fw-bold">Pay advanced</h5>
                      <p class="mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3 mb-6">
                    <div class="text-center"><img class="shadow-icon" src="assets/img/gallery/meals.png" height="112" alt="..." />
                      <h5 class="mt-4 fw-bold">Enjoy meals</h5>
                      <p class="mb-md-0">Food is made and delivered directly to your home.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- end of .container-->
  
        </section>
        <!-- Page 3 close ============================-->

    
  <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div class="address">
            <h4>Address</h4>
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p></p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone:</strong> <span>+1 5589 55488 55</span><br>
              <strong>Email:</strong> <span>info@example.com</span><br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat:</strong> <span>11AM - 23PM</span><br>
              <strong>Sunday</strong>: <span>Closed</span>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Yummy</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Javascript Page 2 -->
  <script src="assets/vendor/@popperjs/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/is/is.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
  <script src="assets/vendor/fontawesome/all.min.js"></script>
  <script src="assets/js/theme.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">
        

  <!-- pop up button pesan sekarang -->
  <div id="pesanModal" class="modal">
    <div class="modal-content">
      <center>
      <h2>Tanya Admin untuk Pemesanan</h2>
      <a href="https://wa.me/6282122103241?text=Selamat%20siang,%20mohon%20informasi%20mengenai%20harga%20produk%20pada%20Ayam%20Kabogor" target="_blank" class="whatsapp-btn">
        Pesan WhatsApp
      </a>
      <button class="close-btn">Kembali</button>
      </center>
    </div>
  </div>

  <!-- Script Modal -->
  <script>
    const modal = document.getElementById("pesanModal");
    const openBtn = document.querySelector(".btn-get-started");
    const closeBtn = document.querySelector(".close-btn");

    function openModal() {
      modal.classList.add("show");
      document.body.style.overflow = "hidden";
    }

    function closeModal() {
      modal.classList.remove("show");
      document.body.style.overflow = "auto";
    }

    if (openBtn) {
      openBtn.addEventListener("click", function(e) {
        e.preventDefault();
        openModal();
      });
    }

    if (closeBtn) {
      closeBtn.addEventListener("click", closeModal);
    }

    window.addEventListener("click", function(e) {
      if (e.target === modal) closeModal();
    });

    window.addEventListener("keydown", function(e) {
      if (e.key === "Escape") closeModal();
    });
  </script>
</body>
</html>