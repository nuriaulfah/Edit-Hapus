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
	$tgl_transaksi = $_POST['tgl_transaksi'];
	$no_transaksi = $_POST['no_transaksi'];
	$jenis_transaksi = $_POST['jenis_transaksi'];
	$barang_id = $_POST['barang_id'];
	$diskon_barang= $_POST['diskon_barang'];
	$diskon_member= $_POST['diskon_member'];
	$total_pembelian = $_POST['total_pembelian'];
	$total_diskon = $_POST['total_diskon'];
	$jumlah_transaksi= $_POST['jumlah_transaksi'];
	$member_id = $_POST['member_id'];
	
	$update=mysqli_query($koneksi," UPDATE transaksi SET tgl_transaksi='$tgl_transaksi', no_transaksi='$no_transaksi', jenis_transaksi='$jenis_transaksi', barang_id='$barang_id', diskon_barang='$diskon_barang', diskon_member='$diskon_member', total_pembelian='$total_pembelian', total_diskon='$total_diskon', jumlah_transaksi='$jumlah_transaksi', id_member='$member_id' WHERE id_transaksi='$id' ");
	if($update){
		header("location:transaksi.php");
	}else{
		echo mysqli_error($koneksi);
	}
}
$querybarang = "SELECT * FROM barang";
$resultbarang = mysqli_query($koneksi,$querybarang);

$querymember = "SELECT * FROM member";
$resultmember = mysqli_query($koneksi,$querymember);

$id = $_GET['id'];

	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE id_transaksi='$id'")or die(mysqli_error()); 
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){
?>
<body>
	<h2>EDIT DATA TRANSAKSI</h2>
	<br/>
	<a href="transaksi.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA TRANSAKSI</h3>
	<form method="POST">
		<table>
			<tr>			
				<td>Tanggal Transaksi</td>
				<input type="hidden" name="id" value="<?php echo $data['id_transaksi'];?>"/>
				<td><input type="date" name="tgl_transaksi" required value="<?php echo $data['tgl_transaksi'];?>"></td>
			</tr>
			<tr>
				<td>No. Transaksi</td>
				<td><input type="text" name="no_transaksi" required value="<?php echo $data['no_transaksi'];?>"></td>
			</tr>
			<tr>		
				<td>Jenis Transaksi</td>
				<td><select name="jenis_transaksi" required>
				       <option value="">-----Pilih--------</option>
					    <option value="Tunai">Tunai</option>
						<option value="Kredit">Kredit</option>	
				</select>
				</td>
			</tr>
			<tr>
			<td>Barang</td>
				<td><select name="barang_id" required>
				       <option value="">-----Pilih--------</option>
					   <?php
							while ($databarang=mysqli_fetch_array($resultbarang))
							{
								echo "<option value=$databarang[id_barang]>$databarang[nama_barang]</option>";
							}
						?>
				</select>
				</td>
			</tr>
			<tr>
			<td>Jumlah Transaksi</td>
				<td><input type="text" name="jumlah_transaksi" required value="<?php echo $data['jumlah_transaksi'];?>"></td>
			</tr>
			<tr>
			<td>Diskon member</td>
				<td><input type="text" name="diskon_member" required value="<?php echo $data['diskon_member'];?>"></td>
			</tr>
			<tr>
			<td>Diskon barang</td>
				<td><input type="text" name="diskon_barang" required value="<?php echo $data['diskon_barang'];?>"></td>
			</tr>
			<tr>
			<td>Total pembelian</td>
				<td><input type="text" name="total_pembelian" required value="<?php echo $data['total_pembelian'];?>"></td>
			</tr>
			<tr>
			<td>Total diskon</td>
				<td><input type="text" name="total_diskon" required value="<?php echo $data['total_diskon'];?>"></td>
			</tr>
			<tr>
			<td>Member</td>
				<td><select name="member_id" required>
				       <option value="">-----Pilih--------</option>
				<?php
					while ($datamember=mysqli_fetch_array($resultmember))
					{
						echo "<option value=$datamember[id_member]>$datamember[nama_member]</option>";
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