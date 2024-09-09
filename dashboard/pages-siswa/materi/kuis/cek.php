<?php
session_start();

if (!isset($_SESSION["username"])) {
    echo "<script>alert('Anda Harus Login !!!');</script>";
    echo "<script>location='pages-siswa/user/login.php';</script>";
    exit;
}

$id_akun = $_SESSION['id_akun'];
$nama_siswa = $_SESSION['nama_siswa'];
$id_siswa = $_SESSION['id_siswa'];
$password = $_SESSION['password'];
$foto = $_SESSION['foto'];
$status = $_SESSION['status'];

if (isset($_POST['btn_selesai'])) { 
    include "../../../../koneksi.php";
    if ($_POST){
    
    $id_kuis=$_GET['id_kuis'];
      $i=1;
      while($i<6){
        if ($i==1){
          $soal=$_POST['soal1'];
        }else if ($i==2){
          $soal=$_POST['soal2'];
        }else if ($i==3){
          $soal=$_POST['soal3'];
        }else if ($i==4){
          $soal=$_POST['soal4'];
        }else if ($i==5){
          $soal=$_POST['soal5'];
        }
        echo $soal;

        $i=$i+1;
      }

    

        


       

        
    }
  }

  else{
    header("Location: kuis.php"); 
  }
?>