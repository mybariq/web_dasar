<?php
$cnn = mysqli_connect('localhost','root','','db_kampus'); 
if(!$cnn){
echo "Koneksi Gagal <br/>";
}else{
echo "Koneksi Berhasil <br/>";
}
mysqli_select_db($cnn,"db_kampus");
$sql = "DELETE FROM mahasiswa where nim ='10101111';";
$hapus = mysqli_query($cnn,$sql);
if (!$hapus){
echo "Data GAGAL Dihapus <br/>";
}else{
echo "Data BERHASIL Dihapus <br/>";
}
?>