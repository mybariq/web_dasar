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

// Mengeksekusi query untuk membuat tabel
if ($conn->query($sql) === TRUE) {
    echo "Tabel karyawan berhasil dibuat<br>";
} else {
    echo "Error membuat tabel: " . $conn->error . "<br>";
}

// Data karyawan yang akan dimasukkan
$data_karyawan = [
    ["nama" => "Ahmad", "alamat" => "Jl. Merdeka No.1", "nohp" => "081234567890", "jenis_kelamin" => "Laki-laki"],
    ["nama" => "Budi", "alamat" => "Jl. Sudirman No.2", "nohp" => "081234567891", "jenis_kelamin" => "Laki-laki"],
    ["nama" => "Citra", "alamat" => "Jl. Thamrin No.3", "nohp" => "081234567892", "jenis_kelamin" => "Perempuan"],
    ["nama" => "Dewi", "alamat" => "Jl. Gatot Subroto No.4", "nohp" => "081234567893", "jenis_kelamin" => "Perempuan"],
    ["nama" => "Eko", "alamat" => "Jl. S Parman No.5", "nohp" => "081234567894", "jenis_kelamin" => "Laki-laki"],
    ["nama" => "Fajar", "alamat" => "Jl. Diponegoro No.6", "nohp" => "081234567895", "jenis_kelamin" => "Laki-laki"],
    ["nama" => "Gina", "alamat" => "Jl. Ahmad Yani No.7", "nohp" => "081234567896", "jenis_kelamin" => "Perempuan"],
    ["nama" => "Hadi", "alamat" => "Jl. Pemuda No.8", "nohp" => "081234567897", "jenis_kelamin" => "Laki-laki"],
    ["nama" => "Indah", "alamat" => "Jl. Gajah Mada No.9", "nohp" => "081234567898", "jenis_kelamin" => "Perempuan"],
    ["nama" => "Joko", "alamat" => "Jl. Panglima Polim No.10", "nohp" => "081234567899", "jenis_kelamin" => "Laki-laki"]
];

// Menggunakan prepared statements untuk keamanan yang lebih baik
$stmt = $conn->prepare("INSERT INTO karyawan (nama, alamat, nohp, jenis_kelamin) VALUES (?, ?, ?, ?)");

foreach ($data_karyawan as $karyawan) {
    $stmt->bind_param("ssss", $karyawan['nama'], $karyawan['alamat'], $karyawan['nohp'], $karyawan['jenis_kelamin']);
    if ($stmt->execute() === TRUE) {
        echo "Data karyawan " . $karyawan['nama'] . " berhasil dimasukkan<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>
