<?php

    require 'function.php';
    // Query untuk mengambil data mahasiswa
    $query = "SELECT * FROM mahasiswa";
    $rows = tampilData($query);

    // ambil data mahasiswa bisa dengan (fetch)
    // mysqli_fetch_row    
    // mysqli_fetch_assoc
    // mysqli_fetch_array
    // mysqli_fetch_object
    
    // $mahasiswa = mysqli_fetch_row($result); 
    
    // var_dump($mahasiswa[1]);
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
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="tambahdata.php">
        <button type="button">Tambah Data</button>
    </a>
    <br><br>
    <table id="mahasiswa" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td>
                    <img src="img/<?php echo($row['foto']) ?>" alt="Foto" width="80" height="80">
                </td>
                <td><?php echo ($row['nama']); ?></td>
                <td><?php echo ($row['nim']); ?></td>
                <td><?php echo ($row['jurusan']); ?></td>
                <td><?php echo ($row['alamat']); ?></td>
                <td>
                    <a href="editdata.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-primary me-1" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="hapusdata.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#mahasiswa').DataTable();
        });
    </script>
</body>
</html>
