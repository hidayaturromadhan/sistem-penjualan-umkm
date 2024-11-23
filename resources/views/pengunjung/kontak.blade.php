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

<body class="index-page">

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
          <li class="dropdown"><a href="#"><span>Produk</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('pengunjung.produkBuah') }}">Buah</a></li>
              <li><a href="{{ route('pengunjung.produkSayur') }}">Sayur</a></li>
              <li><a href="{{ route('pengunjung.informasiPembayaran') }}">Informasi Pembayaran</a></li>
            </ul>
          <li><a href="{{ route('pengunjung.kontak') }}" class="active">Kontak</a></li>
          <li><a href="{{ route('pengunjung.tentang') }}" >Tentang</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

    <!-- Contact Information Section -->
  <section id="contact-info" class="contact-info py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="contact-box">
            <h3>Hubungi Kami di WhatsApp</h3>
            <p><i class="bi bi-whatsapp"></i> <a href="https://api.whatsapp.com/send?phone=6282285875473&text=Halo%2Caku%20ingin%20menanyakan%20prihal%20transaksi">+6282285875473</p></a>
            <p>Hubungi kami untuk informasi lebih lanjut atau pemesanan produk.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="contact-box">
            <h3>Ikuti Kami di Instagram</h3>
            <p><i class="bi bi-instagram"></i> <a href="https://www.instagram.com/flavatopia_" target="_blank">@flavatopia_</a></p>
            <p>Ikuti kami untuk update produk dan promosi terbaru.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Location Section -->
  <section id="location" class="location py-5">
    <div class="container">
      <h3 class="text-center mb-4">Lokasi Toko Firdaus</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- Google Maps Embed -->
          <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63815.953438894445!2d102.08682569676274!3d1.4745596189449066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15fc9713e498f%3A0x142fd1f48e5b694a!2sTK%20Trisula%20Perwari!5e0!3m2!1sid!2sid!4v1731350461568!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <p class="text-center mt-3">Jl. Ahmad Yani depan TK Trisula, Kota Bengkalis, Riau, Indonesia</p>
        </div>
      </div>
    </div>
  </section>


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
                <li><a href="{{ route('pengunjung.tentang') }}" >Tentang</a></li>
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
                  <a href="https://api.whatsapp.com/send?phone=6282285875473&text=Halo%2Caku%20ingin%20menanyakan%20prihal%20transaksi"><span class="bi bi-whatsapp"></span></a>
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