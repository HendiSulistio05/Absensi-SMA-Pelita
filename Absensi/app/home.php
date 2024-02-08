<!-- Cek Login -->
<?php
	include 'include/cek_login.php';
	include 'include/cek_for_desktop.php';
	include 'include_/koneksi.php';
	$sec = "30";
 	header("Refresh: $sec; url=home");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Buku SMA Pelita IV</title>
	<?php include 'include/head_admin.php';?>
	<link rel="stylesheet" href="style/style_sidebar.css">
	<link rel="stylesheet" href="style/style_topbar.css">
	<link rel="stylesheet" href="style/style_home.css">
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
		<h3 style="font-weight: 900; ">Dashboard</h3>
		<div class="row">
			<div class="column" style="background-color: #2196f3">
				<div class="text siswa-aktif">Siswa Aktif 
					<div class="jlh">
						<?php
							$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where `status` = 1");
							$t_siswa = mysqli_num_rows($siswa); 
							echo $t_siswa; 
						?>
					</div>
				</div>
			</div>
			<div class="column" style="background-color: #4caf50">
				<div class="text">Siswa Masuk
					<div class="jlh">
						<?php
							$skr = date('Y-m-d');
							$masuk = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin is NULL and masuk IS NOT NULL");
							$t_masuk = mysqli_num_rows($masuk); 
							echo $t_masuk; 
						?>
					</div>
				</div>
			</div>
			<div class="column" style="background-color: #f44336">
				<div class="text">Siswa Tidak Masuk
					<div class="jlh">
						<?php 
							echo $t_siswa - $t_masuk;
						?>
					</div>
				</div>
			</div>
			<div class="column" style="background-color: #00bcd4">
				<div class="text">Siswa Sudah Pulang
					<div class="jlh">
						<?php
							$skr = date('Y-m-d');
							$masuk = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin is NULL and pulang IS NOT NULL and masuk IS NOT NULL");
							$t_masuk = mysqli_num_rows($masuk); 
							echo $t_masuk; 
						?>
					</div>
				</div>
			</div>
		</div>

		<h5>Keterlambatan Siswa</h5>

		<div class="row">
			<div class="column" style="background-color: #02a76b">
				<div class="text">Siswa Tepat Waktu
					<div class="jlh">
						<?php 
							$skr = date('Y-m-d');
							$masuk_tepat = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin is NULL and masuk IS NOT NULL and `status`= 'Tepat Waktu' ");
							$t_masuk_tepat = mysqli_num_rows($masuk_tepat); 
							echo $t_masuk_tepat; 
						?>
					</div>
				</div>
			</div>

			<div class="column" style="background-color: red">
				<div class="text">Siswa Terlambat
					<div class="jlh">
						<?php
							$skr = date('Y-m-d');
							$masuk_telat = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin is NULL and masuk IS NOT NULL and `status`= 'Terlambat'");
							$t_masuk_telat = mysqli_num_rows($masuk_telat); 
							echo $t_masuk_telat; 
						?>
					</div>
				</div>
			</div>
			<br><br>
			<h5>Perijinan Siswa</h5>
			

			<div class="row">
				<div class="column" style="background-color: orange">
					<div class="text">Siswa Ijin
						<div class="jlh">
							<?php 
								$skr = date('Y-m-d');
								$ijin = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin=2 and masuk IS NULL and pulang IS NULL");
								$t_ijin = mysqli_num_rows($ijin); 
								echo $t_ijin; 
							?>
						</div>
					</div>
				</div>
				<div class="column" style="background-color: blue">
					<div class="text">Siswa Sakit
						<div class="jlh">
							<?php 
								$skr = date('Y-m-d');
								$sakit = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin=3 and masuk IS NULL and pulang IS NULL");
								$t_sakit = mysqli_num_rows($sakit); 
								echo $t_sakit; 
							?>
						</div>
					</div>
				</div>
				<div class="column" style="background-color: grey">
					<div class="text">Siswa Alpa
						<div class="jlh">
							<?php 
								$skr = date('Y-m-d');
								$alpa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where tanggal='$skr' and ijin=1 and masuk IS NULL and pulang IS NULL");
								$t_alpa = mysqli_num_rows($alpa); 
								echo $t_alpa; 
							?>
						</div>
					</div>
				</div>
				<br><br>

				<h5>Jumlah Anak</h5>
				<div class="row">
					<div class="column" style="background-color: blueviolet">
						<div class="text siswa-aktif">Kelas X A
							<div class="jlh">
								<?php
									$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where kelas = 1");
									$x_a = mysqli_num_rows($siswa); 
									echo $x_a; 
								?>
							</div>
						</div>
					</div>
					<div class="column" style="background-color: brown">
						<div class="text">Kelas X B
							<div class="jlh">
								<?php
									$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where kelas = 2");
									$x_b = mysqli_num_rows($siswa); 
									echo $x_b; 
								?>
							</div>
						</div>
					</div>
					<div class="column" style="background-color: steelblue">
						<div class="text">Kelas XI A
							<div class="jlh">
								<?php 
									$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where kelas = 3");
									$xi_a = mysqli_num_rows($siswa); 
									echo $xi_a; 
								?>
							</div>
						</div>
					</div>
					<div class="column" style="background-color: peru">
						<div class="text">Kelas XI B
							<div class="jlh">
								<?php
									$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where kelas = 4");
									$xi_b = mysqli_num_rows($siswa); 
									echo $xi_b; 
								?>
							</div>
						</div>
					</div>
					<div class="column" style="background-color: deeppink">
						<div class="text">Kelas XII IPA
							<div class="jlh">
								<?php
									$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where kelas = 5");
									$xii_ipa = mysqli_num_rows($siswa); 
									echo $xii_ipa; 
								?>
							</div>
						</div>
					</div>
					<div class="column" style="background-color: lightcoral">
						<div class="text">Kelas XII IPS
							<div class="jlh">
								<?php
									$siswa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where kelas = 6");
									$xii_ips = mysqli_num_rows($siswa); 
									echo $xii_ips; 
								?>
							</div>
						</div>
					</div>
				</div>

			</div>	
    </div>
   
</body>
</html> 
