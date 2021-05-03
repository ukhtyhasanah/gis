<?php

$server = "localhost";
$username = "root";
$pass = "";
$db = "wisata_batu";

$con = mysqli_connect($server, $username, $pass, $db);

if ($con->connect_errno) {
    echo "koneksi error";
    exit();
}


