<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $id = $_POST['id'];
    $nama_part = $_POST['nama_part'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;

    // Memasukkan file koneksi
    include 'koneksi.php';

    // Menyiapkan dan menjalankan query SQL untuk mengubah data
    $sql = "UPDATE jual_barang SET nama_part='$nama_part', harga=$harga, jumlah=$jumlah, total=$total WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Mengarahkan pengguna kembali ke index.php setelah berhasil mengubah data
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Memasukkan file koneksi
        include 'koneksi.php';

        // Mengambil data dari tabel berdasarkan id
        $sql = "SELECT * FROM jual_barang WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Data tidak ditemukan!";
            exit();
        }

        $conn->close();
    } else {
        echo "ID tidak ditemukan!";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Jual Barang</title>
    <!-- Memasukkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Ubah Data Jual Barang</h2>
        <form action="ubah_data.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <div class="form-group">
                <label for="nama_part">Nama Part:</label>
                <input type="text" class="form-control" id="nama_part" name="nama_part" value="<?php echo $row['nama_part']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" class="form-control" id="total" name="total" value="<?php echo $row['harga'] * $row['jumlah']; ?>" readonly>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Ubah Data</button>
        </form>
    </div>

    <!-- Memasukkan Bootstrap JS (opsional, tergantung kebutuhan halaman Anda) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#harga, #jumlah").keyup(function() {
          var harga = $("#harga").val();
          var jumlah = $("#jumlah").val();
          var total = parseFloat(harga) * parseFloat(jumlah);
          $("#total").val(total);
        });
      });
    </script>
</body>
</html>
