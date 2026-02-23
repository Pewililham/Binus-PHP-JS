<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pasien | Klinik Sehat</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f5f7fb;
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

    <div class="card shadow-lg rounded-4">
        
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🏥 Data Pasien Klinik Sehat</h4>
            <a href="tambah.php" class="btn btn-light btn-sm fw-bold">+ Tambah Pasien</a>
        </div>

        <div class="card-body">

            <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $sql = "SELECT * FROM pasien ORDER BY id DESC";
                $query = mysqli_query($conn, $sql);

                if(mysqli_num_rows($query) > 0){

                    while($pasien = mysqli_fetch_assoc($query)){
                        echo "<tr>";

                        echo "<td>".$pasien['id']."</td>";
                        echo "<td>".htmlspecialchars($pasien['nama'])."</td>";
                        echo "<td>".htmlspecialchars($pasien['umur'])."</td>";
                        echo "<td>".htmlspecialchars($pasien['alamat'])."</td>";
                        echo "<td>".htmlspecialchars($pasien['telepon'])."</td>";

                        echo "<td>
                                <a href='edit.php?id=".$pasien['id']."' 
                                   class='btn btn-warning btn-sm'>Edit</a>

                                <a href='hapus.php?id=".$pasien['id']."' 
                                   onclick=\"return confirm('Yakin hapus pasien ini?')\"
                                   class='btn btn-danger btn-sm'>
                                   Hapus
                                </a>
                              </td>";

                        echo "</tr>";
                    }

                }else{
                    echo "<tr>
                            <td colspan='6' class='text-muted'>
                            Belum ada data pasien
                            </td>
                          </tr>";
                }
                ?>

                </tbody>
            </table>
            </div>

            <div class="text-end fw-bold">
                Total Pasien: <?php echo mysqli_num_rows($query); ?>
            </div>

        </div>
    </div>

</div>

</body>
</html>