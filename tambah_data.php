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
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Form Pencatatan Buku Tamu</h2>
        <p>Silahkan Masukkan Komentar Anda</p>
        <form action="proses_tambah.php" method="post">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" maxlength="50" placeholder="Masukkan alamat Anda" required>
            </div>
            <div class="form-group">
                <label for="usia">Usia</label>
                <input type="number" class="form-control" id="usia" name="usia" min="0" max="150" placeholder="Masukkan usia Anda" required>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor HP</label>
                <input type="tel" class="form-control" id="no_hp" name="no_hp" maxlength="15" placeholder="Masukkan nomor HP Anda" required>
            </div>
            <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

    <!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap yang interaktif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
