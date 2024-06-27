<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jual Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('Ayaka.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        .container {
            padding-top: 20px;
        }
        .table {
            margin-top: 20px;
            color: #ffffff; /* Set text color to white */
        }
        .text-center {
            text-align: center;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .thead-dark {
            background-color: #343a40;
            color: #ffffff; /* Set text color to white */
        }
        .table-dark {
            background-color: #2c2c2c; /* Dark background for table rows */
        }
        .table-dark td, .table-dark th {
            color: #ffffff; /* Light text color for table rows */
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <h2 class="text-center mt-5 mb-4">Data Jual Barang</h2>
    
    <form class="search-form" method="GET" action="index.php">
        <div class="form-group row">
            <label for="search" class="col-sm-2 col-form-label">Cari Data:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="search" name="search" placeholder="Cari..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            </div>
        </div>
    </form>
    
    <table class="table table-bordered table-dark">
        <thead class="thead-dark">
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Nama Part</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Total</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';

            $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
            $query = "SELECT * FROM jual_barang";
            if ($search) {
                $query .= " WHERE id LIKE '%$search%' OR nama_part LIKE '%$search%' OR harga LIKE '%$search%'";
            }

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td class='text-center'>{$row['id']}</td>
                            <td>{$row['nama_part']}</td>
                            <td class='text-right'>{$row['harga']}</td>
                            <td class='text-center'>{$row['jumlah']}</td>
                            <td class='text-right'>{$row['total']}</td>
                            <td class='text-center'>
                                <a href='ubah_data.php?id={$row['id']}' class='btn btn-primary btn-sm'>Ubah</a>
                                <a href='hapus_data.php?id={$row['id']}' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>Tidak ada data.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <a href="tambah_data.php" class="btn btn-success">Tambah Data</a>
    <a href="print_pdf.php" target="_blank" class="btn btn-secondary">Generate PDF</a> <!-- Opens the PDF in a new tab -->
</div>

<?php include 'footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
