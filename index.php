<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data Siswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Data Siswa</h1>
        <a href="tambah_data.php" class="btn btn-primary mb-4">Tambah Data</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $query = "SELECT * FROM datasiswa";
                $sql = mysqli_query($connect, $query);
                while($data = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td>".$data['nis']."</td>";
                    echo "<td>".$data['nama']."</td>";
                    echo "<td>".$data['jenis_kelamin']."</td>";
                    echo "<td>".$data['telepon']."</td>";
                    echo "<td>".$data['alamat']."</td>";
                    echo "<td><a href='form_ubah.php?nis=".$data['nis']."' class='btn btn-warning'>Ubah</a></td>";
                    echo "<td><a href='proses_hapus.php?nis=".$data['nis']."' class='btn btn-danger'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
