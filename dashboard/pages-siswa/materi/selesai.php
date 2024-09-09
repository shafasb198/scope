<?php

session_start();

if (!isset($_SESSION["username"])) {
    echo "<script>alert('Anda Harus Login !!!');</script>";
    echo "<script>location='../user/login.php';</script>";
    exit;
}

$id_akun = $_SESSION['id_akun'];
    $nama_siswa = $_SESSION['nama_siswa'];
    $id_siswa = $_SESSION['id_siswa'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $status = $_SESSION['status'];
    $id_materi = $_GET['id_materi'];

if (isset($_POST['selesai'])) { 
    include "../../../koneksi.php";

    if ($_POST){

        $tgl=date('Y-m-d');


        $sql = "UPDATE tb_ketuntasanmateri set status='Selesai', tanggal='$tgl'
        WHERE id_materi='$id_materi' AND id_siswa='$id_siswa'";
        $query = mysqli_query($conn, $sql);

        

        if($query){
            echo "<script>alert('Berhasil Manuntaskan Materi!');window.location='materi.php';</script>";
        }
        else{
            echo "<script>alert('Pengeditan Materi gagal');window.location='materi.php';</script></script>";
        }
    }
  }

  else{
    header("Location: materi.php"); 
  }
?>