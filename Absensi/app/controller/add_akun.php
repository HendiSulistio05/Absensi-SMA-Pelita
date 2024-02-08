<?php
    // session_start();
    include '../include_/koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $level = $_POST['level'];

    $s_pelanggan= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from user where username = '$username'");
    $cek = mysqli_num_rows($s_pelanggan);

    if($cek == 0){
        $sql = "INSERT INTO user (`username`, `password`, `level`) VALUES ('$username', '$password', '$level');";
        $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        if ($prosess) {
            header('location:../setting_admin_akun');
            echo "Data Berhasil!!"; 
            exit();
        } 
        else { 
            echo "Data belum dapat di simpan!!"; 
            exit();
        }
    }
    else{
        echo "Username sudah ada! Ganti Username";
    } 
?>