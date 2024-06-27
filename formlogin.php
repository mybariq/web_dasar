<?php
session_start();
if(isset($_POST['login'])){
if(($_POST['nama']=="") && ($_POST['pass']=="")) { echo "username dan password kosong"; 
	session_destroy();
}else{
if(($_POST['nama']=="Ahmad Bariq Maulana") and ($_POST['pass']=="12345"))
{
	$_SESSION['login']=1;
	$_SESSION['username']=$_POST['nama'];
}
if ((isset($_SESSION['login'])) and ($_SESSION['login']==1))
{ 
	header("location: submithomelogin.php");
	exit();
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="post" action="">
	<table>
		<tr>
			<td><label>Username</label></td>
			<td><input type="text" name="nama" id="nama"></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input type="Password" name="pass" id="pass"></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="login"></input></td>
			<td></td>
		</tr>
	</table>
</form>
</body>
</html>