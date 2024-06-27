<html>
<head>
    <title>CRUD Data Siswa</title>
</head>
<body>
    <h1>Ubah Data Siswa</h1>
    <?php
        include "koneksi.php";
        $nis = $_GET['nis'];
        $query = "SELECT * FROM datasiswa WHERE nis='".$nis."'";
        $sql = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($sql);
    ?>
    <form method="post" action="proses_ubah.php?nis=<?php echo $nis; ?>">
        <table cellpadding="8">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <?php
                        if($data['jenis_kelamin'] == "Laki-laki"){
                            echo "<input type='radio' name='jenis_kelamin' value='Laki-laki' checked='checked'> Laki-laki";
                            echo "<input type='radio' name='jenis_kelamin' value='Perempuan'> Perempuan";
                        } else {
                            echo "<input type='radio' name='jenis_kelamin' value='Laki-laki'> Laki-laki";
                            echo "<input type='radio' name='jenis_kelamin' value='Perempuan' checked='checked'> Perempuan";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon" value="<?php echo $data['telepon']; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
            </tr>
        </table>
        <hr>
        <input type="submit" value="Ubah">
        <a href="index.php"><input type="button" value="Batal"></a>
    </form>
</body>
</html>
