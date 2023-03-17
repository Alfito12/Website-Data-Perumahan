<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Peta Perumahan - Rumahku Sumenep</title>
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
  <link href="assets/css/gisleaflet.css" rel="stylesheet">
  <!-- Leaflet css File -->
  <link rel="stylesheet" href="leaflet/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
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
          <li>Peta Perumahan</li>
        </ol>
        <h2>Peta Perumahan</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="peta-perumahan" class="portfolio-details">
      <div class="container mt-7">
        <div id="map" style="width: 100%; height: 500px;">
            <script>
            //menampilkan variabel koordinat untuk setting latlang view pertama saat membuka web
            var map = L.map('map').setView([-7.0058688,113.8698804], 11);
            //membuat vaiabel untuk google satelite map
            var osm = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                maxZoom: 19,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);
            //membuat variabel untuk openstreet map
            var osm2 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            });
            //membuat variabel untuk koordinat geojson perumahan
            var geojsonFeature = [<?php
            include "koneksi.php";
            $data= mysqli_query($koneksi, "SELECT geojson FROM `map`");
            while($tampil = mysqli_fetch_array($data)){
                echo substr($tampil[0],45,-1);
                echo ",";
            }
            ?>
            ];
            //membuat variabel untuk koordinat geojson perumahan
            var polygon = [<?php
            include "koneksi.php";
            $data= mysqli_query($koneksi, "SELECT geojson FROM `daerah`");
            while($tampil = mysqli_fetch_array($data)){
                echo substr($tampil[0],45,-1);
                echo ",";
            }
            ?>
            ];
            var mystyleDaerah={
              "color" :"#ff8008",
              "weight" : 3,
              "opacity" : 0.65
            };
            //membuat variabel penambahan geojson perumahan ke map
            var daerah=L.geoJSON(polygon,{style:mystyleDaerah}).addTo(map);
            //membuat variabel penambahan geojson perumahan ke map
            var perumahan=L.geoJSON(geojsonFeature).addTo(map);
            //membuat variabel untuk koordinat geojson polygon batas kabupaten
            var geoJsonPolygon = [<?php
            include "koneksi.php";
            $data= mysqli_query($koneksi, "SELECT geojson FROM `batas`");
            while($tampil = mysqli_fetch_array($data)){
                echo substr($tampil[0],45,-1);
                echo ",";
            }
            ?>
            ];

            //membuat style Kabupaten
            var mystyleKabupaten={
              "color" :"#0000FF",
              "weight" : 5,
              "opacity" : 0.65
            };
            //membuat variabel untuk penambahan geojson polygon batas kabupaten ke map
            var Batas = L.geoJSON(geoJsonPolygon,{style:mystyleKabupaten}).addTo(map).bindPopup('Batas Kabupaten Sumenep');
            //membuat layer basemaps
            var baseMaps = {
                "Satelite": osm,
                'OpenStreetMap': osm2
            };
            //membuat layer overlaymaps
            var overlayMaps = {
                "Batas Kabupaten": Batas,
                "Perumahan": perumahan,
                "Daerah": daerah
            };
            //membuat variabel layercontrol
            var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);

            </script>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

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