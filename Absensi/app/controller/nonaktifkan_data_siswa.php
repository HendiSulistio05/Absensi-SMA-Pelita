<?php
include '../include_/koneksi.php';

$id = $_GET['id'];
$sql = "UPDATE data_siswa SET `status`= 2 WHERE card_id = $id";
$proses = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	if ($proses) {
		header('location:../data_siswa');
	} else { echo "Data belum dapat di update!!"; 
	}
?>