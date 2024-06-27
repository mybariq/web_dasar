<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $sql = "INSERT INTO karyawan (id_karyawan, nama_karyawan, alamat, no_hp, tanggal_lahir)
            VALUES ('$id_karyawan', '$nama_karyawan', '$alamat', '$no_hp', '$tanggal_lahir')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simpan Data Karyawan</title>
</head>
<body>
    <h2>Form Simpan Data Karyawan</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        ID Karyawan: <input type="text" name="id_karyawan" required><br><br>
        Nama Karyawan: <input type="text" name="nama_karyawan" required><br><br>
        Alamat: <input type="text" name="alamat" required><br><br>
        No HP: <input type="text" name="no_hp" required><br><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
