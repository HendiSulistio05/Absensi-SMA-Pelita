<!-- Cek Login -->
<?php
	include 'include/cek_login.php';
	include 'include/cek_for_desktop.php';
	include 'include_/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Buku SMA Pelita IV</title>
	<?php include 'include/head_admin.php';?>
	<link rel="stylesheet" href="style/style_sidebar.css">
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
        <!-- Camera local untuk pc server -->
        <?php
            include 'include_/koneksi.php';
            $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
            $isMob = is_numeric(strpos($ua, "mobile"));
            $ipaddress = getenv("REMOTE_ADDR") ;

            if($ipaddress == "::1"){
                if(!$isMob){
        ?>
                    <!-- Webcam -->
                    <center><video autoplay="true" id="video-webcam" style="width: 65%; margin-bottom: 0px;"></video></center>
        <?php
   					}
            } 
            include 'include/cameras.php';
        ?>
       

        
    </div>
   
</body>
</html> 
