<?php
    include '../include_/koneksi.php';

    $id = base64_decode($_GET['id']);
    $ijin = base64_decode($_GET['ijin']);

    $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM data_siswa WHERE card_id=$id");
	$d_absen = mysqli_fetch_array($s_absen);

    $nama  = $d_absen['nama_siswa'];

    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    $ipaddress = getenv("REMOTE_ADDR") ;
    if($ipaddress == "::1") $ipaddress = "PC SERVER"; 

    if($d_absen != 0){
        $sql = "INSERT INTO `absen` (`card_id`, `nama_siswa`, `tanggal`, `last_update`, `ip_update`, `ijin`) VALUES ('$id', '$nama', CURDATE(), NOW(), '$ipaddress', '$ijin');";
        $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        if($prosess){
            header('location:../proses_ijin');
        }
        else{
            echo "Data belum disimpan!";
        }
    }
    else{
        echo "Card id " . $id . " Error tidak dapat diproses ijin"; 
    }
?>