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
    <link rel="stylesheet" href="style/catat_piket.css">
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
        <div class="row">
            <a href="pencatatan_piket" class="column" style="background-color: red;">Refresh</a>
        </div>
        <form>
                <input type="date" name="date" required>
                <button>Cari</button>
                <?php 
                    $date =  $_GET['date']; 
                ?>
            <!-- Terlambat -->
            <div class="box">
                <h6 style="color:red;">
                    Terlambat
                    <?php
                        if(empty($date)) echo "";
                        else echo "Pada " . $date;
                    ?>
                </h6>
                <table class="text">
                    <thead>
                        <tr>
                            <th>Card ID</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>MASUK</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM absen WHERE tanggal = '$date' AND ijin IS NULL AND status = 'Terlambat' order by masuk ASC, nama_siswa ASC");
                            while ($d_absen=mysqli_fetch_array($s_absen)){
                        ?>
                            <tr style="background-color: beige;">
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

            
            <!-- Ijin -->
            <div class="box">
                <h6 style="color:red;">
                    Ijin
                    <?php
                        if(empty($date)) echo "";
                        else echo "Pada " . $date;
                    ?>
                </h6>
                <table class="text">
                    <thead>
                        <tr>
                            <th>TANGGAL</th>
                            <th>Card ID</th>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM absen WHERE tanggal = '$date' AND masuk IS NULL AND pulang IS NULL AND ijin IS NOT NULL order by masuk ASC");
                            while ($d_absen=mysqli_fetch_array($s_absen)){
                        ?>
                            <tr style="background-color: beige;">
                                <td><center><?= $d_absen['tanggal'];?></center></td>
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
                                <td style="background-color: beige; color:black; font-weight:600;">
                                    <center>
                                        <?php 
                                            if($d_absen['ijin'] == 1) echo "Alpa";
                                            else if($d_absen['ijin'] == 2) echo "Ijin";
                                            else echo "Sakit";
                                        ?>
                                    </center>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
   
</body>
</html> 
