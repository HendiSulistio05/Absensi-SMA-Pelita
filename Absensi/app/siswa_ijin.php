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
    <link rel="stylesheet" href="style/siswa_ijin.css">
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
        <div class="row">
            <a href="proses_ijin" class="column" style="background-color: purple;">Back</a>
            <a href="siswa_ijin" class="column" style="background-color: red;">Refresh</a>
        </div>

        <div class="box">

            <form>
                <input type="date" name="start_date" required>
                <input type="date" name="end_date" required>
                <button>Cari</button>
                <?php 
                    $start_date =  $_GET['start_date']; 
                    $end_date = $_GET['end_date']; 
                ?>
                <a target="_blank" href="export/siswa_ijin?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" class="column" style="background-color: #ec0f92;">Download EXCEL</a>

                
                <br><br>
                <center><h6>
                    <?php 
                        if(empty($start_date) && empty($end_date)) echo ""; 
                        else if($start_date == $end_date) echo $start_date;
                        else echo $start_date . " sampai " . $end_date;

                    ?>
                </h6></center>

                <table class="text">
                
                <thead>
                    <tr>
                        <th>TANGGAL</th>
                        <!-- <th>NIS</th>
                        <th>NISN</th> -->
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        
						$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM `absen` WHERE tanggal between '$start_date' and '$end_date' AND masuk IS NULL and pulang IS NULL and ijin IS NOT NULL order by nama_siswa ASC, tanggal ASC, ijin ASC;");
						while ($d_absen=mysqli_fetch_array($s_absen)){
					?>
                        <tr style="background-color: beige;">
                            <td><center><?= $d_absen['tanggal'];?></center></td>
                            <?php 
                                $id_card = $d_absen['card_id'];
                                $kls = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM `data_siswa` WHERE card_id = '$id_card'"));
                            ?>
                            <!-- <td><?= $kls['nis'];?></td>
                            <td><?= $kls['nisn'];?></td> -->
                            <td><?= $d_absen['nama_siswa'];?></td>
                            <td>
                                <?php 
                                    $h_kls = $kls['kelas'];
                                    $c_kelas = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT * FROM `kelas` WHERE id = '$h_kls'"));
                                    echo $c_kelas['kelas'];
                                ?>
                            </td>
                            <td style="background-color: 
                            <?php 
                                if($d_absen['ijin'] == 1) echo "red";
                                else if($d_absen['ijin'] == 2) echo "blue";
                                else echo "orange";
                            ?>; color:black; font-weight:600;">
                                <?php 
                                    if($d_absen['ijin'] == 1) echo "Alpa";
                                    else if($d_absen['ijin'] == 2) echo "Ijin";
                                    else echo "Sakit";
                                ?>
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
