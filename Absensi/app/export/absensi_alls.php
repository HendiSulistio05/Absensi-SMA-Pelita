<!-- Cek Login -->
<?php
	include '../include/cek_login.php';
	include '../include/cek_for_desktop.php';
	include '../include_/koneksi.php';
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Absensi Siswa.xls");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Buku SMA Pelita IV</title>
</head>
<body>
<table class="text">
                <?php
                    $start_date =  $_GET['start_date']; 
                    $end_date =  $_GET['end_date']; 
                ?>
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
                            $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT absen.nama_siswa, absen.tanggal, absen.masuk, absen.pulang, absen.status as absen_masuk, absen.card_id FROM absen, data_siswa where absen.card_id = data_siswa.card_id AND tanggal between '$start_date' AND '$end_date' AND ijin IS NULL ORDER BY kelas ASC, nama_siswa ASC, tanggal ASC");
                            while ($d_absen=mysqli_fetch_array($s_absen)){
                        ?>
                            <tr>
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
   
</body>
</html> 
