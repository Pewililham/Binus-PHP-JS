<?php
include "config.php";

if(!isset($_GET['id'])){
    echo "ID tidak ditemukan";
    exit;
}

$id = $_GET['id'];

$stmt = mysqli_prepare($conn,
    "SELECT * FROM pasien WHERE id=?"
);
mysqli_stmt_bind_param($stmt,"i",$id);
mysqli_stmt_execute($stmt);
$data = mysqli_stmt_get_result($stmt);
$d = mysqli_fetch_assoc($data);

if(!$d){
    echo "Data tidak ditemukan";
    exit;
}

$pesan="";
if(isset($_POST['update'])){

    $nama    = $_POST['nama'];
    $umur    = $_POST['umur'];
    $alamat  = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    if($nama=="" || $umur=="" || $telepon==""){
        $pesan="Data wajib diisi!";
    }else{

        $stmt2 = mysqli_prepare($conn,
        "UPDATE pasien SET nama=?, umur=?, alamat=?, telepon=? WHERE id=?");

        mysqli_stmt_bind_param($stmt2,"sissi",
            $nama,$umur,$alamat,$telepon,$id);

        if(mysqli_stmt_execute($stmt2)){
            header("Location:index.php");
            exit;
        }else{
            $pesan="Gagal update!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pasien | Klinik Sehat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f7fb;
}
.card-header{
    background:linear-gradient(90deg,#ffc107,#ffda6a);
    font-weight:bold;
}
</style>
</head>

<body>

<div class="container mt-5">

<div class="card shadow-lg rounded-4 col-md-6 mx-auto">

<div class="card-header text-center">
✏ Edit Data Pasien
</div>

<div class="card-body">

<?php if($pesan!=""){ ?>
<div class="alert alert-danger">
<?= $pesan ?>
</div>
<?php } ?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Nama Pasien</label>
<input type="text" name="nama"
class="form-control"
value="<?= htmlspecialchars($d['nama']) ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Umur</label>
<input type="number" name="umur"
class="form-control"
value="<?= htmlspecialchars($d['umur']) ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Alamat</label>
<textarea name="alamat"
class="form-control"
rows="3"><?= htmlspecialchars($d['alamat']) ?></textarea>
</div>

<div class="mb-3">
<label class="form-label">Telepon</label>
<input type="text" name="telepon"
class="form-control"
value="<?= htmlspecialchars($d['telepon']) ?>" required>
</div>

<div class="d-grid gap-2">
<button type="submit" name="update"
class="btn btn-warning fw-bold">
💾 Update Data
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