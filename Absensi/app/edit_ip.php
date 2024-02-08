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
        <?php
            $id = $_GET['id'];
            $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from ip_permitted where `id` = $id");
            $hasil_q = mysqli_fetch_array($query);
        ?>

        <div class="main">
            <div class="row">
                <a href="ip_permitted" class="column" style="background-color: red;">Back</a>
            </div>
            <h2>Update IP Address</h2>
            <form method="POST" action="controller/update_ip.php" autocomplete="off">

                <label>Nama : </label>
                <input type="text" name="name" value="<?=$hasil_q['Nama'];?>" required><br>
                <label>IP Address : </label>
                <input type="text" name="ip" value="<?=$hasil_q['ip'];?>" required><br>
                <input type="hidden" name="id" value= <?= $id; ?>>
                <br>
                <button type="submit" value="input">UPDATE</button>
            </form>
        </div>                
    <?php
    } else header('location:../app/home');?>

    
   
</body>
</html> 
