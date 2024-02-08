<!-- Check Desktop or Version -->
<?php
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    if($isMob) {
        header('location:admin');
    }
    // Check IP
    // $ipaddress = getenv("REMOTE_ADDR") ;
    // if($ipaddress != "::1"){
    //     header('location:admin');
    // }   
    include 'controllers/check_ip.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi SMA Pelita IV</title>
    <link rel="stylesheet" href="style/style_menu.css">
    <?php include 'include/head_public.php';?>
    <!-- <meta http-equiv="refresh" content="2"> -->
</head>
<body>
    <div class="container">
        <div class="gambar">
            <img src="sources/img/logo.webp" alt="">
        </div>
        <h2 class="text">Aplikasi Absensi SMA Pelita IV</h2>
        <h3 class="jam"><?php include'include/jam_navbar.php';?></h3>
        <h3 class="tgl"><?php include'include/hari_navbar.php'; ?></h3>
        <div class="centered">
            <a href="masuk" class="button button-m">Absensi Masuk</a>
            <a href="pulang" class="button button-p">Absensi Pulang</a>
            <a href="admin" class="button button-l">LOGIN Admin</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <?php include 'include/footer.php'; ?>
    </div>
</body>
</html>