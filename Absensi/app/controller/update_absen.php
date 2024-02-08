<?php
    include '../include_/koneksi.php';

    $masuk = $_POST['masuk'];
    $pulang = $_POST['pulang'];
    $id = $_POST['id'];
    
    $sql = "UPDATE `absen` SET `masuk` = '$masuk', `pulang` = '$pulang' WHERE `id` = '$id';";
    $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

    if ($prosess) {
        header('location:../absensi');
        exit();
    } 
    else { 
        echo "Data belum dapat di simpan!!"; 
        exit();
    }
?>