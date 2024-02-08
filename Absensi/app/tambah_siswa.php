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

    <div class="main">
        <div class="row">
            <a href="data_siswa" class="column" style="background-color: red;">Back</a>
        </div>
        <h2>Input Siswa</h2>
        <form method="POST" action="controller/add_siswa.php" autocomplete="off">
            <label for="">Card ID : </label>
            <input type="text" name="card_id" required autofocus><br>
            <label for="">Nama Siswa : </label>
            <input type="text" name="nama_siswa" required autofocus><br>
            <label for="">NIS : </label>
            <input type="text" name="nis" required autofocus><br>
            <label for="">NISN : </label>
            <input type="text" name="nisn" required autofocus><br>
            <label for="">Kelas :</label>
            <select name="kelas" required autofocus>
                <option value="1">X A</option>
                <option value="2">X B</option>
                <option value="3">XI A</option>
                <option value="4">XI B</option>
                <option value="5">XII IPA</option>
                <option value="6">XII IPS</option>
            </select><br>
            <label for="" required>Jenis Kelamin :</label>
            <select name="jenis_kelamin" required autofocus>
                <option value="1">Laki-Laki</option>
                <option value="2">Perempuan</option>
            </select><br>
            <label for="" >No telp : </label>
            <input type="text" name="no_telp" required autofocus><br>
            <label for="">E-Mail : </label>
            <input type="text" name="email" required autofocus><br>
            <label for="">Agama :</label>
            <select name="agama" required autofocus>
                <option value="1">Islam</option>
                <option value="2">Kristen</option>
                <option value="3">Katolik</option>
                <option value="4">Hindu</option>
                <option value="5">Buddha</option>
                <option value="6">Konghucu</option>
            </select><br>
            <label for="">Upload Foto Siswa</label>
            <!-- <input type="text" name="foto" required autofocus><br> -->
            <input type="file" name="file" required><br>

            <button type="submit" value="input">INPUT</button>
            <button type="reset">RESET</button>
        </form>
    </div>
   
</body>
</html> 
