<?php

session_start();
include '../include_/koneksi.php';
$username = $_POST['uname'];
$password = md5($_POST['pass']); 
// query untuk mendapatkan record dari username
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
$data = mysqli_fetch_array($hasil);
$id = $data['id'];

// cek kesesuaian password
if ($password == $data['password'])
{ 
    mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE `user` SET `last_tgl` = CURDATE(), `last_time` = CURTIME() WHERE id = $id");
    // menyimpan username dan level ke dalam session
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    header('location:../app/home');
	exit();
}
else {

    header('location: ../admin');
    exit();
}
?>

