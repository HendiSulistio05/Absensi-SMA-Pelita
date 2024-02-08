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
    <?php if($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3 || $_SESSION['level'] == 4){
    ?>
        <div class="main">
            <div class="row">
                <a href="input_absen" class="column" style="background-color: red;">Refresh</a>
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
                            $s_absen = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where card_id not in (SELECT card_id from absen where tanggal=CURDATE()) and status=1 order by kelas ASC;");
                            while ($d_absen=mysqli_fetch_array($s_absen)){
                        ?>
                            <tr style="background-color: beige;">
                                <td>
                                    <div class="dropdown">
                                        <button class="dropbtn">
                                            <a style="text-align: center;" href="controller/masuk_siswa?id=<?= base64_encode($d_absen['card_id'])?>">Masuk</a>
                                        </button>
                                        
                                    </div>
                                    
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
                                        if($d_absen['status'] == 1) echo "Aktif";
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
    <?php
    } else header('location:../app/home');?>

    
   
</body>
</html> 
