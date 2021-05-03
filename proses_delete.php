<?php
    include "koneksi.php";

    $id1 = $_REQUEST['id_del'];
    $query1 = "DELETE FROM tempat_wisata WHERE id = '".$id1."' ";
    $sql2 = mysqli_query($con,$query1);

    header('location: http://localhost/UAS-GIS/crud.php');
?>