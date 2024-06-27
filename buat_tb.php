<?php
$dbname='db_tamu';
$host='localhost';
$password='';
$username='root';

// Koneksi ke MySQL
$cnn = mysqli_connect($host,$username,$password,$dbname); 

// Membuat koneksi 
if(!$cnn){ 
    die("Koneksi gagal: " . mysqli_connect_error()); 
} 

// Membuat tabel
$sql ="CREATE TABLE bukutamu (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nama VARCHAR(25),
    alamat VARCHAR(50),
    usia INTEGER,
    no_hp VARCHAR(15),
    CONSTRAINT pk_bukutamu PRIMARY KEY(id)
)";

if (mysqli_query($cnn, $sql)){ 
    echo "Tabel berhasil dibuat"; 
} else { 
    echo "Tabel gagal dibuat: " . mysqli_error($cnn); 
} 

mysqli_close($cnn); 
?>
