<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data NIS yang dikirim oleh index.php melalui URL
$nis = $_GET['nis'];

// Query untuk menghapus data siswa berdasarkan NIS yang dikirim
$query2 = "DELETE FROM datasiswa WHERE nis='".$nis."'";
$sql2 = mysqli_query($connect, $query2); // Eksekusi/Jalankan query dari variabel $query2
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Hapus Data</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <?php if($sql2): ?>
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus! <a href="index.php" class="alert-link">Kembali ke daftar siswa.</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                Maaf, terjadi kesalahan saat mencoba untuk menghapus data dari database. <a href="index.php" class="alert-link">Kembali</a>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
