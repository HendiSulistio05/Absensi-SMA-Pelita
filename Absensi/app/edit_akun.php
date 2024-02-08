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
            $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from user where `id` = $id");
            $hasil_q = mysqli_fetch_array($query);
        ?>

        <div class="main">
            <div class="row">
                <a href="setting_admin_akun" class="column" style="background-color: red;">Back</a>
            </div>
            <h2>Update Akun</h2>
            <form method="POST" action="controller/update_akun.php" autocomplete="off">

                <label>Username : </label>
                <input type="text" name="username" value="<?=$hasil_q['username'];?>" required><br>
                <label>Password : </label>
                <input type="text" name="password" required><br>
                <label>Level</label> 
                <select name="level" required autofocus>
                    <option value="1" <?php echo $hasil_q['level']==1 ? "selected" : "" ?>>Superadmin</option>
                    <option value="2" <?php echo $hasil_q['level']==2 ? "selected" : "" ?>>Kepala Tim IT</option>
                    <option value="3" <?php echo $hasil_q['level']==3 ? "selected" : "" ?>>Wakil Kepala Tim IT</option>
                    <option value="4" <?php echo $hasil_q['level']==4 ? "selected" : "" ?>>IT Team (permitted)</option>
                    <option value="5" <?php echo $hasil_q['level']==5 ? "selected" : "" ?>>IT Team</option>
                    <option value="6" <?php echo $hasil_q['level']==6 ? "selected" : "" ?>>Kepala Sekolah</option>
                    <option value="7" <?php echo $hasil_q['level']==7 ? "selected" : "" ?>>Wakil Kepala Sekolah</option>
                    <option value="8" <?php echo $hasil_q['level']==8 ? "selected" : "" ?>>Tata Usaha</option>
                    <option value="9" <?php echo $hasil_q['level']==9 ? "selected" : "" ?>>Guru Piket</option>
                    <option value="10" <?php echo $hasil_q['level']==10 ? "selected" : "" ?>>Wali Kelas</option>
                </select><br>
                <input type="hidden" name="id" value= <?= $id; ?>>
                <br>
                <button type="submit" value="input">UPDATE</button>
            </form>
        </div>                    
    <?php
    } else header('location:../app/home');?>

   
   
</body>
</html> 
