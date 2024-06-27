<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            background-image: url('gojo.png');
            background-size: cover; /* Menutupi seluruh area body */
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 20px;
            color: #333; /* Warna teks utama */
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang container dengan opacity */
            padding: 20px;
            margin-top: 50px;
            border-radius: 10px; /* Border radius untuk membulatkan sudut kontainer */
        }
        h2 {
            color: #000; /* Warna teks untuk judul */
            text-align: center; /* Pusatkan judul */
        }
        form {
            background-color: rgba(255, 255, 255, 0.9); /* Warna latar belakang form dengan opacity */
            padding: 20px;
            border-radius: 10px; /* Border radius untuk membulatkan sudut form */
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">Form Tambah Data Karyawan</h2>
    <form method="post" action="simpan_data.php">
        <div class="form-group">
            <label for="id_karyawan">ID Karyawan:</label>
            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" required>
        </div>
        <div class="form-group">
            <label for="nama_karyawan">Nama Karyawan:</label>
            <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="no_hp">No HP:</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
