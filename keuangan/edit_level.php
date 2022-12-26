<!DOCTYPE html>
<html>
<head>
	<title>Dodol.com</title>
</head>
<?php 
// koneksi database
include 'koneksi.php';
if(isset($_POST['save'])){
	$id=$_POST['id'];
	$nama_level = $_POST['nama_level'];
    $id_tipe = $_POST['id_tipe'];
	$update=mysqli_query($koneksi,"UPDATE level SET nama_level='$nama_level', id_tipe='$id_tipe' WHERE id_level='$id'");
	if($update){
		header("location:level.php");
	}else{
		echo mysqli_error($koneksi);
	}
}
	$querytipe = "SELECT * FROM tipe";
	$resulttipe = mysqli_query ($koneksi,$querytipe);
		
	$id = $_GET['id'];

	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM level WHERE id_level='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){
?>
<body>
	<h2>EDIT DATA LEVEL  </h2>
	<br/>
	<a href="level.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA LEVEL</h3>
	<form method="POST">
		<table>
			<tr>			
				<td>Nama Level</td>
				<input type="hidden" name="id" value="<?php echo $data['id_level'];?>"/>
				<td><input type="text" name="nama_level" required value="<?php echo $data['nama_level'];?>"></td>
			</tr>
			<tr>
				<td>Tipe</td>
					<td>
						<select name="id_tipe" required>
							<?php
							while ($datatipe=mysqli_fetch_array($resulttipe))
							{
								echo "<option value=$datatipe[id_tipe]>$datatipe[nama_tipe]</option>";
							}
							?>
				</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="save"></td>
			</tr>		
		</table>
	</form>
<?php	}?>
</body>
</html>