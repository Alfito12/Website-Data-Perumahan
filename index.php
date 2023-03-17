<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perumku Sumenep</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/sumekar.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v4.10.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">Perumku</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Menu</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Katalog</a></li>
          <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      
      <h1>INFORMASI PERUMAHAN KABUPATEN SUMENEP</h1>
      <h2>Dinas Perumahan Rakyat, Kawasan Permukiman dan Perhubungan Sumenep</h2>
      <a href="#services" class="btn-get-started scrollto">Mulai</a>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- sss -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Menu</h2>
          <h3>Informasi Data PSU <span>Sumenep</span></h3>
        </div>

        <div class="row">
          
          <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><a href="dataperumahan.php"><i class="bi bi-houses"></i></a></div>
              <h4 class="title"><a href="dataperumahan.php">Data Perumahan</a></h4>
              <p class="description">Berikut merupakan detail tentang Data Perumahan Kabupaten Sumenep</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box">
              <div class="icon"><a href="gisperumahan.php"> <i class="bi bi-geo-alt"></i></a></div>
              <h4 class="title"><a href="gisperumahan.php">Peta Perumahan </a></h4>
              <p class="description">Berikut merupakan detail Peta Perumahan Kabupaten Sumenep</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Katalog</h2>
          <h3>Cek katalog <span></span></h3>
          <p>Gambar Model Perumahan di Kabupaten Sumenep</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-1">App</li>
              <li data-filter=".filter-2">Card</li>
              <li data-filter=".filter-3">Web</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          <?php
            include "koneksi.php";
            $select = mysqli_query($koneksi, "SELECT gambar.id_gambar,gambar.gambar,gambar.id_perum,perumahan.nama_perum FROM gambar inner join perumahan on gambar.id_perum = perumahan.id_perum where gambar.id_perum between 1 and 3 group by gambar.id_perum ") or die(mysqli_error($koneksi));
            while($tampil = mysqli_fetch_array($select)){ 
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-1">
            <img src="assets/img/perum/<?php echo"$tampil[gambar]"?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo"$tampil[nama_perum]"?></h4>
              <p><?php echo"$tampil[nama_perum]"?></p>
              <?php echo'<a href="detailperumahan.php?id_perum='.$tampil['id_perum'].'" class="details-link" title="More Details"><i class="bx bx-link"></i></a>'?>
            </div>
          </div>
          <?php
              }?>
          <?php
            include "koneksi.php";
            $select = mysqli_query($koneksi, "SELECT gambar.id_gambar,gambar.gambar,gambar.id_perum,perumahan.nama_perum FROM gambar inner join perumahan on gambar.id_perum = perumahan.id_perum where gambar.id_perum between 4 and 9 group by gambar.id_perum ") or die(mysqli_error($koneksi));
            while($tampil = mysqli_fetch_array($select)){ 
          ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-2">
            <img src="assets/img/perum/<?php echo"$tampil[gambar]"?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo"$tampil[nama_perum]"?></h4>
              <p><?php echo"$tampil[nama_perum]"?></p>
              <?php echo'<a href="detailperumahan.php?id_perum='.$tampil['id_perum'].'" class="details-link" title="More Details"><i class="bx bx-link"></i></a>'?>
            </div>
          </div>
          <?php
            }?>
          
        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= About Section ======= -->
    <section id="tentang" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Tentang</h2>
          <h3>Informasi Serah Terima <span>PSU</span></h3>
          <p>	Penyerahan prasarana, sarana, dan utilitas perumahan dan permukiman dari pengembang kepada pemerintah daerah.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              <b>Pengertian</b>
            <ul>
              <li><i class="ri-check-double-line"></i>Prasarana <br>Kelengkapan dasar fisik untuk kebutuhan bertempat tinggal layak, sehat, aman dan nyaman.</li>
              <li><i class="ri-check-double-line"></i>Sarana <br>Fasilitas pendukung penyelenggaraan dan pengembangan kehidupan sosial, budaya dan ekonomi.</li>
              <li><i class="ri-check-double-line"></i> Utilitas <br>Kelengkapan penunjang untuk pelayanan lingkungan hunian.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              <b>Penyelenggaraan PSU Perumahan</b>
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Kewenangan Pemerintah Daerah <br>Menjamin keberlanjutan pemeliharaan, pengelolaan dan pemanfaatan PSU pada Kawasan perumahan.</li>
              <li><i class="ri-check-double-line"></i>Jika PSU Tidak Diserahkan <br>Pemeliharaan PSU bisa membebani warga Pengakuan hak milik oleh individu terhadap PSU perumahan.</li>
            </ul>
            <a href="tentangperumahan.php" class="btn-learn-more">Baca Selengkapnya</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Kontak</h2>
          <h3>Kontak <span>Kita</span></h3>
          <p>Dinas Perumahan Rakyat, Kawasan Permukiman dan Perhubungan</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.961752778037!2d113.8622561147734!3d-7.013781094933631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e42eccca1cc7%3A0x729e217c6b016f4f!2sKantor%20Dinas%20Pekerjaan%20Umum%20Cipta%20Karya%20Dan%20Tata%20Ruang%20Kabupaten%20Sumenep!5e0!3m2!1sen!2sid!4v1672711195928!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi</h4>
                <p>Jl. Kamboja No.27B, Gudang, Kolor, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69417</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="info">
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email</h4>
                <p>dinasperumahanrkpck.com</p>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="info">
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telepon</h4>
                <p>(0328) 66241</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="info">
              <div class="instagram">
                <i class="bi bi-instagram"></i>
                <h4>Instagram</h4>
                <p>@disperkimhub.sumenep</p>
              </div>
            </div>
          </div>
        </div>

          </div>
         

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>