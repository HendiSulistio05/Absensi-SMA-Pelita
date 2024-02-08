<?php
    include '../include_/koneksi.php';

    $id = base64_decode($_GET['id']);

    $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM data_siswa WHERE card_id=$id");
	$d_absen = mysqli_fetch_array($s_absen);

    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    $ipaddress = getenv("REMOTE_ADDR") ;
    if($ipaddress == "::1") $ipaddress = "PC SERVER"; 

    $query = "UPDATE `absen` SET `pulang` = CURTIME(), `last_update`= NOW(), `ip_update`= '$ipaddress' WHERE card_id = '$id' AND tanggal=CURDATE()";
    $proses = mysqli_query($GLOBALS["___mysqli_ston"], $query);

    if($proses){
        header('location:../belum_absensi_pulang');
    }
    else{
        echo "Data tidak dapat diproses!";
    }
?>