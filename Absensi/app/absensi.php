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

    <div class="main">
        <div class="row">
            <a href="absensi" class="column" style="background-color: red;">Refresh</a>
            <a href="absensi_pulang" class="column" style="background-color: #32cd32;">Pulang</a>
            <a href="belum_absensi_pulang" class="column" style="background-color: purple;">Belum Pulang</a>
            <a href="absensi_all" class="column" style="background-color: #cc0066;">Absensi</a>
            <!-- <a href="absensi_masuk" class="column" style="background-color: #de6202;">Absensi Masuk</a> -->
            <!-- <a class="column" style="background-color: #99bcf6;">Download PDF</a> -->
            <!-- <a target="_blank" href="export/data_siswa.php" class="column" style="background-color: #ec0f92;">Download EXCEL</a> -->
        </div>

        <div class="box">
            <h3>Absensi Masuk</h3>
            <table class="text">
                <thead>
                    <tr>
                        <th class="act">Action</th>
                        <th>Card ID</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>TANGGAL</th>
                        <th>MASUK</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
						$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM absen WHERE tanggal = CURDATE() AND ijin IS NULL order by masuk DESC");
						while ($d_absen=mysqli_fetch_array($s_absen)){
					?>
                        <tr style="background-color: beige;">
                            <td>
                            <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3 || $_SESSION['level'] == 4){
                            ?>
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <img src="source/icon/icon_caret_down.png" alt="">
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="edit_absen?id=<?= $d_absen['id'];?>" >Edit</a></li>
                                        <!-- Hapus -->
                                        <a href="controller/hapus_absen?id=<?= $d_absen['id'];?>" onclick="return confirm('Apakah Siswa dengan Card ID <?= $d_absen['card_id']?> akan dihapus ?')">Hapus</a>

                                        
                                    </div>
                                </div>
                                <?php
                                }?>
                            </td>
                            <td><?= $d_absen['card_id'];?></td>
                            <td><?= $d_absen['nama_siswa'];?></td>
                            <td style="text-align: center;">
                                <?php 
                                    $id_card = $d_absen['card_id'];
                                    $c_id = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT kelas FROM data_siswa WHERE card_id = $id_card"));
                                    $kelas = $c_id['kelas'];
                                    $d_kelas = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kelas WHERE id = $kelas"));
                                    echo $d_kelas['kelas'];
                                ?>
                            </td>
                            <td style="text-align: center;"><?= $d_absen['tanggal'];?></td>
                            <td style="text-align: center;"><?= $d_absen['masuk'];?></td>
                            <td style="background-color: <?php echo $d_absen['status']=="Terlambat" ? "red" : "green"; ?>; font-weight: 600; text-align:center;">
                                <?= $d_absen['status'];?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
   
</body>
</html> 
