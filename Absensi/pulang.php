<!-- Check Desktop or Version -->
<?php
    $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $isMob = is_numeric(strpos($ua, "mobile"));
    if($isMob) {
        header('location:admin');
    }
    include 'controllers/check_ip.php';
    if(isset($_GET['pesan'])) {
        $pesan = base64_decode($_GET['pesan']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pulang | Aplikasi Absensi SMA Pelita IV</title>
    <link rel="stylesheet" href="style/style_mp.css">
    <?php include 'include/head_public.php';?>
    
</head>
<body>
    <?php include 'include/tenggat_pmasuk.php';?>
    <div class="logo-atas">
        <div class="gambar">
            <a href="menu"><img src="sources/img/logo.webp" alt="Logo SMA Pelita IV"></a>
        </div>
        <div class="text">
            <h1>ABSENSI DIGITAL SMA PELITA IV</h1>
            
        </div>
    </div>
    <h3 class="text-mp">Absensi Pulang</h3>
    <h3 class="jam"><?php include 'include/jam_navbar.php'; ?></h3>
    <h2>Selamat Datang!</h2>
    

    <div class="container-atas">
        <marquee scrollamount="10">Silahkan Tap Kartu Pelajar / Absensi Anda Pada Mesin Yang Telah Disediakan. Jika Ada Masalah Silahkan Menghubungi Petugas. Terima Kasih. Tanggal Hari Ini <?php include 'include/hari_navbar.php';?></marquee>
    </div>

    <div class="input_mp">
        <?php
            if(isset($pesan)){
                ?>
                <div class="box_pesan">
                    <?php echo $pesan; ?>
                    <?php 
                       header('Refresh: 1800; URL=pulang');
                    ?>
                </div>
        <?php
            }
        ?>
        <form method="POST" action="controllers/pulang.php" >
            <input type="text" id="lname" name="card_id" placeholder="Tap Kartu Anda" autofocus=”autofocus”>
        </form>
        
    </div>

    <?php 
        include 'cekk.php';
        if($cam != 'hidden'){
    ?>
        <div class="main">
            <div class="row">
                <div class="column">
                        <img class="qr-code" src="sources/img/contact.png" alt="QR-CODE"><br>
                        <label>bit.ly/contactitsmapat</label>
                </div>
                <div class="column">
                    <div class="box-terakhir">
                            <?php 
                            $s_absen1 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen WHERE tanggal=CURDATE() AND pulang!='NULL' order by pulang DESC limit 2");
                            while ($d_absen=mysqli_fetch_array($s_absen1)){ 
                                $peg=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where card_id = $d_absen[card_id]"));
                                // Kelas
                                $pegs=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kelas where id = $peg[kelas]"));
                            ?>      
                                <div class="box-siswa">
                                    <img src="app/source/foto_siswa/<?= $peg['foto'];?>" alt="Foto_Siswa">
                                    <div class="nama"><?php echo $peg['nama_siswa'];?></div>
                                    <div class="pp"><?php echo $pegs['kelas'];?> - SMA Pelita IV</div>
                                    <div class="pp">Masuk: <?php echo $d_absen['tanggal']?> <?php echo $d_absen['masuk']?></div>
                                    <div class="ppp">Pulang: <?php echo $d_absen['pulang']?></div>
                                </div>
                            <?php
                            }
                            ?>
                    </div>
                </div>
                
                <div class="column">
                    <?php
                        if(mysqli_num_rows($s_absen1)==0) $sip = "camera-null";
                        else if (mysqli_num_rows($s_absen1)==1) $sip = "camera-one";
                        else $sip = "camera";
                    ?>

                    <div class="<?php echo $sip;?>">
                        <?php
                            include 'include_/koneksi.php';
                            $ua = strtolower($_SERVER["HTTP_USER_AGENT"]);
                            $isMob = is_numeric(strpos($ua, "mobile"));
                            $ipaddress = getenv("REMOTE_ADDR") ;

                            if($ipaddress == "::1"){
                                if(!$isMob){

                        ?>
                        <!-- Webcam -->
                        <center><video autoplay="true" id="video-webcam"></video></center>
                        <?php
                                    }
                            } 
                            include 'include/cameras.php';
                        ?>
                    </div>
                </div>

            </div>
        </div>
    <?php
        } 
    else{
    ?>
        <!-- Box -->
        <div class="box-akhirs">
            <div class="kontak">
                <img class="qr" src="sources/img/contact.png" alt="QR-CODE"><br>
                <label>bit.ly/contactitsmapat</label>
            </div>
            <div class="box-terakhirs">
                <?php 
                    $s_absen1 = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from absen WHERE tanggal=CURDATE() AND pulang!='NULL' order by pulang DESC limit 2");
                    while ($d_absen=mysqli_fetch_array($s_absen1)){ 
                        $peg=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where card_id = $d_absen[card_id]"));
                        // Kelas
                        $pegs=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from kelas where id = $peg[kelas]"));
                ?>      
                        <div class="box-siswa">
                            <img src="app/source/foto_siswa/<?= $peg['foto'];?>" alt="Foto_Siswa">
                            <div class="nama"><?php echo $peg['nama_siswa'];?></div>
                            <div class="pp"><?php echo $pegs['kelas'];?> - SMA Pelita IV</div>
                            <div class="pp">Masuk: <?php echo $d_absen['tanggal']?> <?php echo $d_absen['masuk']?></div>
                            <div class="ppp">Pulang: <?php echo $d_absen['pulang']?></div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>  
    <?php
        }
    ?>

    <!-- Box -->
   


    

    <!-- Footer -->
    <div class="footer">
         <?php include 'include/footer.php'; ?>
    </div>
    
</body>
</html>