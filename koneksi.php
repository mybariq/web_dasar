<?php
$dbname='db_tamu';
$host='localhost';
$password='';
$username='root';
//Koneksi Ke MySQL
$conn = mysqli_connect($host,$username,$password,$dbname); 
if(mysqli_connect_errno()){
echo "Koneksi Gagal.";
exit();
}
?>