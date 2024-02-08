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
                <a href="setting_admin_akun" class="column" style="background-color: red;">Back</a>
            </div>
            <h2>Tambah Akun Baru</h2>
            <form method="POST" action="controller/add_akun.php" autocomplete="off">

                <label>Username : </label>
                <input type="text" name="username" required><br>
                <label>Password : </label>
                <input type="text" name="password" required><br>
                <label>Level</label> 
                <select name="level" required autofocus>
                    <option value="1" >Superadmin</option>
                    <option value="2" >Kepala Tim IT</option>
                    <option value="3" >Wakil Kepala Tim IT</option>
                    <option value="4" >IT Team (permitted)</option>
                    <option value="5" selected>IT Team</option>
                    <option value="6" >Kepala Sekolah</option>
                    <option value="7" >Wakil Kepala Sekolah</option>
                    <option value="8" >Tata Usaha</option>
                    <option value="9" >Guru Piket</option>
                    <option value="10" >Wali Kelas</option>
                </select>
                <br>
                <button type="submit" value="input">TAMBAH AKUN</button>
            </form>
        </div>
                                
    <?php
    } else header('location:../app/home');?>

    
   
</body>
</html> 
