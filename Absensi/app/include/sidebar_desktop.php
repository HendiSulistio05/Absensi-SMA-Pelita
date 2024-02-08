<?php
	include 'include/cek_login.php';
	include 'include/cek_for_desktop.php';
	include 'include_/koneksi.php';
?>
<div class="sidenav">
		<div class="judul">APLIKASI ABSENSI SMA PELITA <br>2022 - <?php echo date('Y')?></div>
		<?php
            include 'include_/koneksi.php';
            $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
            $isMob = is_numeric(strpos($ua, "mobile"));
            $ipaddress = getenv("REMOTE_ADDR") ;

            $query = "SELECT * FROM ip_permitted WHERE ip='$ipaddress'";
            $hasil = mysqli_query($GLOBALS["___mysqli_ston"], $query);
            $data = mysqli_num_rows($hasil);
            $ip = $data;

            if($ip OR $ipaddress == "::1"){
                if(!$isMob){
						$ok = "camera";
   					}
            } 
        ?>
		<a href="<?= $ok?>"><img src="source/img/logo.webp" alt="Logo SMA Pelita"></a> 
		<div class="name-sidebar">
			<div style="text-transform: uppercase; margin-bottom: -10%;"><b><?=$_SESSION['username'];?></b></div><br>
			<?php
			$level = $_SESSION['level'];
			$levels = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT user_level from user_level where `id` = $level");
			$levelss = mysqli_fetch_array($levels);
			echo ($levelss['user_level']);
			?><br>SMA Pelita IV <br>
			
			<div class="jam"><?php include 'include/hari_navbar.php';?></div>
		</div>
		<a href="home">Dashboard</a>
		<a href="data_siswa">Data Siswa</a>
		<a href="absensi">Absensi</a>
		<a href="proses_ijin">Proses Ijin Siswa</a>
		<a href="belum_absen">Belum Absensi</a>
		<a href="pencatatan_piket">Pencatatan Piket</a>
		<!-- <a href="#">Proses Ijin Siswa</a> -->


        <!-- Jika Superadmin, Ketua, Wakil Ketua IT Bisa Settings -->
        <?php if(4 >= $_SESSION['level']){
        ?>
            <a href="input_absen">Input Absen</a> 
			<a href="pengaktifan_siswa">Pengaktifan</a>
			<?php
			if(3 >= $_SESSION['level']){
			?> 
            <a href="setting_admin_akun">Settings</a> 
        <?php
        }}?>

		<div class="logout-button">
			<a href="../controllers/logout">Logout</a>
		</div>
		
</div>