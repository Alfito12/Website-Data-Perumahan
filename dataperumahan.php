<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Perumahan - Rumahku Sumenep</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/sumekar.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

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
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">PERUMKU</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Data Perumahan</li>
        </ol>
        <h2>Data Perumahan</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="data-perumahan" class="portfolio-details">
      <div class="container mt-7">
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-dark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Perumahan</th>
              <th scope="col">Nama Pengembang</th>
              <th scope="col">Alamat Perumahan</th>
              <th scope="col">Status</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
          <?php
          include "koneksi.php";

          $cari   = (isset($_GET['cari']))? $_GET['cari'] : "";
          
          if($cari==""){
              $data= mysqli_query($koneksi, "SELECT * FROM `perumahan` ORDER BY id_perum asc");
          }else{
              $data = mysqli_query($koneksi, "SELECT * FROM `perumahan` where nama_perum like '%".$cari."%' ORDER BY id_perum");
          }
          
          $no	= 1;  
          while($tampil = mysqli_fetch_array($data)){
            echo ' 
            <tr>
              <td>'.$no.'</td>
              <div class="media align-items-center">
              <div class="media-body">
              <td>'.$tampil['nama_perum'].'</td>
              <td>'.$tampil['nama_pengembang'].'</td>
              <td>'.$tampil['alamat_perum'].'</td>
              <td>'.$tampil['status'].'   <div class="badge badge-dot mr-4">
              <i class="bg-success"></i></div></td>
              <td class="center">
                <a href="detailperumahan.php?id_perum='.$tampil['id_perum'].'"><i class="bi bi-arrow-down-circle-fill"></i></a>
              </td>
            <tr>';
              $no++;
          }
          ?>
        </tbody>
        </table>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PERUMKU</h3>
            <p>
            Dinas Perumahan Rakyat, <br>
            Kawasan Permukiman dan Perhubungan<br>
            Kabupaten Sumenep <br><br>
            </p>
          </div>
          <div class="col-lg-2 col-md-6 footer-contact">
            <h3>Lokasi :<h3>
            <p>
            Jl. Kamboja No.27B <br>
            Gudang, Kolor, Kec. Kota Sumenep<br>
            Kabupaten Sumenep <br><br>
            </p>
          </div>
          <div class="col-lg-2 col-md-6 footer-contact">
            <h3>Telepon :<h3>
            <p>
            (0328) 66241
            </p>
          </div>
          <div class="col-lg-2 col-md-6 footer-contact">
            <h3>Email :<h3>
            <p>
            dinasperumahanrkpck.com
            </p>
          </div>
          <div class="col-lg-2 col-md-6 footer-contact">
            <h3>Instagram :<h3>
            <p>
            disperkimhub.sumenep
            </p>
          </div>
        </div>
      </div>
    </div>

  </footer><!-- End Footer -->

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