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
	<!-- <link rel="stylesheet" href="style/style_home.css"> -->
</head>
<body>
	<!-- Sidebar -->
    <?php include 'include/sidebar_desktop.php';?>

    <div class="main">
        <div class="row">
            <a href="data_siswa" class="column" style="background-color: red;">Refresh</a>
            <a href="tambah_siswa" class="column" style="background-color: #32cd32;">Tambah Siswa</a>
            <!-- <a class="column" style="background-color: #99bcf6;">Download PDF</a> -->
            <a target="_blank" href="export/data_siswa.php" class="column" style="background-color: #ec0f92;">Download EXCEL</a>
        </div>

        <div class="box">
            <table class="text">
                <thead>
                    <tr>
                        <th class="act">Action</th>
                        <th>Card ID</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>STATUS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
						$s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM data_siswa order by kelas ASC,  status ASC");
						while ($d_absen=mysqli_fetch_array($s_absen)){
					?>
                        <tr style="background-color: beige;">
                            <td>
                            <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3 || $_SESSION['level'] == 4){
                            ?>
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <img src="source/icon/icon_caret_down.png" alt="">
                                    </button>
                                    <div class="dropdown-content">
                                        <a href="data_siswa_edit?id=<?= $d_absen['card_id'];?>" >Edit</a></li>
                                        <a href="data_siswa_detail?id=<?= base64_encode($d_absen['card_id']);?>" >Detail</a></li>

                                        <!-- Nonaktifkan -->
                                        <a href="controller/nonaktifkan_data_siswa?id=<?= $d_absen['card_id'];?>" onclick="return confirm('Apakah Siswa dengan Card ID <?= $d_absen['card_id']?> akan dinonaktifkan ?')">Nonaktifkan</a>

                                        <!-- Hapus -->
                                        <a href="controller/hapus_data_siswa?id=<?= $d_absen['card_id'];?>" onclick="return confirm('Apakah Siswa dengan Card ID <?= $d_absen['card_id']?> akan dihapus ?')">Hapus</a>

                                        
                                    </div>
                                </div>
                                <?php
                                }?>
                            </td>
                            <td><?= $d_absen['card_id'];?></td>
                            <td><?= $d_absen['nis'];?></td>
                            <td><?= $d_absen['nisn'];?></td>
                            <td><?= $d_absen['nama_siswa'];?></td>
                            <td>
                                <?php 
                                    $kelas = $d_absen['kelas'];
                                    $d_kelas = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kelas WHERE id = $kelas"));
                                    echo $d_kelas['kelas'];
                                ?>
                            </td>
                            <td style="background-color: <?php echo $d_absen['status']==1 ? 'green' : 'red'  ?>; color:white;">
                                <?php 
                                    if($d_absen['status']==1) echo "Aktif";
                                    else echo "Dinonaktifkan";
                                ?>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
   
</body>
</html> 
