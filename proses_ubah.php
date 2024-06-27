<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh form_ubah.php melalui URL
$nis = $_GET['nis'];

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

// Proses ubah data ke Database
$query = "UPDATE datasiswa SET nama='".$nama."', jenis_kelamin='".$jenis_kelamin."', telepon='".$telepon."', alamat='".$alamat."' WHERE nis='".$nis."'";
$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Ubah Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <?php if($sql): ?>
            <div class="alert alert-success" role="alert">
                Data berhasil diubah! <a href="index.php" class="alert-link">Kembali ke daftar siswa.</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database. <a href="form_ubah.php?nis=<?php echo $nis; ?>" class="alert-link">Kembali ke form.</a>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
