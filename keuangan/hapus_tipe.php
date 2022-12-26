<?php
include 'koneksi.php';
$id = $_GET['id'];
$query_delete = mysqli_query($koneksi,"DELETE FROM tipe WHERE id_tipe='$id'")
or die(mysqli_error());
if($query_delete){
	header("location:tipe.php");
	
}else{
	echo mysqli_error();
}