<?php
    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "web_informatika");
    
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }else{
        echo "Koneksi berhasil";
    }

    function tampilData() {
        global $koneksi;
        $query = "SELECT * FROM mahasiswa";
        $result = mysqli_query($koneksi, $query);
        
        if (!$result) {
            die("Query gagal: " . mysqli_error($koneksi));
        }
        
        return $result;
    }

    function tambahdata($data , $files, $koneksi) {

        $nama = $data['nama'];
        $nim = $data['nim'];
        $jurusan = $data['jurusan'];
        $alamat = $data['alamat'];
        
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
        else
        {
            echo "<script>alert('Gagal mengupload foto');</script>";
        }
    }

    function editdata($data, $files, $koneksi) {
        $id = $data['id'];
        $nama = $data['nama'];
        $nim = $data['nim'];
        $jurusan = $data['jurusan'];
        $alamat = $data['alamat'];

        if (!empty($files['foto']['name'])) {
            $file = $_FILES['foto']['name'];
            $namaFile = date('DMY_Hm') . '_' . $file;
            $tmp = $_FILES['foto']['tmp_name'];
            $folder = 'img/' ;
            $path = $folder . $namaFile;

            if(move_uploaded_file($tmp, $path)) {
                $query = "UPDATE mahasiswa SET foto='$namaFile', nama='$nama', nim='$nim', jurusan='$jurusan', alamat='$alamat' WHERE id=$id";
            } else {
                echo "<script>alert('Gagal mengupload foto');</script>";
                return false;
            }
        } else {
            $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', alamat='$alamat' WHERE id=$id";
        }

        mysqli_query($koneksi, $query);
        
        return mysqli_affected_rows($koneksi);
    }

    function hapusdata($id) {
        global $koneksi;
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($koneksi, $query);
        
        return mysqli_affected_rows($koneksi);
    }

?>