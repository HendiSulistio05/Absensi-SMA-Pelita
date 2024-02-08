<?php
    include '../include_/koneksi.php';

    $card_id = base64_decode($_GET['id']);

    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    $ipaddress = getenv("REMOTE_ADDR") ;
    if($ipaddress == "::1") $ipaddress = "PC SERVER"; 

    // Cek card_id di data_siswa
    $query = "SELECT * FROM data_siswa WHERE card_id = $card_id";
    $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $data_cardID = mysqli_fetch_array($hasil);

    // Cek Status kartu aktif atau tidak
    $query_1 = "SELECT * FROM data_siswa WHERE card_id = $card_id AND status = 1";
    $hasil_1 = mysqli_query($GLOBALS["___mysqli_ston"], $query_1);
    $data_stat_ed = mysqli_fetch_array($hasil_1);

    // Cek sudah absen masuk atau belum
    $query_2 = "SELECT * FROM absen WHERE card_id = $card_id AND tanggal = CURDATE()";
    $hasil_2 = mysqli_query($GLOBALS["___mysqli_ston"], $query_2);
    $data_absn = mysqli_fetch_array($hasil_2);

    $status = "-";
    if(date_default_timezone_set('Asia/Jakarta').date('H') >= 107)
        if(date_default_timezone_set('Asia/Jakarta').date('i') >= 15) $status = "Terlambat";
        else $status = "Tepat Waktu";
    else $status = "Tepat Waktu";

    if($data_cardID){
        $nama_siswa = $data_cardID['nama_siswa'];
        if($data_stat_ed){
            if(!$data_absn){
                $query = "INSERT INTO `absen` (`card_id`, `nama_siswa`, `tanggal`, `masuk`, `status`, `last_update`, `ip_update`) VALUES ('$card_id', '$nama_siswa', CURDATE(), CURTIME() ,'$status', NOW(), '$ipaddress');";
                $proses = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                header('location:../input_absen');
            }
            else{
                // header('location:../masuk?pesan='.base64_encode('Anda Sudah Absen Hari ini!'));
                echo ("Anda Sudah Absen Hari ini!");
            }
        }
        else{
            // header('location:../masuk?pesan='.base64_encode('Maaf, Kartu Anda sudah dinonaktifkan!'));
            echo "Maaf, Kartu Anda sudah dinonaktifkan!";
        }
    }
    else{
        // header('location:../masuk?pesan='.base64_encode(''));
        echo("Card ID Tidak Ditemukan!");
    }

    
?>
