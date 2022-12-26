<!DOCTYPE html>
<html>
<head>
	<title>Dodol.com</title>
</head>
<?php 
// koneksi database
include 'koneksi.php';
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$nama_member = $_POST['nama_member'];
	$alamat_member = $_POST['alamat_member'];
	$id_level = $_POST['id_level'];
	$status = $_POST['status'];
	$update=mysqli_query($koneksi,"UPDATE member SET nama_member='$nama_member', alamat_member='$alamat_member',id_level=$id_level, status='$status' WHERE id_member='$id'");
	if($update){
		header("location:member.php");
	}else{
		echo mysqli_error($koneksi);
	}
}
	$querylevel = "SELECT * FROM level
						LEFT JOIN tipe on level.id_tipe = tipe.id_tipe
						WHERE tipe.nama_tipe = 'Member'
						";
	$resultlevel = mysqli_query ($koneksi,$querylevel);
	$id = $_GET['id'];

	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM member WHERE id_member='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){
?>
<body>
	<h2>EDIT DATA MEMBER  </h2>
	<br/>
	<a href="member.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA MEMBER</h3>
	<form method="POST">
		<table>
			<tr>			
				<td>Nama</td>
				    <input type="hidden" name="id" value="<?php echo $data['id_member'];?>"/>
					<td><input type="text" name="nama_member"></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><input type="textarea" name="alamat_member"></td>
				</tr>
				<tr>
					<td>Level</td>
					<td>
						<select name="id_level">
							
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
					<td>Status</td>
					<td>
						<select name="status">
							<option value="">-----Pilih</option>
							<option value="1">Aktif</option>
							<option value="2">Tidak Aktif</option>
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