<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM service WHERE id='$id'");
if ($query) {
 	header("location:data_service.php");
 }else{
 	echo "gagal";
 }

?>