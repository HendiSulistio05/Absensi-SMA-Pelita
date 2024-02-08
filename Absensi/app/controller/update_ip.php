<?php
    include '../include_/koneksi.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $ip = $_POST['ip'];
    
    $sql = "UPDATE `ip_permitted` SET `Nama` = '$name', `ip` = '$ip' WHERE `id` = '$id';";
    $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

    if ($prosess) {
        header('location:../ip_permitted');
        exit();
    } 
    else { 
        echo "Data belum dapat di simpan!!"; 
        exit();
    }
?>