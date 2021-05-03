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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
          <li><a class="nav-link scrollto  active" href="places.php">Places</a></li>
          <li><a class="nav-link scrollto " href="maps.php">Maps</a></li>
          <li><a class="nav-link scrollto" href="aboutus.html">About Us</a></li>
        </ul>
        <button type="button" class="btn  btn-primary ms-3" style="border-radius: 50px;"> Login</button>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">

    <!-- ======= Team Section ======= -->
    <section id="peta" class="">
      <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Places</h2>
        </div>

        <div class="row">
    <div class="col-8">
      <a href=" {{asset('tambah')}}"  class="btn btn-danger" ><i class="fas fa-plus"></i></i> Tambah</a>
    </div>
    <div class="col-4">
      <form class="d-flex justify-content-end pt-2 pb-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary me-2" type="submit"><i class="fas fa-search"></i></button>
        <button class="btn btn-success me-2" type="submit"><i class="fas fa-sync-alt"></i></button>
        
      </form>
    </div>
  </div>  

  <!-- search -->
  
  <!-- table -->
  <?php require("koneksi.php"); ?>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Longitude</th>
        <th scope="col">Latitude</th>
        <th scope="col " colspan="3">Aksi</th>
      </tr>
    </thead>
    <tbody>   
    <?php
            $query1 = "SELECT * FROM tempat_wisata";
            $sql1 = mysqli_query($con, $query1);

            while ($row = mysqli_fetch_array($sql1)) {
             echo "<tr><th>".$row['id']."</th>
             <td>".$row['nama']."</td>
             <td>".$row['alamat']."</td>
             <td>".$row['longitude']."</td>
             <td>".$row['latitude']."</td>
             <td> <a href='http://localhost/UAS-GIS/proses_delete.php?id_del=". $row['id']."'
             class = 'btn btn-danger'>Delete</a></td>";

         }
         ?>
      
    </tbody>
  </table>


      </div>
    </section><!-- End Team Section -->

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