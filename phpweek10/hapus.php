<?php
include "config.php";

if(!isset($_GET['id'])){
    echo "ID tidak ditemukan";
    exit;
}

$id = $_GET['id'];

// jika klik tombol hapus
if(isset($_POST['hapus'])){

    $query = mysqli_query($conn,
        "DELETE FROM pasien WHERE id='$id'"
    );

    if($query){
        header("Location:index.php");
    }else{
        echo "Gagal menghapus data";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hapus Pasien</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f7fb;
}
.card-header{
    background:linear-gradient(90deg,#dc3545,#ff6b6b);
    color:white;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="card shadow-lg col-md-5 mx-auto rounded-4">

<div class="card-header text-center">
⚠ Konfirmasi Hapus Pasien
</div>

<div class="card-body text-center">

<h5>Yakin ingin menghapus pasien ini?</h5>
<p class="text-muted">Data tidak bisa dikembalikan</p>

<form method="POST">

<button name="hapus" class="btn btn-danger fw-bold">
🗑 Ya, Hapus
</button>

<a href="index.php" class="btn btn-secondary">
Batal
</a>

</form>

</div>
</div>
</div>

</body>
</html>