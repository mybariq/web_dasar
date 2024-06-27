<?php
require 'koneksi.php';

if (isset($_GET['kode_sparepart'])) {
    $kode_sparepart = $_GET['kode_sparepart'];

    // Prepare the delete statement
    $sql = "DELETE FROM spare_part WHERE kode_sparepart='$kode_sparepart'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to index.php after successful deletion
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "No kode_sparepart provided.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Spare Part</title>
</head>
<body>
    <h2>Hapus Data Spare Part</h2>
    <p><a href="index.php">Kembali ke Daftar Spare Part</a></p>
</body>
</html>
