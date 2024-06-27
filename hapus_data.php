<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Memasukkan file koneksi
    include 'koneksi.php';

    // Menyiapkan dan menjalankan query SQL untuk menghapus data
    $sql = "DELETE FROM jual_barang WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Mengarahkan pengguna kembali ke index.php setelah berhasil menghapus data
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
} else {
    echo "ID tidak ditemukan!";
}
?>
