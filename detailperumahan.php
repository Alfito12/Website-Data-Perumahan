<?php
  include "koneksi.php";  
  if(isset($_GET['id_perum'])){
    $id_perum = $_GET['id_perum'];
    $select = mysqli_query($koneksi, "SELECT * FROM detail WHERE id_perum='$id_perum'") or die(mysqli_error($koneksi));
    if(mysqli_num_rows($select) == 0){
        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
        exit();
    }else{
        $data = mysqli_fetch_array($select);
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php
    $id_perum = $_GET['id_perum'];
    $select2 = mysqli_query($koneksi, "SELECT * FROM perumahan WHERE id_perum='$id_perum'") or die(mysqli_error($koneksi));
    $data2 = mysqli_fetch_array($select2);
  ?>
  <title>Data Perumahan - <?php echo $data2['nama_perum']?></title>
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
  <!-- Leaflet css File -->
  <link rel="stylesheet" href="leaflet/leaflet.css">
  <script src="leaflet/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  
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
          <li><a class="nav-link scrollto " href="dataperumahan.php">Kembali</a></li>
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
          <li><a href="dataperumahan.php">Data Perumahan</a></li>
          <li><?php echo $data2['nama_perum']?></li>
        </ol>
        <h2><?php echo $data2['nama_perum']?></h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-5">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <?php
                  $id_perum = $_GET['id_perum'];
                  $select = mysqli_query($koneksi, "SELECT * FROM gambar WHERE id_perum='$id_perum'") or die(mysqli_error($koneksi));
                  while($tampil = mysqli_fetch_array($select)){ 
                ?>
                <div class="swiper-slide">
                  <img src="assets/img/perum/<?php echo"$tampil[gambar]"?>" alt="">
                </div>
                <?php
                }?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="portfolio-info">
              <h3>Detail PSU</h3>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis PSU</th>
                    <th scope="col">Luas</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tahun</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                $id_perum = $_GET['id_perum'];
                $select = mysqli_query($koneksi, "SELECT * FROM detail WHERE id_perum='$id_perum'") or die(mysqli_error($koneksi));
                while($tampil = mysqli_fetch_array($select)){
                  echo ' 
                  <tr>
                    <td>'.$no.'</td>
                    <td>'.$tampil['jenis_psu'].'</td>
                    <td>'.$tampil['luas'].'</td>
                    <td>'.$tampil['keterangan'].'</td>
                    <td>'.$tampil['tahun'].'</td>
                  <tr>';
                  $no++;
                  }   
                  ?>
                  </tbody>
              </table>
            </div>
            </div>
            <div class="portfolio-info">
              <h3>Data Perusahaan</h3>
              <div class="table-responsive">
                <table class="table table-bordered align-items-center table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Nama Perumahan</th>
                    <?php
                    $id_perum = $_GET['id_perum'];
                    $select = mysqli_query($koneksi, "SELECT * FROM perumahan WHERE id_perum='$id_perum'") or die(mysqli_error($koneksi));
                    while($tampil = mysqli_fetch_array($select)){ 
                    ?>
                    <td><?php echo"$tampil[nama_perum]"?></td>
                  </tr>
                  <tr>
                    <th scope="col">Alamat Perumahan</th>
                    <td scope="col"><?php echo"$tampil[alamat_perum]"?></td>
                  </tr>
                  <tr>
                    <th scope="col">Nama Perusahaan</th>
                    <td scope="col"><?php echo"$tampil[nama_pengembang]"?></td>
                  </tr>
                  <tr>
                    <th scope="col">Alamat Perusahaan</th>
                    <td scope="col"><?php echo"$tampil[alamat_pengembang]"?></td>
                  </tr>
                  <tr>
                    <th scope="col">Luas Lahan</th>
                    <td scope="col"><?php echo"$tampil[luas_lahan]"?> m<sup>2</sup></td>
                  </tr>
                  <tr>
                    <th scope="col">Status Perizinan</th>
                    <td scope="col"><?php echo"$tampil[status]"?></td>
                  </tr>
                  <tr>
                    <th scope="col">Jumlah Unit</th>
                    <td scope="col"><?php echo"$tampil[jumlah_unit]"?></td>
                  </tr>
                    <?php
                    }?>
                </thead>
              </table>
            </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="section-title">
          <h3>Peta <span>Perumahan</span></h3>
        </div>
        <div class="footer-links">
          <div class="row gy-4">
            <div class="col-lg-12">
              <div id="map" style="width: 100%; height: 400px;"></div>
                  <script>
                    <?php
                    include "koneksi.php";
                    $id_perum = $_GET['id_perum'];
                    $data= mysqli_query($koneksi, "SELECT * FROM `daerah` where id_perum='$id_perum'");
                    ?>
                    var map = L.map('map').setView([<?php while($tampil = mysqli_fetch_array($data)){ echo ''.$tampil['latlang'].'';}?>], 17);
                    L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                      maxZoom: 19,
                      subdomains:['mt0','mt1','mt2','mt3']
                    
                    }).addTo(map);

                    var geojsonFeature = <?php
                    include "koneksi.php";
                    $id_perum = $_GET['id_perum'];
                    $data= mysqli_query($koneksi, "SELECT * FROM `daerah` where id_perum='$id_perum'");
                    
                    while($tampil = mysqli_fetch_array($data)){
                      echo '
                      '.$tampil['geojson'].';
                      ';
                    }
                    ?>
                    <?php
                    include "koneksi.php";
                    $id_perum = $_GET['id_perum'];
                    $data= mysqli_query($koneksi, "SELECT * FROM `perumahan` where id_perum='$id_perum'");
                    while($tampil = mysqli_fetch_assoc($data)){
                    
                    ?>
                    L.geoJSON(geojsonFeature).addTo(map).bindPopup("<b><?php echo"$tampil[nama_perum]"?></b><br><?php echo"$tampil[alamat_perum]"?><br>Luas Lahan : <?php echo"$tampil[luas_lahan]"?> m<sup>2</sup><br>Status : <?php echo"$tampil[status]"?><br>Jumlah Unit : <?php echo"$tampil[jumlah_unit]"?>");
                    <?php
                    }
                    ?>
                    
                  </script>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </footer>
<!--
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Tempo</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
        <!--  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
    </footer>
          
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>