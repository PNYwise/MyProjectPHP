<?php
include '../koneksi.php';
$id = $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM user WHERE id='$id'");
if ($query) {
 	header("location:menu_admin.php");
 }else{
 	echo "gagal";
 }

?>