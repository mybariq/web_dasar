<?php
include 'koneksi.php';

// Memeriksa apakah data dikirimkan dari form tambah_data.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama_barang"];
    $satuan = $_POST["satuan"];
    $harga_beli = $_POST["harga_beli"];
    $harga_jual = $_POST["harga_jual"];
    $stock = $_POST["stock"];

    // Menyiapkan query SQL untuk menyimpan data ke dalam tabel barang
    $sql = "INSERT INTO barang (id_barang, nama_barang, satuan, harga_beli, harga_jual, stock)
            VALUES ('$id_barang', '$nama_barang', '$satuan', $harga_beli, $harga_jual, $stock)";

    // Menjalankan query
    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil ditambahkan, arahkan ke halaman index.php
        header("Location: index.php");
        exit(); // Pastikan kode setelah header() tidak dijalankan
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Barang</h3>
        </div>
        <div class="card-body">
            <form method="post" action="tambah_data.php">
                <div class="form-group">
                    <label for="id_barang">ID Barang:</label>
                    <input type="text" class="form-control form-control-lg" id="id_barang" name="id_barang" required>
                </div>

                <div class="form-group">
                    <label for="nama_barang">Nama Barang:</label>
                    <input type="text" class="form-control form-control-lg" id="nama_barang" name="nama_barang" required>
                </div>

                <div class="form-group">
                    <label for="satuan">Satuan:</label>
                    <input type="text" class="form-control form-control-lg" id="satuan" name="satuan" required>
                </div>

                <div class="form-group">
                    <label for="harga_beli">Harga Beli:</label>
                    <input type="number" class="form-control form-control-lg" id="harga_beli" name="harga_beli" required>
                </div>

                <div class="form-group">
                    <label for="harga_jual">Harga Jual:</label>
                    <input type="number" class="form-control form-control-lg" id="harga_jual" name="harga_jual" required>
                </div>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control form-control-lg" id="stock" name="stock" required>
                </div>

                <button type="submit" class="btn btn-outline-primary">Tambah</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
