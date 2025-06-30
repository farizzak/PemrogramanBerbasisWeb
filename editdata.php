<?php

    require 'function.php';

    $koneksi = mysqli_connect("localhost", "root", "", "web_informatika");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Ambil ID dari URL
    $id = $_GET['id'];
    
    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        die("Data tidak ditemukan");
    }

    $mahasiswa = mysqli_fetch_assoc($result);


    if(isset($_POST['submit'])) {

        if (editdata($_POST, $_FILES, $koneksi) > 0) {
            echo "<script>
                alert('Data berhasil diubah');
                document.location.href = 'datamahasiswa.php';
            </script>";
        } else {
            echo "<script>alert('Data gagal diubah');</script>";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Data Mahasiswa</h2>
    <div class="card p-4 shadow-sm">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $mahasiswa['nama']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" value="<?= $mahasiswa['nim']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" class="form-control" value="<?= $mahasiswa['jurusan']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= $mahasiswa['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto (Upload Baru Jika Ingin Ganti)</label>
                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg, .jpeg, .png, .gif">
                <div class="mt-2">
                    <strong>Foto Saat Ini:</strong><br>
                    <img src="img/<?= $mahasiswa['foto']; ?>" width="100" class="img-thumbnail mt-1">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="datamahasiswa.php" class="btn btn-secondary">Back</a>
                <button type="submit" name="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>