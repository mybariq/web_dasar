<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        table {
            width: 100%;
        }
        th, td {
            padding: 15px;
            text-align: center; /* Center text */
        }
        th {
            background-color: #f2f2f2;
        }
        .table-container {
            margin-top: 50px;
        }
        .action-buttons {
            display: flex;
            justify-content: center; /* Center buttons */
            gap: 5px;
        }
    </style>
</head>
<body>

<div class="container table-container">
    <h1 class="mt-5 text-center">Daftar Barang</h1> <!-- Center the heading -->
    <a href="tambah_data.php" class="btn btn-success my-3">Tambah Barang</a>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "penjualan"; // Nama database Anda

                // Membuat koneksi
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Memeriksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Menyiapkan query SQL
                $sql = "SELECT id_barang, nama_barang, satuan, harga_beli, harga_jual, stock FROM barang";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data dari setiap row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id_barang"]. "</td>
                                <td>" . $row["nama_barang"]. "</td>
                                <td>" . $row["satuan"]. "</td>
                                <td>" . $row["harga_beli"]. "</td>
                                <td>" . $row["harga_jual"]. "</td>
                                <td>" . $row["stock"]. "</td>
                                <td>
                                    <div class='action-buttons'>
                                        <a href='ubah_data.php?id_barang=" . $row["id_barang"] . "' class='btn btn-outline-primary btn-sm'>Ubah</a> 
                                        <a href='hapus_data.php?id_barang=" . $row["id_barang"] . "' class='btn btn-outline-danger btn-sm' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
                                    </div>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Tidak ada data</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
