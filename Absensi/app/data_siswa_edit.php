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
        $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where `card_id` = $id");
        $hasil_q = mysqli_fetch_array($query);
    ?>

    <div class="main">
        <div class="row">
            <a href="data_siswa" class="column" style="background-color: red;">Back</a>
        </div>
        <h2>Update Siswa</h2>
        <form method="POST" action="controller/update_siswa.php" autocomplete="off">
            <label for="">Card ID : </label>
            <input type="text" name="card_id" value="<?=$hasil_q['card_id'];?>" placeholder="<?=$hasil_q['card_id'];?>"><br>
            <label for="">Nama Siswa : </label>
            <input type="text" name="nama_siswa" required autofocus value="<?=$hasil_q['nama_siswa'];?>"><br>
            <label for="">NIS : </label>
            <input type="text" name="nis" required autofocus value="<?=$hasil_q['nis'];?>"><br>
            <label for="">NISN : </label>
            <input type="text" name="nisn" required autofocus value="<?=$hasil_q['nisn'];?>"><br>
            <label for="">Kelas :</label>
            <select name="kelas" required>
                <option value="1" <?php echo $hasil_q['kelas']==1 ? "selected" : "" ?>>X A</option>
                <option value="2" <?php echo $hasil_q['kelas']==2 ? "selected" : "" ?>>X B</option>
                <option value="3" <?php echo $hasil_q['kelas']==3 ? "selected" : "" ?>>XI A</option>
                <option value="4" <?php echo $hasil_q['kelas']==4 ? "selected" : "" ?>>XI B</option>
                <option value="5" <?php echo $hasil_q['kelas']==5 ? "selected" : "" ?>>XII IPA</option>
                <option value="6" <?php echo $hasil_q['kelas']==6 ? "selected" : "" ?>>XII IPS</option>
            </select><br>
            <label for="" required>Jenis Kelamin :</label>
            <select name="jenis_kelamin" required autofocus>
                <option value="1" <?php echo $hasil_q['jenis_kelamin']==1 ? "selected" : "" ?>>Laki-Laki</option>
                <option value="2" <?php echo $hasil_q['jenis_kelamin']==2 ? "selected" : "" ?>>Perempuan</option>
            </select><br>
            <label for="" >No telp : </label>
            <input type="text" name="no_telp" required autofocus value="<?=$hasil_q['no_telp'];?>"><br>
            <label for="">E-Mail : </label>
            <input type="text" name="email" required autofocus value="<?=$hasil_q['email'];?>"><br>
            <label for="">Agama :</label>
            <select name="agama" required autofocus>
                <option value="1" <?php echo $hasil_q['agama']==1 ? "selected" : "" ?>>Islam</option>
                <option value="2" <?php echo $hasil_q['agama']==2 ? "selected" : "" ?>>Kristen</option>
                <option value="3" <?php echo $hasil_q['agama']==3 ? "selected" : "" ?>>Katolik</option>
                <option value="4" <?php echo $hasil_q['agama']==4 ? "selected" : "" ?>>Hindu</option>
                <option value="5" <?php echo $hasil_q['agama']==5 ? "selected" : "" ?>>Buddha</option>
                <option value="6" <?php echo $hasil_q['agama']==6 ? "selected" : "" ?>>Konghucu</option>
            </select><br>

            <button type="submit" value="input">UPDATE</button>
            <!-- <button type="reset">RESET</button> -->
        </form>
    </div>
   
</body>
</html> 
