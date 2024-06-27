<?php
// Konfigurasi database
$servername = "localhost"; // atau IP address server database Anda
$username = "root"; // ganti dengan username database Anda
$password = ""; // ganti dengan password database Anda
$dbname = "karyawan"; // nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// SQL untuk membuat tabel
$sql = "CREATE TABLE IF NOT EXISTS karyawan (
    id_karyawan INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    alamat VARCHAR(100),
    nohp VARCHAR(15),
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL
)";

// Mengeksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Tabel karyawan berhasil dibuat";
} else {
    echo "Error membuat tabel: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
