<?php
include "config.php";

if(isset($_POST['simpan'])){

    $nama    = $_POST['nama'];
    $umur    = $_POST['umur'];
    $alamat  = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $query = mysqli_query($conn,
    "INSERT INTO pasien(nama, umur, alamat, telepon)
     VALUES('$nama','$umur','$alamat','$telepon')");

    if($query){
        header("Location:index.php");
    }else{
        echo "Data gagal disimpan";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pasien | Klinik Sehat</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f7fb;
}
.card-header{
    background: linear-gradient(90deg,#0d6efd,#0dcaf0);
    color:white;
    font-weight:bold;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="card shadow-lg rounded-4 col-md-6 mx-auto">

<div class="card-header text-center">
    🏥 Form Tambah Pasien
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Nama Pasien</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Umur</label>
<input type="number" name="umur" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Alamat</label>
<textarea name="alamat" class="form-control" rows="3" required></textarea>
</div>

<div class="mb-3">
<label class="form-label">Telepon</label>
<input type="text" name="telepon" class="form-control" required>
</div>

<div class="d-grid gap-2">
<button type="submit" name="simpan" class="btn btn-success fw-bold">
💾 Simpan Data Pasien
</button>

<a href="index.php" class="btn btn-secondary">
⬅ Kembali
</a>
</div>

</form>

</div>
</div>

</div>

</body>
</html>