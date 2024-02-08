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
    <link rel="stylesheet" href="style/siswa_ijin.css">
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
        <div class="row">
            <a href="absensi_all" class="column" style="background-color: red;">Refresh</a>
            <a href="absensi_pulang" class="column" style="background-color: #32cd32;">Pulang</a>
            <a href="belum_absensi_pulang" class="column" style="background-color: purple;">Belum Pulang</a>
            <a href="absensi_all" class="column" style="background-color: #cc0066;">Absensi</a>
            <!-- <a href="absensi_masuk" class="column" style="background-color: #de6202;">Absensi Masuk</a> -->
            <!-- <a class="column" style="background-color: #99bcf6;">Download PDF</a> -->
            <!-- <a target="_blank" href="export/data_siswa.php" class="column" style="background-color: #ec0f92;">Download EXCEL</a> -->
        </div>

        <div class="box">
            <form action="">
            <input type="date" name="start_date" required>
            <input type="date" name="end_date" required>
                <button>Cari</button>
                <?php
                    $start_date =  $_GET['start_date']; 
                    $end_date =  $_GET['end_date']; 
                ?>
                
                <a target="_blank" href="export/absensi_alls?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="column" style="background-color: #ec0f92">Download EXCEL</a>
                <h3><?php 
                    if(empty($start_date) && empty($end_date)){
                        echo "Absensi";
                    }
                    else if ($start_date == $end_date){
                        if($start_date == $end_date){
                            echo "Absensi Periode " . $start_date;
                        }
                    }
                    else{
                        echo "Absensi Periode " . $start_date . " sampai " . $end_date;
                    }
                ?></h3>
                <table class="text">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>KELAS</th>
                            <th>TANGGAL</th>
                            <th>MASUK</th>
                            <th>PULANG</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT absen.nama_siswa, absen.tanggal, absen.masuk, absen.pulang, absen.status as absen_masuk, absen.card_id FROM absen, data_siswa where absen.card_id = data_siswa.card_id AND tanggal between '$start_date' AND '$end_date' AND ijin IS NULL ORDER BY kelas ASC, nama_siswa ASC, tanggal ASC, masuk ASC;");
                            while ($d_absen=mysqli_fetch_array($s_absen)){
                        ?>
                            <tr style="background-color: beige;">
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
                                <td style="text-align: center;"><?= $d_absen['pulang'];?></td>
                                <td style="background-color: <?php echo $d_absen['absen_masuk']=="Terlambat" ? "red" : "green"; ?>; font-weight: 600; text-align:center;">
                                    <?= $d_absen['absen_masuk'];?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>


            </form>
            
        </div>
    </div>
   
</body>
</html> 
