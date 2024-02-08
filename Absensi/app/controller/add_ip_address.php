<?php
    // session_start();
    include '../include_/koneksi.php';

    $name = $_POST['name'];
    $ip = $_POST['ip'];

    $s_pelanggan= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from ip_permitted where `ip` = '$ip'");
    $cek = mysqli_num_rows($s_pelanggan);

    if($cek == 0){
        $sql = "INSERT INTO `ip_permitted`(`ip`, `Nama`) VALUES ('$ip','$name');";
        $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        if ($prosess) {
            header('location:../ip_permitted');
            echo "Data Berhasil!!"; 
            exit();
        } 
        else { 
            echo "Data belum dapat di simpan!!"; 
            exit();
        }
    }
    else{
        echo "IP sudah Terdaftar!";
    } 
?>