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
$id_tugas = $_GET['id_tugas'];


if (isset($_POST['btn_komen'])) { 
    include "../../../koneksi.php";

    if ($_POST){
      

        $sql = "SELECT MAX(id_komentartugas) AS last_id from tb_komentartugas LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_komen_baru= "KMT000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_komen_baru= "KMT".$text;
                }
                else if($jumlah>99){
                  $id_komen_baru= "KMT0".$text;
                }
                else if($jumlah>9){
                  $id_komen_baru= "KMT00".$text;
                }
              }

        $tgl=date('Y-m-d');

        $sql = "INSERT INTO tb_komentartugas (id_komentartugas, isi_komentartugas, id_siswa, id_tugas, tanggal) 
        VALUES ('$id_komen_baru', '{$_POST['komentar']}', '$id_siswa', '$id_tugas', '$tgl')";
        $query = mysqli_query($conn, $sql);


       

        if($query){
          echo "<script>alert('Berhasil Mengirim Komentar!');window.location='detailtugas.php?id_tugas=".$id_tugas."';</script>";
      }
      else{
          echo "<script>alert('Gagal Mengirim Komentar');window.location='tugas.php';</script></script>";
      }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>