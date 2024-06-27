<?php
session_start();
$error_message = "";

if (isset($_POST['login'])) {
    if (empty($_POST['nama']) || empty($_POST['pass'])) {
        $error_message = "User Name dan Password masih kosong";
        session_destroy();
    } else {
        if ($_POST['nama'] == "esi" && $_POST['pass'] == "123") {
            $_SESSION['login'] = 1;
            $_SESSION['username'] = $_POST['nama'];
        } else {
            $error_message = "User Name atau Password salah";
        }

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            header("location: submit_formlogin.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        <table>
            <tr>
                <td><label>Username :</label></td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td><label>Password :</label></td>
                <td><input type="password" name="pass" id="pass"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="login" id="login"></td>
            </tr>
        </table>
        <?php
        if (!empty($error_message)) {
            echo "<p style='color:red;'>$error_message</p>";
        }
        ?>
    </form>
</body>
</html>