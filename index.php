<?php
require 'koneksi.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$query = "SELECT * FROM spare_part";
if ($search) {
    $query .= " WHERE kode_sparepart LIKE '%$search%' OR nama_sparepart LIKE '%$search%' OR jenis_part LIKE '%$search%'";
}
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Spare Part</title>
    <!-- Tautan ke file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Menengahkan teks di atas tabel */
        thead {
            text-align: center;
        }

        /* Menengahkan teks data di dalam tabel */
        td {
            text-align: center;
        }

        /* Menambahkan garis pemisah yang lebih jelas */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2; /* Warna latar belakang untuk header kolom */
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2 class="text-center">Daftar Spare Part</h2>
        <form class="form-inline mb-3" method="get" action="">
            <input type="text" class="form-control mr-sm-2" name="search" placeholder="Cari..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-outline-success">Cari</button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="white-space: nowrap;">Kode Sparepart</th>
                    <th style="white-space: nowrap;">Nama Sparepart</th>
                    <th style="white-space: nowrap;">Jenis Part</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th style="white-space: nowrap;">Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td style='white-space: nowrap;'>" . $row["kode_sparepart"] . "</td>"; 
                        echo "<td style='white-space: nowrap;'>" . $row["nama_sparepart"] . "</td>"; 
                        echo "<td style='white-space: nowrap;'>" . $row["jenis_part"] . "</td>"; 
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>" . $row["stock"] . "</td>";
                        echo "<td style='white-space: nowrap;'>" . $row["tanggal_masuk"] . "</td>"; 
                        echo "<td>
                                <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                                    <a href='ubah_data.php?kode_sparepart=" . $row["kode_sparepart"] . "' class='btn btn-primary'>Ubah</a>
                                    <a href='hapus_data.php?kode_sparepart=" . $row["kode_sparepart"] . "' class='btn btn-danger' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</a>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <br>
        <a href="simpan_data.php" class="btn btn-success">Tambah Data Spare Part</a>
    </div>
    <?php include 'footer.php'; ?>

    <!-- Tautan ke file JavaScript Bootstrap (opsional, hanya jika Anda membutuhkan komponen interaktif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
