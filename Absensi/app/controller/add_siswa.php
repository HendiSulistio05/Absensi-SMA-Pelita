<?php
    // session_start();
    include '../include_/koneksi.php';

    $card_id = $_POST['card_id'];
    $nama_siswa = $_POST['nama_siswa'];
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $agama = $_POST['agama'];
    $photo = $_POST['file'];

    // $photo =  basename($_FILES['file']); //ubah nama file
    // $photo = basename( $_FILES['file']['name']); 
    // $target = "../source/foto_siswa/$photo"; //Tempat file

    //This code writes the photo to the server//
    //--------------------------------Photo 1----------------------------
    // move_uploaded_file($_FILES['file']['name'], $target);
    //identitas file asli

    $s_pelanggan= mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from data_siswa where card_id='$card_id'");
    $cek = mysqli_num_rows($s_pelanggan);

    if($cek == 0){
        $sql = "INSERT INTO data_siswa (card_id, nama_siswa, nis, nisn, kelas, jenis_kelamin, no_telp, email, agama, status, foto) VALUES ('$card_id', '$nama_siswa', '$nis', '$nisn', '$kelas', '$jenis_kelamin', '$no_telp', '$email', '$agama', '1', '$photo')";
        $prosess = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        if ($prosess) {
            header('location:../data_siswa');
            echo "Data Berhasil!!"; 
            exit();
        } 
        else { 
            echo "Data belum dapat di simpan!!"; 
            exit();
        }
    }
    else{
        echo "Card_id Sudah Terdaftar";
    } 
?>