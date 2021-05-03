<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kota Wisata Batu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- style -->
  <style>
     #map {
            width: 100%;
            height: 450px;
        }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Batu</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="places.php">Places</a></li>
          <li><a class="nav-link scrollto  active" href="maps.php">Maps</a></li>
          <li><a class="nav-link scrollto" href="aboutus.html">About Us</a></li>
        </ul>
        <button type="button" class="btn  btn-primary ms-3" style="border-radius: 50px;"> Login</button>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= Team Section ======= -->
    <section id="peta" class="peta">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Maps</h2>
          <p>Peta Kota Wista Batu</p>
        </div>
        <?php require("koneksi.php"); ?>
    
        <div id="map">
        <?php
        $sql = "SELECT * FROM tempat_wisata";
        $result = $con->query($sql);
        
        ?>
        <script>
          mapboxgl.accessToken = 'pk.eyJ1IjoiY2Frbm9lcjE3IiwiYSI6ImNrbjhnN2Z4bzB4amUycXA5cWNzdjVtcmwifQ.iFXSlCwWibhlc_lRCB5Fzg';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v10',
                center: [112.523900, -7.867100],
                zoom: 9
            });
    
            map.on('load', function() {
                // Add an image to use as a custom marker
                map.loadImage(
                    'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
                    function(error, image) {
                        if (error) throw error;
                        map.addImage('custom-marker', image);
                        // Add a GeoJSON source with 3 points.
                        map.addSource('points', {
                            'type': 'geojson',
                            'data': {
                                'type': 'FeatureCollection',
                                'features': [
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo '{
                                            "type": "Feature",
                                            "properties": {
                                                "title": "'.$row['nama'].'",
                                                "description": "<strong>' . $row['nama'] . '</strong><p>alamat ' . $row['alamat'] . '</p><p>Longitude = ' . $row['longitude'] . '</p><p>latitude = ' . $row['longitude'] . '</p>"
                                            },
                                            "geometry": {
                                                "type": "Point",
                                                "coordinates": [
                                                    ' . $row['longitude'] . ',
                                                   ' . $row['latitude'] . '
                                                ]
                                            }
                                        },';
                                    }
                                    ?>
                                ]
                            }
                        });
    
                        // Add a symbol layer
                        map.addLayer({
                            'id': 'symbols',
                            'type': 'symbol',
                            'source': 'points',
                            'layout': {
                                'icon-image': 'custom-marker',
                                'text-field': ['get', 'title'],
                                'text-font': [
                                    'Open Sans Semibold',
                                    'Arial Unicode MS Bold'
                                ],
                                'text-offset': [0, 1.25],
                                'text-anchor': 'top'
                            }
                        });
                    }
                );
    
    
                // Center the map on the coordinates of any clicked symbol from the 'symbols' layer.
                map.on('click', 'symbols', function(e) {
                    map.flyTo({
                        center: e.features[0].geometry.coordinates
    
                    });
                    var coordinates = e.features[0].geometry.coordinates.slice();
                    var description = e.features[0].properties.description;
    
                    // Ensure that if the map is zoomed out such that multiple
                    // copies of the feature are visible, the popup appears
                    // over the copy being pointed to.
                    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                    }
    
                    new mapboxgl.Popup()
                        .setLngLat(coordinates)
                        .setHTML(description)
                        // .setHTML(title)
                        .addTo(map);
                });
    
                // Change the cursor to a pointer when the it enters a feature in the 'symbols' layer.
                map.on('mouseenter', 'symbols', function() {
                    map.getCanvas().style.cursor = 'pointer';
                });
    
                // Change it back to a pointer when it leaves.
                map.on('mouseleave', 'symbols', function() {
                    map.getCanvas().style.cursor = '';
                });
    
            });
        </script>
        </div>

      </div>
    </section><!-- End Team Section -->
    <br>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2021<strong><span> GIS - UIN Malang</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>