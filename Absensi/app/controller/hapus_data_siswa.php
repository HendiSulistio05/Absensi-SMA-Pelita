<?php
include '../include_/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE from data_siswa where card_id = $id";
$proses = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	if ($proses) {
		header('location:../data_siswa');
	} else { echo "Data belum dapat di hapus!!"; 
	}
?>