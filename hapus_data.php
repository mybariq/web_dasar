<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan"; // Nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah parameter id_barang dikirim melalui URL
if (isset($_GET["id_barang"])) {
    $id_barang = $_GET["id_barang"];

    // Menyiapkan query SQL untuk menghapus data dari tabel barang
    $sql = "DELETE FROM barang WHERE id_barang='$id_barang'";

    // Menjalankan query
    if ($conn->query($sql) === TRUE) {
        // Mengarahkan pengguna kembali ke halaman index.php setelah menghapus data
        header("Location: index.php?message=deleted");
        exit(); // Pastikan kode setelah header() tidak dijalankan
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        header("Location: index.php?message=error");
        exit(); // Pastikan kode setelah header() tidak dijalankan
    }
}

// Menutup koneksi
$conn->close();
?>
