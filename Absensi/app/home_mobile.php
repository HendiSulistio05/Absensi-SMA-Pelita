<!-- Cek Login -->
<?php
	include 'include/cek_login.php';
	include 'include/cek_for_mobile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home | Buku SMA Pelita IV</title>
	<?php include 'include/head_admin.php';?>
	<link rel="stylesheet" href="style/style_topbar_mobile.css">
	<link rel="stylesheet" href="style/style_home_mobile.css">
</head>
<body>
	<!-- Navbar Atas -->
	<div class="navbar-atas">
		<a href="" style="float: left;"><img src="source/img/logo.webp" alt="Logo SMA Pelita" class="navbar-atas-logo"></a>
		<a href="" class="navbar-atas-name" style="float: left;"><b><?=$_SESSION['username'];?></b><br>SMA Pelita IV</a>
		<a href="" class="navbar-atas-waktu" style="float: right;"><?php include 'include/hari_navbar.php'; ?> <?php include 'include/jam_navbar.php'; ?></a>
	</div>
	<div class="isi">
		Saya
	</div>
	

	<!-- Navbar Bawah -->
	<div class="navbar-bawah">
		<!-- Home -->
		<a href="../app/home_mobile" class="active samping" style="float: left;border-right: 1px solid white; border-top-left-radius: 20px;"><img src="source/icon/icon_home.png" alt="Home" class="home"><br>Home</a>
		<!-- Settings SuperAdmin -->
		<a href="#" class="active samping" style="float: left;border-right: 1px solid white;"><img src="source/icon/icon_setting.png" alt="Settings" class="home"><br>Setting</a>
		<!-- Settings SuperAdmin -->
		<a href="#" class="active samping" style="float: left;border-right: 1px solid white;"><img src="source/icon/icon_setting.png" alt="Settings" class="home"><br>Setting</a>
		<!-- Settings SuperAdmin -->
		<a href="#" class="active samping" style="float: left;border-right: 1px solid white;"><img src="source/icon/icon_setting.png" alt="Settings" class="home"><br>Setting</a>
		<!-- Lainnya -->
		<a href="#" class="active samping" style="float: left;"><img src="source/icon/icon_lain.png" alt="Settings" class="home"><br>Lainnya</a>
		<!-- Logout -->
		<a href="../controllers/logout" class="active samping" style="float: right; border-left: 1px solid white; border-top-right-radius: 20px"><img src="source/icon/icon_logout.png" alt="Home" class="logout"><br>Logout</a>
	</div>
		
	
	
	
</nav>
</body>
</html>