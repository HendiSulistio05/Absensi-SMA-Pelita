<?php
include '../include_/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE from ip_permitted where id = '$id';";
$proses = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	if ($proses) {
		header('location:../ip_permitted');
	} else { echo "Data belum dapat di hapus!!"; 
	}
?>