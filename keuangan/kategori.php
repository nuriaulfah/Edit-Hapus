<html>
	<head>
		<title>Dodol.com</title>
	</head>
	<body>
		<h2>MODULE KATEGORI</h2>
		<br/>
		<a href="tambah_kategori.php">+ TAMBAH KATEGORI</a>
		<br/>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama Kategori</th>
				<th>OPSI</th>
			</tr>
			<?php
				include 'koneksi.php';
				$no = 1;
				$query = mysqli_query($koneksi,"SELECT * FROM kategori");
				while($data = mysqli_fetch_array($query))
				{
			?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nama_kategori']; ?></td>
				<td>
					<a href="edit_kategori.php?id=<?php echo $data['id_kategori']; ?>">EDIT</a>
					<a href="hapus_kategori.php?id=<?php echo $data['id_kategori']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>