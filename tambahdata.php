<?php

    $koneksi = mysqli_connect("localhost", "root", "", "web_informatika");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $alamat = $_POST['alamat'];
        
        $file = $_FILES['foto']['name'];
        $namaFile = date('DMY_Hm') . '_' . $file;
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = 'img/' ;
        $path = $folder . $namaFile;

        if(move_uploaded_file($tmp, $path))
        {
            $query = "INSERT INTO mahasiswa (foto, nama, nim, jurusan, alamat) VALUES ('$namaFile', '$nama', '$nim', '$jurusan', '$alamat')";

            if(mysqli_query($koneksi, $query)) {
                if(mysqli_affected_rows($koneksi) > 0) {
                    echo "<script>
                        alert('Data berhasil ditambahkan');
                        document.location.href = 'datamahasiswa.php';
                    </script>";
                } else {
                    echo "<script>alert('Data gagal ditambahkan');</script>";
                }
            } else {
                echo "<script>alert('Query error: " . mysqli_error($koneksi) . "');</script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <br><br>
        
        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required>
        <br><br>
        
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" id="jurusan" required>
        <br><br>
        
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" required></textarea>
        <br><br>
        
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png, .gif">
        <br><br>
        
        <a href="datamahasiswa.php">
            <button type="button">Back</button>
        </a>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>