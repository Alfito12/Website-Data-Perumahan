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
          <li>Tambah daerah</li>
        </ol>
        <h2>Tambah daerah</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="data-perumahan" class="portfolio-details">
      <div class="container mt-7">
        <div class="row gy-4">
          <div class="col-lg-8">
          <div id="map" style="width: 100%; height: 400px;"></div>
            <script>

              var map = L.map('map').setView([-7.008099, 113.860220], 10);
              var osm=L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
              var osm2=L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                maxZoom: 19,
                subdomains:['mt0','mt1','mt2','mt3']
              }).addTo(map);
              var baseMaps = {
                "Satelite": osm,
                'OpenStreetMap': osm2
              };
              var layerControl = L.control.layers(baseMaps).addTo(map);

              // FeatureGroup is to store editable layers
              var drawnFeatures = new L.FeatureGroup();
              map.addLayer(drawnFeatures);
              var drawControl = new L.Control.Draw({
                  edit: {
                      featureGroup: drawnFeatures,
                      remove: false
                  }
              });
              map.addControl(drawControl);

              // Create GeoJson
              map.on('draw:created', function(event) {
                var type = event.layeType;
                var layer = event.layer;
                console.log(layer.toGeoJSON())

                layer.bindPopup(`<p>${JSON.stringify(layer.toGeoJSON())}<P>`)
                drawnFeatures.addLayer(layer);
                
              });
            </script>
          </div>
        <div class="col-lg-4">
        <form method="POST" action="" enctype="multipart/form-data">
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
              <label for="">GeoJson</label>
              <textarea name="geojson" id="" cols="30" rows="10" class="form-control"></textarea>
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
    if(isset($_POST['submit'])){
        $id_perum	= $_POST['id_perum'];
        $geojson	= $_POST['geojson'];
        
        $sql = mysqli_query($koneksi, "SELECT * FROM daerah WHERE id_daerah='$id_daerah'") or die(mysqli_error($koneksi));

        if(mysqli_num_rows($sql) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO daerah(id_daerah, id_perum, geojson) VALUES('', '$id_perum', '$geojson')") or die(mysqli_error($koneksi));
            if($sql){
                echo '<script>alert("Berhasil menambahkan data map."); document.location="tambah_polygon.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data map.</div>';
            }
        }else{
            echo '<div class="alert alert-warning">Gagal, Map sudah terdaftar.</div>';
        }
    }
    ?>
    <!-- End Services Section -->

          <!--
          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section End Contact Section -->

  </main><!-- End #main -->

  <!--
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Tempo</span></strong>. All Rights Reserved
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
  </footer End Footer 
  -->

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