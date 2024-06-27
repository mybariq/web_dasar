<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Membuat Buku Tamu</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="text-center">Buku Tamu</h2>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="tambah_data.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-edit mr-2"></i> Isi Buku Tamu
                        </a>
                        <a href="tampil_data.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-list mr-2"></i> Daftar Tamu
                        </a>
                        <a href="hapus_tamu.php" class="list-group-item list-group-item-action">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus Tamu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
