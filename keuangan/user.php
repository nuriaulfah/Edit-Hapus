<?php
include 'koneksi.php';
				$no = 1;
				if (isset($_POST['cari'])) {
					//$query = mysqli_query($koneksi,"SELECT * FROM user LEFT JOIN level on level.id_level = user.level where nama='".$_POST['nama']."'");
					$query = mysqli_query($koneksi,"SELECT * FROM user
												LEFT JOIN level on level.id_level = user.level where nama like'%".$_POST['nama']."%'");
				}else{
				    $query = mysqli_query($koneksi,"SELECT * FROM user
												LEFT JOIN level on level.id_level = user.level 
				");}
?>
<form method="POST">
<table>
<tr>
<td><input type="text" name="nama"></td>
<td><input type="submit" name="cari"></td>
</tr>
</table>
<html>
	<head>
		<title>Dodol.com</title>
	</head>
	<body>
		<h2>MODULE USER</h2>
		<br/>
		<a href="tambah_user.php">+ TAMBAH USER</a>
		<br/>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Password</th>
				<th>Level</th>
				<th>Status</th>
				<th>OPSI</th>
			</tr>
			<?php
				
				while($data = mysqli_fetch_array($query))
				{
			?> 
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['password']; ?></td>
				<td><?php echo $data['nama_level']; ?></td>
				<td><?php echo $data['status']; ?></td>
				<td>
					<a href="edit_user.php?id=<?php echo $data['id_user']; ?>">EDIT</a>
					<a href="hapus_user.php?id=<?php echo $data['id_user']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
</form>