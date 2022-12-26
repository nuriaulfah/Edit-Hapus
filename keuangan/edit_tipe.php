<!DOCTYPE html>
<html>
<head>
	<title>Dodol.com</title>
</head>
<?php 
// koneksi database
include 'koneksi.php';
if(isset($_POST['save'])){
	$id_tipe=$_POST['id_tipe'];
	$nama_tipe=$_POST['nama_tipe'];
	$update=mysqli_query($koneksi,"UPDATE tipe SET nama_tipe='$nama_tipe' WHERE id_tipe='$id'");
	if($update){
		header("location:tipe.php");
	}else{
		echo mysqli_error($koneksi);
	}
}
$id = $_GET['id'];

	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM tipe WHERE id_tipe='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){
?>
<body>
	<h2>EDIT DATA TIPE   </h2>
	<br/>
	<a href="tipe.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA TIPE</h3>
	<form method="POST">
		<table>
			<tr>			
				<td>Nama Tipe</td>
				<input type="hidden" name="id" value="<?php echo $data['id_tipe'];?>"/>
				<td><input type="text" name="nama_tipe" required value="<?php echo $data['nama_tipe'];?>"></td>
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