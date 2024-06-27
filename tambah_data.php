<?php
// Memasukkan file koneksi
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama_part = $_POST['nama_part'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;

    // Menyiapkan dan menjalankan query SQL untuk menambahkan data
    $sql = "INSERT INTO jual_barang (nama_part, harga, jumlah, total) VALUES ('$nama_part', $harga, $jumlah, $total)";

    if ($conn->query($sql) === TRUE) {
        // Mengarahkan pengguna kembali ke index.php setelah berhasil menambah data
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Jual Barang</title>
    
    <!-- Memasukkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Jual Barang</h2>
        <form id="form-tambah-data" action="tambah_data.php" method="post">
            <div class="form-group">
                <label for="nama_part">Nama Part:</label>
                <input type="text" class="form-control" id="nama_part" name="nama_part" required>
            </div>
            
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
            </div>
            
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>
            
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" class="form-control" id="total" name="total" readonly>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>

    <!-- Memasukkan Bootstrap JS (opsional, tergantung kebutuhan halaman Anda) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script tambahan untuk manipulasi -->
    <script>
        $(document).ready(function() {
            $('#harga, #jumlah').on('input', function() {
                var harga = parseFloat($('#harga').val()) || 0;
                var jumlah = parseFloat($('#jumlah').val()) || 0;
                var total = harga * jumlah;
                $('#total').val(total);
            });

            $('#form-tambah-data').submit(function(event) {
                var namaPart = $('#nama_part').val();
                var harga = $('#harga').val();
                var jumlah = $('#jumlah').val();

                // Contoh validasi sederhana
                if (namaPart.trim() === '') {
                    alert('Nama Part tidak boleh kosong');
                    event.preventDefault(); // Menghentikan pengiriman form jika validasi tidak lolos
                }

                // Anda bisa tambahkan validasi lainnya sesuai kebutuhan
            });
        });
    </script>
</body>
</html>
