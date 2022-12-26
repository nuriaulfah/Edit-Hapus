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
	$diskon=$_POST['diskon'];
	$id_level=$_POST['id_level'];
	$update=mysqli_query($koneksi,"UPDATE diskon SET diskon='$diskon', id_level='$id_level' WHERE id_diskon='$id'");
	if($update){
		header("location:diskon.php");
	}else{
		echo mysqli_error($koneksi);
	}
}
	$querylevel = "SELECT * FROM level where id_tipe='2'";
	$resultlevel = mysqli_query ($koneksi,$querylevel);
	
$id = $_GET['id'];

	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM diskon WHERE id_diskon='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){
?>
<body>
	<h2>EDIT DATA DISKON  </h2>
	<br/>
	<a href="diskon.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA DISKON</h3>
	<form method="POST">
		<table>
			<tr>			
				<td>Diskon</td>
				    <input type="hidden" name="id" value="<?php echo $data['id_diskon'];?>"/>
					<td><input type="number" name="diskon"></td>
				</tr>
                <tr>
				<td>Level</td>
				<td>
					<select name="id_level">
					<option value="">Pilih</option>
					<?php
					while ($datalevel=mysqli_fetch_array($resultlevel))
					{
					    echo "<option value=$datalevel[id_level]>$datalevel[nama_level]</option>";
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