<?php
include 'koneksi.php';
$id_barang = $_GET['id_barang'];
// Memeriksa apakah ID barang dikirimkan melalui parameter GET
if(isset($_GET['id_barang'])) {
    // Mengambil data barang berdasarkan ID
    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $sql = mysqli_query($conn, $query);

    // Memeriksa apakah data ditemukan
    if(mysqli_num_rows($sql) > 0) {
        $data = mysqli_fetch_array($sql);
    } else {
        echo "ID Barang tidak ditemukan!";
        exit();
    }
} else {
    echo "ID Barang tidak ditemukan!!!";
    exit();
}

// Memeriksa apakah data dikirimkan dari form ubah_data.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama_barang"];
    $satuan = $_POST["satuan"];
    $harga_beli = $_POST["harga_beli"];
    $harga_jual = $_POST["harga_jual"];
    $stock = $_POST["stock"];

    // Menyiapkan query SQL untuk mengubah data dalam tabel barang
    $sql = "UPDATE barang 
            SET nama_barang='$nama_barang', satuan='$satuan', harga_beli='$harga_beli', harga_jual='$harga_jual', stock='$stock' 
            WHERE id_barang='$id_barang'";

    // Menjalankan query
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diubah!";
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Barang</title>
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
            <h3>Ubah Data Barang</h3>
        </div>
        <div class="card-body">
            <form method="post" action="ubah_data.php?id_barang=<?php echo $data['id_barang']; ?>">
                <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang:</label>
                    <input type="text" class="form-control form-control-lg" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan:</label>
                    <input type="text" class="form-control form-control-lg" id="satuan" name="satuan" value="<?php echo $data['satuan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga_beli">Harga Beli:</label>
                    <input type="number" class="form-control form-control-lg" id="harga_beli" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga_jual">Harga Jual:</label>
                    <input type="number" class="form-control form-control-lg" id="harga_jual" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control form-control-lg" id="stock" name="stock" value="<?php echo $data['stock']; ?>" required>
                </div>
                <button type="submit" class="btn btn-outline-primary">Ubah Data</button>
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
