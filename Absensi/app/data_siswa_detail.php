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
    <link rel="stylesheet" href="style/detail_siswa.css">
	<link rel="stylesheet" href="style/style_sidebar.css">
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

	<?php
		$id =  base64_decode($_GET['id']);
		$data = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM data_siswa WHERE card_id = $id"));
	?>

    <div class="main">
		<div class="border">
			<img src="source/foto_siswa/<?= $data['foto'];?>" alt="Foto Siswa <?= $data['foto'];?>">
			<h3><?= $data['card_id'];?></h3>
			<h3 class="name"><?= $data['nama_siswa'];?></h3>
			<h3 class="no"><?= $data['nis'];?> / <?= $data['nisn'];?></h3>
		</div>
		<div class="bagian">
			<h3>Kelas         : <?php 
									$kls = $data['kelas'];
									$que = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kelas WHERE id = $kls"));
									echo $que['kelas'];
								?>
			</h3>
			<h3>Jenis Kelamin : <?php 
									$jk = $data['jenis_kelamin'];
									$que_k = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM jenis_kelamin WHERE id = $jk"));
									echo $que_k['jenis_kelamin'];
								?>
			</h3>
			<h3>Nomor Telepon : <?= $data['no_telp'];?></h3>
			<h3>E-mail        : <?= $data['email'];?></h3>
			<h3>Agama         : <?php 
									$agm = $data['agama'];
									$que_a = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM agama WHERE id = $agm"));
									echo $que_a['agama'];
								?>
			</h3>
			<h3>Wali Kelas    : <?php 
									$kls = $data['kelas'];
									$que = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kelas WHERE id = $kls"));
									echo $que['wali_kelas'];
								?>
			</h3>
			<h3>Status        : <?php 
									echo $data['status']==1? 'Aktif' : 'Dinonaktifkan'
								?>
			</h3>
			<br>
			<h3>Terlambat        : <?php 
										$m_skr =date_default_timezone_set('Asia/Jakarta').date('m');
										$t_skr =date_default_timezone_set('Asia/Jakarta').date('Y');
										if ($m_skr >= 7 && $m_skr <= 12){
											$start_date = $t_skr . '-07-01';
										}
										else{
											$start_date = $t_skr . '-01-01';
										}
										$que_t = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `absen` WHERE `card_id` = '$id' AND `status` = 'Terlambat' AND `ijin` IS NULL and `tanggal` between $start_date and CURDATE()"));
										echo $que_t . " Kali";
								?>
			</h3>
			<br>
			<h3>Ijin        : <?php 
									$que_i = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `absen` WHERE `card_id` = '$id' AND masuk IS NULL AND pulang IS NULL AND `ijin` = '2' and `tanggal` between $start_date and CURDATE()"));
									echo $que_i . " Kali";
								?>
			</h3>
			<h3>Sakit        : <?php 
									$que_i = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `absen` WHERE `card_id` = '$id' AND masuk IS NULL AND pulang IS NULL AND `ijin` = '3' and `tanggal` between $start_date and CURDATE()"));
									echo $que_i . " Kali";
								?>
			</h3>
			<h3>Alpa        : <?php 
									$que_i = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `absen` WHERE `card_id` = '$id' AND masuk IS NULL AND pulang IS NULL AND `ijin` = '1' and `tanggal` between $start_date and CURDATE()"));
									echo $que_i . " Kali";
								?>
			</h3>
		</div>
    </div>
   
</body>
</html> 
