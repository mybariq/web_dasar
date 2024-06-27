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
    <h2 class="mb-4 text-center">Daftar Komentar dalam Buku Tamu</h2>
    <?php
    require("koneksi.php");
    $sql = "SELECT nama, alamat, usia, no_hp FROM bukutamu";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num > 0){
    ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Nomor HP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
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
    </div>
    <?php
    } else {
    ?>
    <div class="alert alert-info text-center" role="alert">
        Belum ada komentar.
    </div>
    <?php
    }
    ?>
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>

<!-- Bootstrap JS dan Popper.js (diperlukan untuk komponen Bootstrap yang interaktif) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
