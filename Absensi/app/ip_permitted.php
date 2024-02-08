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
    <link rel="stylesheet" href="style/style_data_siswa.css">
	<link rel="stylesheet" href="style/style_sidebar.css">
    <link rel="stylesheet" href="style/absensi.css">
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3){
    ?>
        <div class="main">
        <div class="row">
            <a href="ip_permitted" class="column" style="background-color: red;">Refresh</a>
            <a href="add_ip" class="column" style="background-color: green;">Tambah IP</a>
            <a href="setting_admin_akun" class="column" style="background-color: blue;">Akun</a>
        </div>

        <div class="box">
            <h3>IP PERMITTED</h3>
            <table class="text">
                <thead>
                    <tr>
                        <th class="act">Action</th>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>IP</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
						$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM ip_permitted ORDER BY id ASC");
						while ($d_absen=mysqli_fetch_array($s_absen)){
					?>
                        <tr style="background-color: beige;">
                            <td>
                            <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3){
                            ?>
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <img src="source/icon/icon_caret_down.png" alt="">
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="edit_ip?id=<?= $d_absen['id'];?>" >Edit</a></li>
                                        <!-- Hapus -->
                                        <a href="controller/hapus_ip?id=<?= $d_absen['id'];?>" onclick="return confirm('Apakah IP <?= $d_absen['ip']?> dengan nama <?= $d_absen['Nama']?> akan dihapus ?')">Hapus</a>
                                    </div>
                                </div>
                                <?php
                                }?>
                            </td>
                            <td style="width: 50px;"><center><?= $d_absen['id'];?></center></td>
                            <td style="text-align: center;"><?= $d_absen['Nama'];?></td>
                            <td style="text-align: center;"><?= $d_absen['ip'];?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
                                
    <?php
    } else header('location:../app/home');?>

    
   
</body>
</html> 
