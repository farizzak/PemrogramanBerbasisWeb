<?php

    require 'function.php';

    $koneksi = mysqli_connect("localhost", "root", "", "web_informatika");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {

        if (tambahdata($_POST, $_FILES, $koneksi) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'datamahasiswa.php';
            </script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan');</script>";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Tambah Data Mahasiswa</h2>
    <div class="card p-4 shadow-sm">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .jpeg, .png, .gif">
            </div>

            <div class="d-flex justify-content-between">
                <a href="datamahasiswa.php" class="btn btn-secondary">Back</a>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>