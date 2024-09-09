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
$id_proyekstep = $_GET['id_proyekstep'];
$id_kelompok = $_GET['id_kelompok'];


if (isset($_POST['btn_komen'])) { 
    include "../../../koneksi.php";

    if ($_POST){
      

        $sql = "SELECT MAX(id_komentarproyek) AS last_id from tb_komentarproyek LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_komen_baru= "KMP000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_komen_baru= "KMP".$text;
                }
                else if($jumlah>99){
                  $id_komen_baru= "KMP0".$text;
                }
                else if($jumlah>9){
                  $id_komen_baru= "KMP00".$text;
                }
              }

        $tgl=date('Y-m-d');

        $sql = "INSERT INTO tb_komentarproyek (id_komentarproyek, id_proyekstep, id_siswa, isi_komentarproyek, tanggal) 
        VALUES ('$id_komen_baru', '$id_proyekstep', '$id_siswa', '{$_POST['komentar']}', '$tgl')";
        $query = mysqli_query($conn, $sql);


       

        if($query){
          echo "<script>alert('Berhasil Menunggah File!');window.location='detailtahapan.php?id_proyekstep=".$id_proyekstep."& id_kelompok=".$id_kelompok."';</script>";
      }
      else{
          echo "<script>alert('Gagal Menunggah File');window.location='tugas.php';</script></script>";
      }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>