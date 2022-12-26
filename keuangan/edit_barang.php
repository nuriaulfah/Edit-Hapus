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
	$nama_barang=$_POST['nama_barang'];
	$kode_barang=$_POST['kode_barang'];
	$qty=$_POST['qty'];
	$kategori_id=$_POST['kategori_id'];
	$update=mysqli_query($koneksi,"UPDATE barang SET nama_barang='$nama_barang', kode_barang='$kode_barang',qty=$qty, kategori_id='$kategori_id' WHERE id_barang='$id'");
	if($update){
		header("location:barang.php");
	}else{
		echo mysqli_error($koneksi);
	}
} 
$id = $_GET['id'];

	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){
?>
<body>
	<h2>EDIT DATA BARANG   </h2>
	<br/>
	<a href="barang.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA BARANG</h3>
	<form method="POST">
		<table>
			<tr>			
				<td>Nama Barang</td>
				<input type="hidden" name="id" value="<?php echo $data['id_barang'];?>"/>
				<td><input type="text" name="nama_barang" required value="<?php echo $data['nama_barang'];?>"></td>
			</tr>
			<tr>
				<td>Kode Barang</td>
				<td><input type="text" name="kode_barang" required value="<?php echo $data['kode_barang'];?>"></td>
			</tr>
			<tr>
				<td>QTY Barang</td>
				<td><input type="number" name="qty" required value="<?php echo $data['qty'];?>"></td>
				</td>
			</tr>
			<tr>
				<td>Kategori Barang</td>
				<td><select name="kategori_id" required>
				       <option value="">Pilih</option>
					   <option value="1">ATK</option>
					   <option value="2">Elektronik</option>
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