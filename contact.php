<?php
// Proses pengiriman formulir kontak
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $pesan = $_POST["pesan"];
    
    // Alamat email tujuan
    $to = "your-email@example.com"; // Ganti dengan alamat email yang Anda inginkan
    $subject = "Pesan Baru dari $nama";
    $message = "Nama: $nama\nEmail: $email\n\nPesan:\n$pesan";
    $headers = "From: $email";

    // Mengirim email
    if (mail($to, $subject, $message, $headers)) {
        $success_message = "Terima kasih! Pesan Anda telah terkirim.";
    } else {
        $error_message = "Maaf, terjadi kesalahan saat mengirim pesan Anda. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <!-- Tautan ke file CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .contact-section {
            padding: 60px 0;
        }
        .contact-section h2 {
            text-align: center;
            margin-bottom: 40px;
        }
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="contact-section">
            <h2>Kontak Kami</h2>
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success">
                    <?php echo $success_message; ?>
                </div>
            <?php elseif (!empty($error_message)): ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <form class="contact-form" method="post" action="">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="Chamskie" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="Chamskie@gmail.co.id" required>
                </div>
                <div class="form-group">
                    <label for="pesan">Pesan:</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="5" required>kami selalu memberikan yang terbaik</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <!-- Tautan ke file JavaScript Bootstrap (opsional, hanya jika Anda membutuhkan komponen interaktif) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
