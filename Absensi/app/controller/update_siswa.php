<?php
    include '../include_/koneksi.php';

    $card_id = $_POST['card_id'];
    $nama_siswa = $_POST['nama_siswa'];
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $agama = $_POST['agama'];

    // echo $card_id;
    // echo $nama_siswa;
    // echo $nis;
    
    $sql = "UPDATE `data_siswa` SET `nama_siswa` = '$nama_siswa', `nis`='$nis', `nisn`='$nisn', `kelas` = '$kelas', `jenis_kelamin` = '$jenis_kelamin', `no_telp` = '$no_telp', `email`='$email', `agama`='$agama' WHERE `card_id` = '$card_id';";
    $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

    if ($prosess) {
        header('location:../data_siswa');
        exit();
    } 
    else { 
        echo "Data belum dapat di simpan!!"; 
        exit();
    }
?>