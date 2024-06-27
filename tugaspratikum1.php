<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        $jumlah_fotocopy = 158; // jumlah lembar fotocopy yang dipesan

        if ($jumlah_fotocopy < 100) {
            $biaya_fotocopy = $jumlah_fotocopy * 150;
        } elseif ($jumlah_fotocopy >= 100 && $jumlah_fotocopy <= 200) {
            $biaya_fotocopy = $jumlah_fotocopy * 100;
        } else {
            $biaya_fotocopy = $jumlah_fotocopy * 80;
        }
    
        echo "Biaya fotocopy yang harus dibayar adalah Rp. " . number_format($biaya_fotocopy) . ",-";
        ?>
    </body>
</html>