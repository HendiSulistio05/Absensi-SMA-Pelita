<!-- Cek Login -->
<?php
	include '../include/cek_login.php';
	include '../include/cek_for_desktop.php';
	include '../include_/koneksi.php';
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Siswa Ijin.xls");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Buku SMA Pelita IV</title>
</head>
<body>
    <?php $start_date =  $_GET['start_date']; 
          $end_date = $_GET['end_date'];  ?>
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
                        <tr>
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
                            <td style="background-color: beige; color:black; font-weight:600;">
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
                
</body>
</html> 
