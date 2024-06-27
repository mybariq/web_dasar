<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        $nilai = 85; // nilai yang ingin diperiksa

        // Menggunakan fungsi if-else
        if ($nilai >= 90 && $nilai <= 100) {
            echo "Grade: A, Keterangan: Baik Sekali";
        } elseif ($nilai >= 76 && $nilai <= 89) {
            echo "Grade: B, Keterangan: Baik";
        } elseif ($nilai >= 60 && $nilai <= 75) {
            echo "Grade: C, Keterangan: Cukup";
        } elseif ($nilai >= 50 && $nilai <= 59) {
            echo "Grade: D, Keterangan: Hampir Cukup";
        } else {
            echo "Grade: E, Keterangan: Kurang";
        }
    
        // Menggunakan fungsi switch-case
        switch(true) {
            case $nilai >= 90 && $nilai <= 100:
                echo "<br>Grade: A, Keterangan: Baik Sekali";
                break;
            case $nilai >= 76 && $nilai <= 89:
                echo "<br>Grade: B, Keterangan: Baik";
                break;
            case $nilai >= 60 && $nilai <= 75:
                echo "<br>Grade: C, Keterangan: Cukup";
                break;
            case $nilai >= 50 && $nilai <= 59:
                echo "<br>Grade: D, Keterangan: Hampir Cukup";
                break;
            default:
                echo "<br>Grade: E, Keterangan: Kurang";
        }
        ?>
    </body>
</html>