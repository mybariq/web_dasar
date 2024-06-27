<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Karyawan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            background-image: url('Gojo.png');
            background-size: cover; /* Menutupi seluruh area body */
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 20px;
            color: #333; /* Warna teks utama */
        }
        h1 {
            color: #000; /* Warna teks untuk judul */
            text-align: center; /* Pusatkan judul */
        }
        th, td {
            color: #000; /* Warna teks untuk sel header dan data tabel */
            padding: 15px;
            text-align: center; /* Pusatkan teks dalam tabel */
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang sel tabel dengan opacity */
        }
        .table-container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.5); /* Warna latar belakang kontainer tabel dengan opacity */
            padding: 20px;
            border-radius: 10px; /* Border radius untuk membulatkan sudut kontainer */
        }
        .action-buttons {
            display: flex;
            justify-content: center; /* Pusatkan tombol aksi */
            gap: 5px;
        }
        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <h1 class="mt-5">Daftar Karyawan</h1>
    <div class="row search-form">
        <div class="col-md-6">
            <form class="form-inline my-2 my-lg-0" method="get" action="">
                <input class="form-control mr-sm-2" type="search" placeholder="Cari Karyawan" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Karyawan</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $search = "";
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                }

                // Menyiapkan query SQL
                $sql = "SELECT id_karyawan, nama_karyawan, alamat, no_hp, tanggal_lahir FROM karyawan";
                if (!empty($search)) {
                    $sql .= " WHERE nama_karyawan LIKE '%$search%' OR alamat LIKE '%$search%' OR no_hp LIKE '%$search%' OR tanggal_lahir LIKE '%$search%'";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data dari setiap row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id_karyawan"]. "</td>
                                <td>" . $row["nama_karyawan"]. "</td>
                                <td>" . $row["alamat"]. "</td>
                                <td>" . $row["no_hp"]. "</td>
                                <td>" . $row["tanggal_lahir"]. "</td>
                                <td>
                                    <div class='action-buttons'>
                                        <a href='ubah_data.php?id_karyawan=" . $row["id_karyawan"] . "' class='btn btn-outline-primary btn-sm'>Ubah</a> 
                                        <a href='hapus_data.php?id_karyawan=" . $row["id_karyawan"] . "' class='btn btn-outline-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
                                    </div>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <a href="tambah_data.php" class="btn btn-success my-3">Tambah Karyawan</a>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
