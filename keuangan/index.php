
<?php
error_reporting(0);
session_start();
$nama   = $_SESSION['nama'];
$password   = $_SESSION['password'];
$level      = $_SESSION['level']; 
$nama_level = $_SESSION['nama_level'];

    if(isset($_SESSION['nama']) && isset($_SESSION['level']))
    {
      header('Location: home.php');
    }
    else
    {
      //header('Location: index.php');
    }

?>
<html>
	<head></head>
<body>
	<form method="POST" action="cek_login.php">
	<center>SILAHKAN ISI LOGIN</center>
	
	<center>
		<table class="table table-dark">
		<tr>
			<td>username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="save"></td>
		</tr>
		</table>
	</center>
	</form>
</body>
</html>
