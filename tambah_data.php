<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Spare Part</title>
    <!-- Tautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Data Spare Part</h2>
        <form method="post" action="">
            <label for="kode_sparepart">Kode Sparepart:</label><br>
            <input type="text" id="kode_sparepart" name="kode_sparepart" class="form-control" required><br>
            
            <label for="nama_sparepart">Nama Sparepart:</label><br>
            <input type="text" id="nama_sparepart" name="nama_sparepart" class="form-control" required><br>
            
            <label for="jenis_part">Jenis Part:</label><br>
            <input type="text" id="jenis_part" name="jenis_part" class="form-control" required><br>
            
            <label for="harga">Harga:</label><br>
            <input type="number" step="0.01" id="harga" name="harga" class="form-control" required><br>
            
            <label for="stock">Stock:</label><br>
            <input type="number" id="stock" name="stock" class="form-control" required><br>
            
            <label for="tanggal_masuk">Tanggal Masuk:</label><br>
            <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required><br>
            
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>

    <!-- Tautan ke Bootstrap JS (Opsional, hanya jika Anda menggunakan fitur JS Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
