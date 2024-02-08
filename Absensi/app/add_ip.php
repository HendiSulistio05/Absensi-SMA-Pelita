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
    <link rel="stylesheet" href="style/tambah_siswa.css">
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>
    <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3){
    ?>
        <div class="main">
            <div class="row">
                <a href="ip_permitted" class="column" style="background-color: red;">Back</a>
            </div>
            <h2>Tambah IP Address Baru</h2>
            <form method="POST" action="controller/add_ip_address.php" autocomplete="off">

                <label>Nama : </label>
                <input type="text" name="name" required><br>
                <label>IP Adress : </label>
                <input type="text" name="ip" required><br>
                <br>
                <button type="submit" value="input">TAMBAH IP</button>
            </form>
        </div>        
    <?php
    } else header('location:../app/home');?>

    
   
</body>
</html> 
