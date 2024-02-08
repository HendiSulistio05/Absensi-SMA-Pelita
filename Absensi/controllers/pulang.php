<?php
    // header('location:../masuk');
    session_start();
    include '../include_/koneksi.php';

    // Dapetin IP Address
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    $ipaddress = getenv("REMOTE_ADDR") ;
    if($ipaddress == "::1") $ipaddress = "PC SERVER"; 


    // $card_id = $_POST['card_id'];
    
    // // Mencari data dengan card id tersebut dengan tanggal yang sama dan belum absen pulang
    // $query = "SELECT * FROM absen WHERE card_id = $card_id AND tanggal=CURDATE() AND pulang IS NULL";
    // $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    // $data = mysqli_fetch_array($hasil);



    // Ngecek ada di database absensi apa belum, jika belum artinya belum absen masuk
    // if($data){
    //     $query = "UPDATE `absen` SET `pulang` = CURTIME(), `last_update`= NOW(), `ip_update`= '$ipaddress' WHERE card_id = '$card_id' AND tanggal=CURDATE()";
    //     $proses = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    //     header('location:../pulang');
    //     // echo "Berhasil";
    // }
    // else{
    //     echo "Belum Absen Masuk!";
    // }

    $card_id = $_POST['card_id'];

    // Cek card_id di data_siswa
    $query = "SELECT * FROM data_siswa WHERE card_id = $card_id";
    $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $data_cardID = mysqli_fetch_array($hasil);

    // Cek Status kartu aktif atau tidak
    $query_1 = "SELECT * FROM data_siswa WHERE card_id = $card_id AND status = 1";
    $hasil_1 = mysqli_query($GLOBALS["___mysqli_ston"], $query_1);
    $data_stat_ed = mysqli_fetch_array($hasil_1);

    // Cek sudah absen masuk atau belum
    $query_2 = "SELECT * FROM absen WHERE card_id = $card_id AND tanggal = CURDATE() AND pulang IS NULL";
    $hasil_2 = mysqli_query($GLOBALS["___mysqli_ston"], $query_2);
    $data_absn = mysqli_fetch_array($hasil_2);

    //Cek apakah sudah absen masuk
    $query_3 = "SELECT * FROM absen WHERE card_id = $card_id AND tanggal = CURDATE()";
    $hasil_3 = mysqli_query($GLOBALS["___mysqli_ston"], $query_3);
    $data_absn_1 = mysqli_fetch_array($hasil_3);

    

    if($data_cardID){
        if($data_stat_ed){
            if($data_absn_1){
                if($data_absn){
                    $query = "UPDATE `absen` SET `pulang` = CURTIME(), `last_update`= NOW(), `ip_update`= '$ipaddress' WHERE card_id = '$card_id' AND tanggal=CURDATE()";
                    $proses = mysqli_query($GLOBALS["___mysqli_ston"], $query);
                    header('location:../pulang?pesan='.base64_encode($data_stat_ed['nama_siswa'] . ' Berhasil!'));
                    // echo("Berhasil!");
                }
                else{
                    header('location:../pulang?pesan='.base64_encode('Anda Sudah Absen Pulang!'));
                    // echo("Anda Sudah Absen Pulang!");
                }
            }
            else{
                header('location:../pulang?pesan='.base64_encode('Anda Belum Absensi Masuk!'));
                 // echo("Anda Belum Absensi Masuk");
            }
        }
        else{
            header('location:../pulang?pesan='.base64_encode('Maaf, Kartu Anda sudah dinonaktifkan!'));
            // echo("Maaf, Kartu Anda sudah dinonaktifkan!");
        }
    }
    else{
        header('location:../pulang?pesan='.base64_encode('Card ID Tidak Ditemukan!'));
        // echo("Card ID Tidak Ditemukan!");
    }

    // $query = "INSERT INTO `absen` (`card_id`, `nama_siswa`, `tanggal`, `masuk`, `status`, `last_update`, `ip_update`) VALUES ('$card_id', '$nama_siswa', CURDATE(), CURTIME() ,'$status', NOW(), '$ipaddress');";
    // $proses = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    // // header('location:../masuk');
    // header('location:../pulang?pesan='.base64_encode('Berhasil!'));

    // header('location:../pulang?pesan='.base64_encode('Anda Sudah Absen Hari ini!'));
    //             // echo ("Anda Sudah Absen Hari ini!");

    // header('location:../masuk');

?>