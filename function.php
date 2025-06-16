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

?>