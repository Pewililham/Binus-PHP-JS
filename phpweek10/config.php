<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "daftar_pasien";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi database gagal");
}

?>