<?php
include 'koneksi.php';
$id = $_GET['id'];
$query_delete = mysqli_query($koneksi,"DELETE FROM diskon WHERE id_diskon='$id'")
or die(mysqli_error());
if($query_delete){
	header("location:diskon.php");
	
}else{
	echo mysqli_error();
}