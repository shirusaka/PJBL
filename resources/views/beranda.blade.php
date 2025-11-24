@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

  <section id="beranda" class="hero section light-background">
    <div class="container">
      <div class="row gy-4 justify-content-center justify-content-lg-between">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 class="title1" data-aos="fade-up">Ayam Kabogor</h1>
          <br />
          <p data-aos="fade-up" data-aos-delay="100">
            Pilihan sehat, rasa nikmat untuk setiap acara anda. Dapatkan kelezatan autentik ayam kampung yang diolah secara alami tanpa bahan buatan.
            Selain ayam kampung, Ayam Kabogor juga menawarkan berbagai menu lainnya seperti olahan bebek, prasmanan, dan nasi kotak berbagai varian.
          </p>
          <h2 class="title2" data-aos="fade-up">Ayam Kampung Asli Bogor yang <br /> Gurih dan Alami</h2>
          <p></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#produk" class="btn-get-started">Pesan Sekarang</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{ asset('assets/img/ayam_homepage.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

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

              @forelse($menus->chunk(4) as $index => $chunk)
              <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <div class="row gx-3 align-items-stretch justify-content-center">
                  
                  @foreach($chunk as $menu)
                  <div class="col-sm-6 col-md-4 col-lg-3 mb-5">
                    <div class="product-card rounded-3 p-3 h-100 bg-white">
                      <div style="height: 220px; overflow: hidden; border-radius: 12px;">
                          <img src="{{ asset('storage/' . $menu->gambar) }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="{{ $menu->nama_menu }}">
                      </div>
                      
                      <div class="mt-3 d-flex flex-column h-100">
                        <h5 class="fw-bold">{{ $menu->nama_menu }}</h5>
                        <p class="small mt-2 text-muted">{{ Str::limit($menu->deskripsi, 80) }}</p>
                        
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mt-3">
                              @if($menu->promo)
                                <div>
                                    <span class="fw-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                                    <br>
                                    <small class="text-decoration-line-through text-muted" style="font-size: 11px;">
                                        Rp {{ number_format(($menu->harga * 100) / (100 - $menu->promo), 0, ',', '.') }}
                                    </small>
                                </div>
                                <span class="text-success fw-bold">Promo {{ $menu->promo }}%</span>
                              @else
                                <span class="fw-bold">Rp {{ number_format($menu->harga, 0, ',', '.') }}</span>
                              @endif
                            </div>
                            
                            <div class="mt-3">
                              <a href="#" 
                                class="btn-orange detail-btn w-100 d-block text-center"
                                data-name="{{ $menu->nama_menu }}"
                                data-desc="{{ $menu->deskripsi }}"
                                data-price="Rp {{ number_format($menu->harga, 0, ',', '.') }}"
                                data-promo="{{ $menu->promo ? 'Promo '.$menu->promo.'%' : '' }}"
                                data-img="{{ asset('storage/' . $menu->gambar) }}"
                                data-whatsapp="https://wa.me/6282122103241?text=Halo,%20saya%20ingin%20pesan%20{{ urlencode($menu->nama_menu) }}%20">
                                Detail
                              </a>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach

                </div>
              </div>
              @empty
              <div class="carousel-item active">
                  <div class="text-center text-white py-5">
                      <h4>Belum ada menu yang tersedia.</h4>
                  </div>
              </div>
              @endforelse

            </div>

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

  <section id="kelebihan" class="section light-background">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 mx-auto text-center mb-5">
          <h2 class="title1 fw-bold" style="font-size: 2.0rem;">Keunggulan</h2>
          <p class="faq-subtitle" style="color: #4b3621;">Kenapa Memilih Ayam Kabogor?</p>
        </div>
      </div>
      
      <div class="row gy-4">
        <div class="col-sm-6 col-md-3">
          <div class="feature-card h-100">
            <img src="{{ asset('assets/img/ayam_ka/ayam_kampung.jpg') }}" class="img-fluid mb-3" style="height: 150px; object-fit: cover; width: 100%; border-radius: 12px;">
            <h5 class="fw-bold mb-2" style="color: #641E02;">Menggunakan ayam kampung pilihan</h5>
            <p class="mb-0 text-start" style="color: #555; font-size: 0.9rem;">Ayam Kabogor menggunakan ayam kampung pilihan untuk menyajikan kualitas terbaik.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="feature-card h-100">
            <img src="{{ asset('assets/img/ayam_ka/logo_halal.jpeg') }}" class="img-fluid mb-3" style="height: 150px; object-fit: cover; width: 100%; border-radius: 12px;">
            <h5 class="fw-bold mb-2" style="color: #641E02;">Terjamin Halal</h5>
            <p class="mb-0 text-start" style="color: #555; font-size: 0.9rem;">Semua proses pengolahan di dapur sudah sesuai standar dan terjamin kehalalannya.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="feature-card h-100">
            <img src="{{ asset('assets/img/ayam_ka/rempah.jpeg') }}" class="img-fluid mb-3" style="height: 150px; object-fit: cover; width: 100%; border-radius: 12px;">
            <h5 class="fw-bold mb-2" style="color: #641E02;">Diracik dengan bumbu rempah asli</h5>
            <p class="mb-0 text-start" style="color: #555; font-size: 0.9rem;">Resepnya diolah secara teliti untuk menghasilkan cita rasa yang kaya, bukan menggunakan bumbu instan.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="feature-card h-100">
            <img src="{{ asset('assets/img/ayam_ka/ayam_kelebihan.jpeg') }}" class="img-fluid mb-3" style="height: 150px; object-fit: cover; width: 100%; border-radius: 12px;">
            <h5 class="fw-bold mb-2" style="color: #641E02;">Sehat dan Alami</h5>
            <p class="mb-0 text-start" style="color: #555; font-size: 0.9rem;">Ayam yang digunakan Ayam Kabogor dirawat secara alami tanpa suntikan bahan kimia.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="testimoni" class="section-testimoni">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mx-auto text-center mb-5">
                <h2 class="d-inline-block bg-warning text-dark px-6 py-3 rounded-pill fw-bold" style="font-size: 1.6rem;">Testimoni</h2>
                <p class="faq-subtitle" style="color: #4b3621;">Apa kata pelanggan tentang Ayam Kabogor?</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 position-relative px-lg-5">
                <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
                    <div class="carousel-inner py-3">
                        
                        @forelse($testimonials->chunk(4) as $key => $chunk)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <div class="row gx-3 justify-content-center">
                                @foreach($chunk as $testi)
                                    <div class="col-lg-3 col-md-6 col-10 mb-3 mx-auto mx-md-0 
                                        {{ $loop->index == 1 ? 'd-none d-md-block' : '' }} 
                                        {{ $loop->index > 1 ? 'd-none d-lg-block' : '' }}">
                                        <div class="phone-mockup">
                                            <img src="{{ asset('storage/' . $testi->foto_ss) }}" class="testi-img" alt="{{ $testi->title }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-5">Belum ada testimoni.</div>
                        @endforelse

                    </div>
                    <button class="carousel-control-prev carousel-icon" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next carousel-icon" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
  </section>

  <section id="faq" class="faq">
    <div class="faq-container">
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto text-center">
                <h2 class="faq-title" style="color: #FB4A04;">Frequently Asked Question</h2>
                <p class="faq-subtitle" style="color: #4b3621;">Kualitas adalah prioritas kami. Cek pertanyaan dan jawaban umum tentang Ayam Kabogor dan layanan katering kami.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 mx-auto">
                
                {{-- LOOP DATA FAQ --}}
                @foreach($faqs as $index => $faq)
                <div class="faq-card {{ $index >= 4 ? 'faq-hidden' : '' }}" id="faq-card-{{ $index }}">
                    <button class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faq-item-{{ $faq->id }}">
                        <h5>{{ $faq->pertanyaan }}</h5>
                        <span class="faq-icon">
                            <svg class="faq-icon-svg icon-plus" xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                            <svg class="faq-icon-svg icon-minus" xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" /></svg>
                        </span>
                    </button>
                    <div id="faq-item-{{ $faq->id }}" class="collapse" data-bs-parent="#faq">
                        <div class="faq-body">
                            {{ $faq->jawaban }}
                        </div>
                    </div>
                </div>
                @endforeach

                @if($faqs->count() > 4)
                <div class="text-center mt-4">
                    <button id="btnLoadMore" class="btn-load-more" title="Lihat Pertanyaan Lainnya" style="background: none; border: none; font-size: 1.5rem; color: #FB4A04;">
                        <i class="fas fa-arrow-down"></i>
                    </button>
                    <button id="btnShowLess" class="btn-load-more" title="Sembunyikan Pertanyaan" style="display: none; background: none; border: none; font-size: 1.5rem; color: #FB4A04;">
                        <i class="fas fa-arrow-up"></i>
                    </button>
                </div>
                @endif

            </div>
        </div>
    </div>
  </section>

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

  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg rounded-4" style="max-width: 400px; background: #fff;">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center p-4">
          <img src="" id="modalProductImage" class="img-fluid rounded-3 mb-3" alt="Produk" style="max-height: 280px; object-fit: cover;">
          <h5 class="fw-bold mb-2" id="modalProductName" style="text-align: left; color: #322602;">Nama Produk</h5>
          <p class="small mb-3" id="modalProductDesc" style="text-align: left; color: #322602;">Deskripsi produk akan muncul di sini...</p>
          
          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="fw-bold" id="modalProductPrice" style="font-size: 0.85rem; color: #322602;">Harga: Rp 0</span>
            <span class="text-success fw-bold" id="modalProductPromo">Promo/Diskon</span>
          </div>

          <div class="input-group mb-3">
            <button type="button" class="btn btn-light border" id="decreaseQty" style="background-color: #ffebee;">-</button>
            <input type="number" class="form-control text-center" value="1" min="1" max="50" id="quantityInput">
            <button type="button" class="btn btn-light border" id="increaseQty" style="background-color: #e8f5e9;">+</button>
          </div>

          <a href="#" id="whatsappLink" target="_blank" class="btn-orange w-100 fw-bold d-block py-2" style="background-color: #FB4A04; color: white; border-radius: 8px;">
            Pesan WhatsApp
          </a>
          <p></p>
          <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <script>
    // --- Modal Pesan Sekarang ---
    const modal = document.getElementById("pesanModal");
    const openBtn = document.querySelector(".btn-get-started");
    const closeBtn = document.querySelector(".close-btn");

    if(openBtn) {
        openBtn.addEventListener("click", function(e) {
            if(this.getAttribute('href') === '#') {
                e.preventDefault();
                modal.style.display = 'block';
            }
        });
    }
    if(closeBtn) {
        closeBtn.addEventListener("click", function() {
            modal.style.display = 'none';
        });
    }
    window.addEventListener("click", function(e) {
        if (e.target === modal) modal.style.display = 'none';
    });

    // --- Modal Detail Produk ---
    const productModal = new bootstrap.Modal(document.getElementById('productModal'));
    const modalImg = document.getElementById('modalProductImage');
    const modalName = document.getElementById('modalProductName');
    const modalDesc = document.getElementById('modalProductDesc');
    const modalPrice = document.getElementById('modalProductPrice');
    const modalPromo = document.getElementById('modalProductPromo');
    const whatsappLink = document.getElementById('whatsappLink');
    const quantityInput = document.getElementById('quantityInput');
    const decreaseBtn = document.getElementById('decreaseQty');
    const increaseBtn = document.getElementById('increaseQty');

    function updateWhatsAppLink() {
        const qty = quantityInput.value;
        const baseLink = whatsappLink.getAttribute('data-base-link');
        if(baseLink) whatsappLink.href = `${baseLink} (Jumlah: ${qty} Porsi)`;
    }

    document.querySelectorAll('.detail-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            modalImg.src = this.getAttribute('data-img');
            modalName.textContent = this.getAttribute('data-name');
            modalDesc.textContent = this.getAttribute('data-desc');
            modalPrice.textContent = this.getAttribute('data-price');
            modalPromo.textContent = this.getAttribute('data-promo');
            whatsappLink.setAttribute('data-base-link', this.getAttribute('data-whatsapp'));
            
            quantityInput.value = 1;
            updateWhatsAppLink();
            productModal.show();
        });
    });

    decreaseBtn.addEventListener('click', () => {
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updateWhatsAppLink();
        }
    });
    increaseBtn.addEventListener('click', () => {
        quantityInput.value = parseInt(quantityInput.value) + 1;
        updateWhatsAppLink();
    });
    quantityInput.addEventListener('input', () => {
        if (quantityInput.value < 1) quantityInput.value = 1;
        updateWhatsAppLink();
    });

    // --- Logic FAQ Load More ---
    document.addEventListener('DOMContentLoaded', function() {
        const btnLoadMore = document.getElementById('btnLoadMore');
        const btnShowLess = document.getElementById('btnShowLess');
        // Ambil semua kartu FAQ yang disembunyikan (index >= 4)
        const hiddenCards = document.querySelectorAll('.faq-card.faq-hidden');

        if(btnLoadMore && btnShowLess) {
            btnLoadMore.addEventListener('click', function() {
                hiddenCards.forEach(card => {
                    card.classList.remove('faq-hidden');
                    // Tambahkan style display block inline jika class faq-hidden menggunakan display:none di CSS
                    card.style.display = 'block'; 
                });
                btnLoadMore.style.display = 'none';
                btnShowLess.style.display = 'inline-block';
            });

            btnShowLess.addEventListener('click', function() {
                hiddenCards.forEach(card => {
                    card.classList.add('faq-hidden');
                    card.style.display = 'none';
                });
                btnShowLess.style.display = 'none';
                btnLoadMore.style.display = 'inline-block';
                document.getElementById('faq').scrollIntoView({ behavior: 'smooth' });
            });
        }
    });
  </script>

  <style>
    .faq-hidden {
        display: none;
    }
  </style>
@endpush