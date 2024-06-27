<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Membuat Buku Tamu</title>
</head>
<body>
<h2>Daftar Komentar dalam Buku Tamu</h2>
<?php
require("koneksi.php");
$sql="select nama,email,url,komentar"." from bukutamu";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num > 0){
?>
<table>
<tr bgColor="#ddcc45">
<th width="140">Nama</th>
<th width="200">Emal</th>
<th width="200">URL</th>
<th width="250">Komentar</th>
</tr>
<?php
while(list($nama,$email,$url,$komentar)=mysqli_fetch_array($result)){
?>
<tr>
<td Valign="top"><?php echo $nama; ?></td>
<td Valign="top"><?php echo $email; ?></td>
<td Valign="top"><a href="?php echo $url; ?>"><?php echo $url; ?>
<a/>
</td>
<td Valign="top"><?php echo $komentar; ?></td>
</tr>
<?php
}
?>
</table>
<?php
}else{
 ?>
 <i>Belum ada komentar.</i>
 <?php
}
?>
<br/><br/>
<div align="center">
[<a href="tambah_data.php">Isi Buku Tamu</a>]
</div>
</body>
</html>