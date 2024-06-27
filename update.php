<?php
$cnn = mysqli_connect('localhost','root','','db_kampus'); 
if(!$cnn){
echo "Koneksi Gagal <br/>";
}else{
echo "Koneksi Berhasil <br/>";
}
mysqli_select_db($cnn,"db_kampus");
$sql = "UPDATE mahasiswa set nama='Ahmad Bariq Maulana', telp = '085836151165', 
alamat = 'Sago' where nim = '2301082002';";
$update = mysqli_query($cnn,$sql);
if (!$update){
echo "Data GAGAL Dirubah <br/>";
}else{
echo "Data BERHASIL Dirubah <br/>";
}
?>