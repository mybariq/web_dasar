<?php
	//Koneksi Ke MySQL
	$cnn = mysqli_connect('localhost','root',''); 
	if(!$cnn){
		echo "Koneksi Gagal";
	}else{
		echo "Koneksi Berhasil";
	}
?>