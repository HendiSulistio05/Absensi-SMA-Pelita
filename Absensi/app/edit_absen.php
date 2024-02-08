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

    <?php
        $id = $_GET['id'];
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen where `id` = $id");
        $hasil_q = mysqli_fetch_array($query);
    ?>

    <div class="main">
        <div class="row">
            <a href="absensi" class="column" style="background-color: red;">Back</a>
        </div>
        <h2>Update Absensi</h2>
        <form method="POST" action="controller/update_absen.php" autocomplete="off">
            <label>Card ID : </label>
            <input type="text" name="card_id" value="<?=$hasil_q['card_id'];?>" disabled><br>
            <label>Nama Siswa: </label>
            <input type="text" name="nama_siswa" value="<?=$hasil_q['nama_siswa'];?>" disabled><br>
            <label>Masuk</label> 
            <input type="text" name="masuk" value="<?=$hasil_q['masuk'];?>" required><br>
            <label>pulang</label> 
            <input type="text" name="pulang" value="<?=$hasil_q['pulang'];?>" required><br>
            <input type="hidden" name="id" value= <?= $id; ?>>
            <br>
            <button type="submit" value="input">UPDATE</button>
            <!-- <button type="reset">RESET</button> -->
        </form>
    </div>
   
</body>
</html> 
