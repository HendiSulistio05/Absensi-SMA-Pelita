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
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
        <div class="row">
            <a href="proses_ijin" class="column" style="background-color: red;">Refresh</a>
            <a href="siswa_ijin" class="column" style="background-color: blue;">Data Siswa Ijin</a>
        </div>
        
        <div class="box">
            <table class="text">
                <thead>
                    <tr>
                        <th class="act">Action</th>
                        <th>Card ID</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
						$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where card_id not in (SELECT card_id from absen where tanggal=CURDATE()) and status=1 order by kelas ASC;");
						while ($d_absen=mysqli_fetch_array($s_absen)){
					?>
                        <tr style="background-color: beige;">
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <img src="source/icon/icon_caret_down.png" alt="">
                                    </button>
                                    <div class="dropdown-content">
                                        <!-- Ijin -->
                                        <a href="controller/proses_izin?id=<?= base64_encode($d_absen['card_id'])?>&ijin=<?= base64_encode("2")?>" onclick="return confirm('Apakah Siswa dengan Card ID <?= $d_absen['card_id']?> Ijin pada <?php echo date('Y-m-d');?> ?')">Ijin</a>
                                        <!-- Sakit -->
                                        <a href="controller/proses_izin?id=<?= base64_encode($d_absen['card_id'])?>&ijin=<?= base64_encode("3")?>" onclick="return confirm('Apakah Siswa dengan Card ID <?= $d_absen['card_id']?> Sakit pada <?php echo date('Y-m-d');?> ?')">Sakit</a>
                                        <!-- Alpa -->
                                        <a href="controller/proses_izin?id=<?= base64_encode($d_absen['card_id'])?>&ijin=<?= base64_encode("1")?>" onclick="return confirm('Apakah Siswa dengan Card ID <?= $d_absen['card_id']?> Alpa pada <?php echo date('Y-m-d');?> ?')">Alpa</a>
                                    </div>
                                </div>
                                
                            </td>
                            <td><?= $d_absen['card_id'];?></td>
                            <td><?= $d_absen['nis'];?></td>
                            <td><?= $d_absen['nisn'];?></td>
                            <td><?= $d_absen['nama_siswa'];?></td>
                            <td>
                                <?php 
                                    $kelas = $d_absen['kelas'];
                                    $d_kelas = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kelas WHERE id = $kelas"));
                                    echo $d_kelas['kelas'];
                                ?>
                            </td>
                            <td style="background-color: <?php echo $d_absen['status']==1 ? 'green' : 'red'  ?>; color:white;">
                                <?php 
                                    if($d_absen['status'] == 1) echo "Aktif";
                                    else echo "Dinonaktifkan";
                                ?>
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
