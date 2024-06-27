<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_sparepart = $_POST["kode_sparepart"];
    $nama_sparepart = $_POST["nama_sparepart"];
    $jenis_part = $_POST["jenis_part"];
    $harga = $_POST["harga"];
    $stock = $_POST["stock"];
    $tanggal_masuk = $_POST["tanggal_masuk"];

    $sql = "INSERT INTO spare_part (kode_sparepart, nama_sparepart, jenis_part, harga, stock, tanggal_masuk) 
            VALUES ('$kode_sparepart', '$nama_sparepart', '$jenis_part', '$harga', '$stock', '$tanggal_masuk')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after successful insertion
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Spare Part</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Spare Part</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="kode_sparepart">Kode Sparepart:</label>
                <input type="text" class="form-control" id="kode_sparepart" name="kode_sparepart" required>
            </div>
            <div class="form-group">
                <label for="nama_sparepart">Nama Sparepart:</label>
                <input type="text" class="form-control" id="nama_sparepart" name="nama_sparepart" required>
            </div>
            <div class="form-group">
                <label for="jenis_part">Jenis Part:</label>
                <input type="text" class="form-control" id="jenis_part" name="jenis_part" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
