<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda | Sistem Informasi Data Barang Elektronik</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />

  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      font-size: 18px;
    }

    /* Navbar styling */
    #navigation {
      background-color: #007bff;
      width: 100%;
    }

    #responsive-nav {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .main-nav {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 50px;
      list-style: none;
      margin: 0;
      padding: 18px 0;
      width: 100%;
    }

    .main-nav li a {
      color: white;
      font-size: 1.25rem;
      font-weight: 600;
      text-decoration: none;
      padding: 10px 20px;
      transition: background 0.3s, color 0.3s;
    }

    .main-nav li a:hover {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 6px;
    }

    .main-nav .active a {
      font-weight: 700;
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .main-nav {
        flex-direction: column;
        gap: 20px;
        padding: 20px 0;
      }
    }

    .display-4 {
      font-size: 2.75rem;
      font-weight: 700;
    }

    .lead {
      font-size: 1.3rem;
    }

    .fa-3x {
      font-size: 3.5rem !important;
    }

    footer {
      color: #ccc;
    }

    .footer-title {
      font-size: 1.3rem;
      color: white;
    }

    .footer-links li a {
      font-size: 1.1rem;
      color: #ccc;
      text-decoration: none;
    }

    .footer-links li a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- NAVIGATION -->
  <nav id="navigation">
    <div id="responsive-nav">
      <ul class="main-nav nav navbar-nav">
        <li class="active"><a href="index.html">Beranda</a></li>
        <li><a href="kategori.html">Kategori</a></li>
        <li><a href="tentang.html">Tentang</a></li>
        <li><a href="/login">Login</a></li> <!-- Link login diperbaiki -->
      </ul>
    </div>
  </nav>
  <!-- /NAVIGATION -->

  <!-- HERO SECTION -->
  <section style="padding: 80px 0; background: #f8f9fa;">
    <div class="container text-center">
      <h1 class="display-4">Selamat Datang</h1>
      <p class="lead mt-3">Sistem Informasi Data Barang Elektronik</p>
      <a href="/data_barang" class="btn btn-primary mt-4">Lihat Data Barang</a>
    </div>
  </section>
  <!-- /HERO -->

  <!-- FITUR UTAMA -->
  <section style="padding: 60px 0;">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4">
          <i class="fa fa-database fa-3x text-primary mb-3"></i>
          <h4>Manajemen Data</h4>
          <p>Mengelola data barang elektronik secara efektif dan efisien.</p>
        </div>
        <div class="col-md-4">
          <i class="fa fa-tags fa-3x text-primary mb-3"></i>
          <h4>Kategori Barang</h4>
          <p>Klasifikasikan barang sesuai kategori untuk kemudahan pencarian.</p>
        </div>
        <div class="col-md-4">
          <i class="fa fa-lock fa-3x text-primary mb-3"></i>
          <h4>Akses Aman</h4>
          <p>Login admin untuk pengelolaan dan keamanan data maksimal.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /FITUR -->

  <!-- FOOTER -->
  <footer style="background-color: #222;">
    <div class="section" style="padding: 40px 0;">
      <div class="container">
        <div class="row">
          <!-- Tentang -->
          <div class="col-md-3 col-xs-6">
            <h3 class="footer-title">Tentang Sistem</h3>
            <p>Sistem ini digunakan untuk pengelolaan barang elektronik.</p>
            <ul class="footer-links">
              <li><a href="#"><i class="fa fa-map-marker"></i> Jl. Teknologi No.1</a></li>
              <li><a href="#"><i class="fa fa-phone"></i> +62 812-3456-7890</a></li>
              <li><a href="#"><i class="fa fa-envelope-o"></i> info@sistem.com</a></li>
            </ul>
          </div>
          <!-- Kategori -->
          <div class="col-md-3 col-xs-6">
            <h3 class="footer-title">Kategori</h3>
            <ul class="footer-links">
              <li><a href="#">Elektronik</a></li>
              <li><a href="#">Komputer</a></li>
              <li><a href="#">Aksesori</a></li>
              <li><a href="#">Lainnya</a></li>
            </ul>
          </div>
          <!-- Info -->
          <div class="col-md-3 col-xs-6">
            <h3 class="footer-title">Informasi</h3>
            <ul class="footer-links">
              <li><a href="tentang.html">Tentang Kami</a></li>
              <li><a href="#">Kebijakan Privasi</a></li>
              <li><a href="#">Syarat & Ketentuan</a></li>
            </ul>
          </div>
          <!-- Layanan -->
          <div class="col-md-3 col-xs-6">
            <h3 class="footer-title">Layanan</h3>
            <ul class="footer-links">
              <li><a href="#">Bantuan</a></li>
              <li><a href="autentikasi/login.html">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div style="background-color: #111; text-align: center; padding: 20px;">
      &copy; <script>document.write(new Date().getFullYear());</script> Sistem Informasi Barang Elektronik
    </div>
  </footer>
  <!-- /FOOTER -->

  <!-- JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
