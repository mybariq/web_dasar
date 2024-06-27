<?php
    $cnn = mysqli_connect('localhost','root',''); 
    if(!$cnn){
        echo "Koneksi Gagal";
    }else{
        echo "Koneksi Berhasil<br/>";
        mysqli_select_db($cnn,"db_kampus");
    }

    $nim = "2301082002";
    $nama = "Ahmad Bariq Maulana";
    $alamat = "Jl. Tukad Pakerisan No. 97";
    $telp = "085836151165";
    $query = "select * from mahasiswa";
    
    // memilih mengakses db_kampus 
    $sql = "INSERT INTO mahasiswa (nim,nama,alamat,telp) VALUES 
    ('$nim','$nama','$alamat','$telp')";
    $hasil = mysqli_query($cnn,$sql);
    if(mysqli_query($cnn,$sql)){
        echo "Data GAGAL Disimpan <br/>";
    }else{
        echo "Data BERHASIL Disimpan <br/>";
        echo "NIM : $nim <br/>";
        echo "Nama : $nama <br/>";
        echo "Alamat : $alamat <br/>";
        echo "Telp : $telp <br/>";
}
?>