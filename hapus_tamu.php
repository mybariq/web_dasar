<?php
// Sertakan file koneksi database
require("koneksi.php");

// Proses penghapusan data jika parameter hapus_id ada di URL
if(isset($_POST['hapus_tamu'])){
    // Ambil id yang akan dihapus dari form
    $hapus_ids = $_POST['hapus_id'];

    // Loop melalui setiap id dan hapus data yang sesuai
    foreach($hapus_ids as $hapus_id){
        // Persiapkan kueri penghapusan
        $sql_hapus = "DELETE FROM bukutamu WHERE id = ?";
        // Siapkan statement untuk kueri
        $stmt = $conn->prepare($sql_hapus);
        // Bind parameter id ke statement
        $stmt->bind_param("i", $hapus_id);
        // Eksekusi statement
        $stmt->execute();
        // Tutup statement
        $stmt->close();
    }
    // Tampilkan pesan sukses
    echo '<div class="alert alert-success">Data berhasil dihapus.</div>';
    // Redirect ke halaman ini setelah menghapus data
    header("Refresh: 1");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Tamu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Hapus Data Tamu</h2>
        <form action="" method="post">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pilih</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Usia</th>
                        <th scope="col">Nomor HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ambil data tamu dari database
                    $sql = "SELECT id, nama, alamat, usia, no_hp FROM bukutamu";
                    $result = mysqli_query($conn, $sql);
                    // Tampilkan data tamu dalam bentuk tabel
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><input type="checkbox" name="hapus_id[]" value="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['usia']; ?></td>
                        <td><?php echo $row['no_hp']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-danger" name="hapus_tamu" onclick="return confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')">Hapus Tamu</button>
                <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap yang interaktif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
