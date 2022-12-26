<?php
include 'koneksi.php';
$id = $_GET['id'];
$query_delete = mysqli_query($koneksi,"DELETE FROM level WHERE id_level='$id'")
or die(mysqli_error());
if($query_delete){
	header("location:level.php");
	
}else{
	echo mysqli_error();
}