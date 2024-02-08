<?php
    include '../include_/koneksi.php';

    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    $ipaddress = getenv("REMOTE_ADDR") ;
    if($ipaddress == "::1") $ipaddress = "PC SERVER"; 

	$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where card_id not in (SELECT card_id from absen where tanggal=CURDATE()) and status=1 order by kelas ASC;");

    if(mysqli_num_rows($s_absen)!=0){
        while ($d_absen=mysqli_fetch_array($s_absen)){
            // echo $d_absen['card_id'] . " " . $d_absen['nama_siswa'] . "<br>\n";
            $id = $d_absen['card_id'];
            $nama = $d_absen['nama_siswa'];
            $sql = "INSERT INTO `absen` (`card_id`, `nama_siswa`, `tanggal`, `last_update`, `ip_update`, `ijin`) VALUES ('$id', '$nama', CURDATE(), NOW(), '$ipaddress', '1');";
            $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
            if($prosess){
                header('location:../masuk');
            }
            else{
                echo "Data belum disimpan!";
            }
        }
    }
    else header('location:../masuk');
?>