<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('Gojo.png');
            background-size: cover; /* Menutupi seluruh area body */
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 20px;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Warna latar belakang card dengan opacity */
            border-radius: 10px; /* Border radius untuk membulatkan sudut card */
        }
        .card-header {
            background-color: #f8f9fa; /* Warna latar belakang header card */
            border-bottom: 1px solid #dee2e6; /* Garis bawah header card */
        }
        .card-body {
            padding: 20px; /* Padding untuk konten dalam card */
        }
        .form-control {
            background-color: rgba(255, 255, 255, 1); /* Warna latar belakang field input dengan opacity penuh */
            color: #333; /* Warna teks di dalam field input */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Ubah Data Karyawan</h3>
        </div>
        <div class="card-body">
            <?php
            include 'koneksi.php';

            // Memeriksa apakah ID karyawan dikirimkan melalui parameter GET
            if (isset($_GET['id_karyawan'])) {
                $id_karyawan = $_GET['id_karyawan'];

                // Mengambil data karyawan berdasarkan ID
                $query = "SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'";
                $sql = mysqli_query($conn, $query);

                // Memeriksa apakah data ditemukan
                if (mysqli_num_rows($sql) > 0) {
                    $data = mysqli_fetch_array($sql);
                } else {
                    echo "ID Karyawan tidak ditemukan!";
                    exit();
                }
            } else {
                echo "ID Karyawan tidak ditemukan!";
                exit();
            }

            // Memeriksa apakah data dikirimkan dari form ubah_data.php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_karyawan = $_POST["id_karyawan"];
                $nama_karyawan = $_POST["nama_karyawan"];
                $alamat = $_POST["alamat"];
                $no_hp = $_POST["no_hp"];
                $tanggal_lahir = $_POST["tanggal_lahir"];

                // Menyiapkan query SQL untuk mengubah data dalam tabel karyawan
                $sql = "UPDATE karyawan 
                        SET nama_karyawan='$nama_karyawan', alamat='$alamat', no_hp='$no_hp', tanggal_lahir='$tanggal_lahir' 
                        WHERE id_karyawan='$id_karyawan'";

                // Menjalankan query
                if ($conn->query($sql) === TRUE) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Menutup koneksi
            mysqli_close($conn);
            ?>

            <form method="post" action="ubah_data.php?id_karyawan=<?php echo $data['id_karyawan']; ?>">
                <input type="hidden" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>">
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan:</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" value="<?php echo $data['nama_karyawan']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP:</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
                </div>
                <button type="submit" class="btn btn-outline-primary">Ubah Data</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
