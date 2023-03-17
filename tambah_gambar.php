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
  <!-- Leaflet css File -->
  <link rel="stylesheet" href="leaflet/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
  <script src="leaflet/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
   <!-- Leaflet draw css File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" integrity="sha512-gc3xjCmIy673V6MyOAZhIW93xhM9ei1I+gLbmFjUHIjocENRsLX/QUE1htk5q1XV2D/iie/VQ8DXI6Vu8bexvQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js" integrity="sha512-ozq8xQKq6urvuU6jNgkfqAmT7jKN2XumbrX1JiB3TnF7tI48DPI4Gy1GXKD/V3EExgAs1V+pRO7vwtS1LHg0Gw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
          <li>Tambah Gambar</li>
        </ol>
        <h2>Tambah Gambar</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="data-perumahan" class="portfolio-details">
      <div class="container mt-7">
        <div class="row gy-4">
          <div class="col-lg-8">
          </div>
        <div class="col-lg-4">
        
		<?php
		if(isset($_GET['alert'])){
			if($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ukuran File Terlalu Besar
				</div>
				<?php
			}elseif ($_GET['alert']=="gagal_ektensi") {
				?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> Ekstensi Gambar Tidak Diperbolehkan
				</div>
				<?php
			}elseif ($_GET['alert']=="simpan") {
				?>
				<div class="alert alert-success">
					<strong>Success!</strong> Gambar Berhasil Disimpan
				</div>
				<?php
			}				
		}
		?>    
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group mt-3">
              <label for="">Nama Perumahan</label>
              <select name="id_perum" class="form-control">
                <option value="">Others</option>
                <?php
                include "koneksi.php";
                $user = mysqli_query($koneksi, "SELECT * FROM perumahan ORDER BY id_perum ASC") or die(mysqli_error($koneksi));
                while ($data = mysqli_fetch_assoc($user)) {
                  echo '<option value="'.$data['id_perum'].'">'.$data['nama_perum'].'</option>';
                } 
                  ?>
              </select>
            </div>
            <div class="form-group mt-3">
                <input type="file" name="foto[]" class="form-control" required="required"  multiple>
            </div>
            <div class="form-group mt-3">
                <input class="btn btn-dark mr-sm-2" name="submit" type="submit" value="Submit">
            </div>
          </div>
        </form>
        </div>
      </div>
      
    </section>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
      $id_perum = $_POST['id_perum'];
      $pathgambar = 'assets/img/perum/';
      $count = count($_FILES['foto']['name']);
      for ($i=0; $i < $count; $i++) {
        $img = $_FILES['foto']['name'][$i];
        $tmp = $_FILES['foto']['tmp_name'][$i];
        move_uploaded_file($tmp,$pathgambar.$img);
        $sql = mysqli_query($koneksi, "INSERT INTO gambar(id_gambar, gambar, id_perum) VALUES('','$img', $id_perum)");
      }
      if ($sql) {
        echo '<script>alert("Berhasil menambahkan data gambar."); document.location="tambah_gambar.php";</script>';
      }
    }
    ?>