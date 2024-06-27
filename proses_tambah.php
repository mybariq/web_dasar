<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Buku Tamu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert {
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .alert-heading {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .alert-link {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["kirim"])){
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $usia = $_POST["usia"];
            $no_hp = $_POST["no_hp"];

            // Mengecek apakah semua field terisi
            if(!empty($nama) && !empty($alamat) && !empty($usia) && !empty($no_hp)) {
                // Melakukan koneksi ke database
                require("koneksi.php");
                
                // Melakukan query untuk menyimpan data ke database
                $sql = "INSERT INTO bukutamu (nama, alamat, usia, no_hp) VALUES ('$nama', '$alamat', '$usia', '$no_hp')";
                mysqli_query($conn, $sql);
                
                // Mengecek apakah data berhasil disimpan
                $num = mysqli_affected_rows($conn);
                if ($num > 0){
        ?>
        <div class="alert alert-success" role="alert">
            <h2 class="alert-heading">Terima Kasih</h2>
            <p><strong><?php echo $nama; ?></strong>, data Anda telah tersimpan.</p>
            <p><a href="tampil_data.php" class="alert-link">Lihat Daftar Buku Tamu</a></p>
        </div>
        <?php
                } else {
        ?>
        <div class="alert alert-danger" role="alert">
            <h2 class="alert-heading">Error</h2>
            <p>Proses pencatatan buku tamu gagal. Silahkan ulangi!</p>
            <p><a href="tambah_data.php" class="alert-link">Kembali ke Form Pencatatan Buku Tamu</a></p>
        </div>
        <?php
                }
            } else {
                // Jika ada field yang kosong
        ?>
        <div class="alert alert-danger" role="alert">
            <h2 class="alert-heading">Error</h2>
            <p>Mohon isi semua field yang diperlukan!</p>
            <p><a href="tambah_data.php" class="alert-link">Kembali ke Form Pencatatan Buku Tamu</a></p>
        </div>
        <?php
            }
        }
        ?>
    </div>
    <!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap yang interaktif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
