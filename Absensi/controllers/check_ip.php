<?php
    include 'include_/koneksi.php';
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    $ipaddress = getenv("REMOTE_ADDR") ;

    $query = "SELECT * FROM ip_permitted WHERE ip='$ipaddress'";
    $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
    $data = mysqli_num_rows($hasil);
    $ip = $data;

    if($ipaddress != "::1" AND !$ip){
        header('location:admin');
        if($isMob){
            header('location:admin');
        }
    } 
?>