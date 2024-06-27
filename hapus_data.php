<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('gojo.png');
            background-size: cover; /* Menutupi seluruh area body */
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang dengan opacity */
            padding: 20px;
            border-radius: 10px; /* Mengatur sudut border */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Efek bayangan untuk card */
        }
        .message {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Form Hapus Data Karyawan</h2>
        <?php
        include 'koneksi.php';

        $id_karyawan = "";
        $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
            $id_karyawan = $_POST['id_karyawan'];

            $sql = "DELETE FROM karyawan WHERE id_karyawan = '$id_karyawan'";

            if ($conn->query($sql) === TRUE) {
                $message = "Data berhasil dihapus";
                // Mengarahkan ke halaman index.php setelah berhasil menghapus data
                header("Location: index.php");
                exit(); // Memastikan tidak ada output lain sebelum redirect
            } else {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
        ?>
        <?php if (!empty($message)): ?>
            <div class="alert alert-success message" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="id_karyawan">ID Karyawan:</label>
                <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?php echo $id_karyawan; ?>" required>
            </div>
            <button type="submit" class="btn btn-danger" name="delete">Hapus</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
