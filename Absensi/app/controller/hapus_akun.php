<?php
include '../include_/koneksi.php';

$id = $_GET['id'];
$sql = "DELETE from user where id = '$id' ;";
$proses = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

	if ($proses) {
		header('location:../setting_admin_akun');
	} 
    else { echo "Data belum dapat di hapus!!"; 
	}
?>