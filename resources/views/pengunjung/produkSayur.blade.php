<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Firdaus - Menjual Buah dan Sayuran</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/user/img/logo.png') }}" rel="icon">
  <link href="{{ asset('assets/user/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="{{ asset('assets/user/https://fonts.googleapis.com') }}" rel="preconnect">
  <link href="{{ asset('assets/user/https://fonts.gstatic.com" rel="preconnect') }}" crossorigin>
  <link href="{{ asset('assets/user/https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap') }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="{{ asset('assets/user/css/main.css') }}" rel="stylesheet">
</head>

<body class="produk-buah-page">

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('pengunjung.beranda') }}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/user/img/logo.png') }}" alt="logo" width="100%"> 
        <h1 class="sitename">Firdaus</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('pengunjung.beranda') }}">Beranda</a></li>
          <li class="dropdown"><a href="#"><span class="active">Produk</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('pengunjung.produkBuah') }}">Buah</a></li>
              <li><a href="{{ route('pengunjung.produkSayur') }}">Sayur</a></li>
              <li><a href="{{ route('pengunjung.informasiPembayaran') }}">Informasi Pembayaran</a></li>
            </ul>
          <li><a href="{{ route('pengunjung.kontak') }}">Kontak</a></li>
          <li><a href="{{ route('pengunjung.tentang') }}">Tentang</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title">
        <div class="container">
          <nav class="breadcrumbs">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li class="current">Sayur</li>
            </ol>
          </nav>
        </div>
      </div><!-- End Page Title -->

  <!-- Search Bar -->
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="GET" class="search-form">
          <input type="text" name="search" placeholder="Cari Sayur..." class="search-input">
          <button type="submit" class="search-button">Cari</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Produk Sayur Section -->
  <section id="produk-buah" class="produk-buah">
    <div class="container mt-3">
        <div class="row gy-4">
          <!-- Card 1 -->
          <div class="col-lg-3 col-md-6">
            <a href="link1.html" class="card-link">
              <div class="buah-item">
                <img src="{{ asset('assets/user/img/bawang_putih.jpg') }}" alt="Gambar Produk" class="card-img">
                <h4>Bawang Putih</h4>
                <p class="harga-produk">Rp 15,000 <span class="bobot-produk">/ Gram</span></p>
                <div class="divider"></div>
                <p class="status-tersedia">Tersedia</p> 
              </div>
            </a>
          </div>


          <!-- Card 2 -->
          <div class="col-lg-3 col-md-6">
            <a href="link2.html" class="card-link">
              <div class="buah-item">
                <img src="{{ asset('assets/user/img/bawang_merah.jpg') }}" alt="Gambar Produk" class="card-img">
                <h4>Bawang Merah</h4>
                <p class="harga-produk">Rp 10,000 <span class="bobot-produk">/ Gram</span></p>
                <div class="divider"></div>
                <p class="status-habis">Stok Habis</p> 
              </div>
            </a>
          </div>

          <!-- Card 3 -->
          <!-- <div class="col-lg-3 col-md-6">
            <a href="link4.html" class="card-link">
              <div class="buah-item">
                <img src="/assets/img/pear.jpg" alt="Gambar Produk" class="card-img">
                <h4>Pear</h4>
                <p class="harga-produk">Rp 16,000 <span class="bobot-produk">/ Kg</span></p>
                <div class="divider"></div>
                <p class="status-habis">Stok Habis</p> 
              </div>
            </a>
          </div> -->

          <!-- Card 4 -->
          <!-- <div class="col-lg-3 col-md-6">
            <a href="link4.html" class="card-link">
              <div class="buah-item">
                <img src="/assets/img/pear.jpg" alt="Gambar Produk" class="card-img">
                <h4>Pear</h4>
                <p class="harga-produk">Rp 12,000 <span class="bobot-produk">/ Kg</span></p>
                <div class="divider"></div>
                <p class="status-tersedia">Tersedia</p> 
              </div>
            </a>
          </div> -->
        </div>
      </div>
    </div>
  </section><!-- /Produk Buah Section -->

 <!-- Cara Beli Section -->
<section id="cara-beli" class="cara-beli bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-4">Cara Membeli Produk</h2>
    <div class="row">
      <div class="col-lg-4">
        <div class="step text-center">
          <div class="step-icon mb-3">
            <span class="bi bi-search" style="font-size: 2em; color: #1A5F3C;"></span>
          </div>
          <h5>Pilih Produk</h5>
          <p>Telusuri berbagai produk buah dan sayur yang tersedia dan pilih sesuai kebutuhan</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="step text-center">
          <div class="step-icon mb-3">
            <span class="bi bi-whatsapp" style="font-size: 2em; color: #1A5F3C;"></span>
          </div>
          <h5>Hubungi Nomor Whatsapp</h5>
          <p>Klik tombol "Hubungi Disini" atau klik produk untuk membeli produk</p>
          <a href="#" class="btn-hubungi">Hubungi Disini</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="step text-center">
          <div class="step-icon mb-3">
            <span class="bi bi-cash-coin" style="font-size: 2em; color: #1A5F3C;"></span>
          </div>
          <h5>Lakukan Pembayaran</h5>
          <p>Pembayaran melalui cash <a href="{{ route('pengunjung.informasiPembayaran') }}">informasi pembayaran</a></p>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Cara Beli Section -->


<footer id="footer" class="footer">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
            <div class="widget">
              <a href="{{ route('pengunjung.beranda') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('assets/user/img/logo.png') }}" alt="logo"> 
                <h1 class="footer-name">Firdaus</h1>
              </a>
              <p class="mb-4">
                Firdaus adalah sebuah Toko yang menjual aneka buah dan sayur, dimana usaha ini baru merintis selama 3 bulan. Pemilik usaha ini bernama Firdaus, sesuai dengan nama usaha yang ia buat.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 ps-lg-5 mb-3 mb-md-0">
            <div class="widget">
              <h3 class="widget-heading">Menu</h3>
              <ul class="list-unstyled float-start me-3">
                <li><a href="{{ route('pengunjung.beranda') }}">Beranda</a></li>
                <li><a href="{{ route('pengunjung.produkBuah') }}">Buah</a></li>
                <li><a href="{{ route('pengunjung.produkSayur') }}">Sayur</a></li>
              </ul>
              <ul class="list-unstyled float-start">
                <li><a href="{{ route('pengunjung.informasiPembayaran') }}">Informasi Pembayaran</a></li>
                <li><a href="{{ route('pengunjung.tentang') }}">Tentang</a></li>
                <li><a href="{{ route('pengunjung.kontak') }}">Kontak</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 pl-lg-5">
            <div class="widget">
              <h3 class="widget-heading">Media Sosial</h3>
              <ul class="list-unstyled social-icons light mb-3">
                <li>
                  <a href="https://www.instagram.com/flavatopia_"><span class="bi bi-instagram"></span></a>
                </li>
                <li>
                  <a href="#"><span class="bi bi-whatsapp"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
  
        <div class="copyright d-flex flex-column flex-md-row align-items-center justify-content-md-between">
          <p>© <span>Copyright 2024 </span> <strong class="px-1 sitename">Flavatopia.</strong> </p>
        </div>
      </div>
    </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <img src="{{ asset('assets/user/img/logo.png') }}" alt="Logo" class="preloader-logo" />
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/user/js/main.js') }}"></script>

</body>

</html>