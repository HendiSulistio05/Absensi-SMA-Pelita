<?php
    include '../include_/koneksi.php';

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $level = $_POST['level'];
    
    $sql = "UPDATE `user` SET `username` = '$username', `password` = '$password',  `level` = '$level' WHERE `id` = '$id';";
    $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);

    if ($prosess) {
        header('location:../setting_admin_akun');
        exit();
    } 
    else { 
        echo "Data belum dapat di simpan!!"; 
        exit();
    }
?>