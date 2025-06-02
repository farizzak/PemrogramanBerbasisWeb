<?php

    // Koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "web_informatika");
    
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }else{
        echo "Koneksi berhasil";
    }


    // Query untuk mengambil data mahasiswa
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $query);

    // ambil data mahasiswa bisa dengan (fetch)
    // mysqli_fetch_row    
    // mysqli_fetch_assoc
    // mysqli_fetch_array
    // mysqli_fetch_object
    
    $mahasiswa = mysqli_fetch_row($result); 
    
    var_dump($mahasiswa[1]);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Data Mahasiswa</title>
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"/>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <h1>Data Mahasiswa</h1>
        <table id="mahasiswa" class="display">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#mahasiswa').DataTable();
            });
        </script>
    </body>
