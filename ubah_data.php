<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_sparepart = $_POST["kode_sparepart"];
    $nama_sparepart = $_POST["nama_sparepart"];
    $jenis_part = $_POST["jenis_part"];
    $harga = $_POST["harga"];
    $stock = $_POST["stock"];
    $tanggal_masuk = $_POST["tanggal_masuk"];

    $sql = "UPDATE spare_part 
            SET nama_sparepart='$nama_sparepart', jenis_part='$jenis_part', harga='$harga', stock='$stock', tanggal_masuk='$tanggal_masuk' 
            WHERE kode_sparepart='$kode_sparepart'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after successful update
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    if (isset($_GET['kode_sparepart'])) {
        $kode_sparepart = $_GET['kode_sparepart'];
        $result = $conn->query("SELECT * FROM spare_part WHERE kode_sparepart='$kode_sparepart'");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No record found with kode_sparepart: $kode_sparepart";
            exit;
        }
    } else {
        echo "No kode_sparepart provided.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Spare Part</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Ubah Data Spare Part</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="kode_sparepart">Kode Sparepart:</label>
                <input type="text" class="form-control" id="kode_sparepart" name="kode_sparepart" value="<?php echo $row['kode_sparepart']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_sparepart">Nama Sparepart:</label>
                <input type="text" class="form-control" id="nama_sparepart" name="nama_sparepart" value="<?php echo $row['nama_sparepart']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_part">Jenis Part:</label>
                <input type="text" class="form-control" id="jenis_part" name="jenis_part" value="<?php echo $row['jenis_part']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $row['stock']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo $row['tanggal_masuk']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
