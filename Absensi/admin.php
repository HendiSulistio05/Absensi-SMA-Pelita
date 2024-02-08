<?php
    include 'include_/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Absensi SMA Pelita IV</title>
    <link rel="stylesheet" href="style/style_login.css">
    <?php include 'include/head_public.php';?>
    
</head>
<body>
    <div class="gambar">
        <img src="sources/img/logo.webp" alt="">
    </div>
    <h2 class="text">SMA PELITA IV</h2>
    <h2 class="text bawah">Absensi SMA Pelita IV</h2>
    <div class="container">
        <h1>admin LOG-IN</h1>
        <form method="POST" action="controllers/login_proses.php" autocomplete="off">
            <label for="">Username</label><br>
            <input type="text" name="uname"><br>
            <label for="">Password</label><br>
            <input type="password" name="pass" required><br>
            <button type="submit" value="Login">LOGIN</button>

            <!-- Check Desktop or Mobile -->
            <?php 
                //$ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
                //$isMob = is_numeric(strpos($ua, "mobile"));
                //if(!$isMob) { ?> 
                    <!-- <a href="menu" class="button-back-menu">Back To Menu</a> -->
            <?php   //} ?>

            <!--  Check Desktop or Mobile & Selain IP Address Master Gak Bisa Absen Masuk dan Pulang -->
            <?php 
                //$ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
                //$isMob = is_numeric(strpos($ua, "mobile"));
                //$ipaddress = getenv("REMOTE_ADDR") ;
                //if(!$isMob AND $ipaddress == "::1") { ?> 
                    <!-- <a href="menu" class="button-back-menu">Back To Menu</a> -->
            <?php   //} ?>

            <!--  Check Desktop or Mobile & Selain IP Address Master Gak Bisa Absen Masuk dan Pulang Dari database -->
            <?php
            include 'include_/koneksi.php';
            $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
            $isMob = is_numeric(strpos($ua, "mobile"));
            $ipaddress = getenv("REMOTE_ADDR") ;

            $query = "SELECT * FROM ip_permitted WHERE ip='$ipaddress'";
            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
            $data = mysqli_num_rows($hasil);
            $ip = $data;

            if($ip OR $ipaddress == "::1"){
                if(!$isMob){
            ?>
                <a href="menu" class="button-back-menu">Back To Menu</a>
            <?php    }
            } 
            ?>

            <!-- Print IP -->
            <a class="ip">
                <p>
                    <?php
                        $ipaddress = getenv("REMOTE_ADDR") ;
                        if($ipaddress != "::1"){
                            echo $ipaddress;
                        }
                        // else{
                        //     echo "192.168.1.11";
                        // }
                    ?>
                </p>
            </a>
        </form>
    </div>

    <div class="footer">
        <?php include 'include/footer.php'; //echo date_default_timezone_set('Asia/Jakarta').date(' i');?><br>
    </div>
    
</body>
</html>