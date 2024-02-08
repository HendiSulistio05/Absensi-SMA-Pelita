<?php
include '../include_/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE from absen where id = $id";
$proses = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	if ($proses) {
		header('location:../absensi');
	} else { echo "Data belum dapat di hapus!!"; 
	}
?>