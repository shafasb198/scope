<?php

session_start();

if (!isset($_SESSION["username"])) {
    echo "<script>alert('Anda Harus Login !!!');</script>";
    echo "<script>location='../user/login.php';</script>";
    exit;
}

$id_akun = $_SESSION['id_akun'];
$nama_guru = $_SESSION['nama_guru'];
$id_guru = $_SESSION['id_guru'];
$password = $_SESSION['password'];
$foto = $_SESSION['foto'];
$nip = $_SESSION['nip'];
$status = $_SESSION['status'];
$id_komentar = $_GET['id_komentartugas'];


if (isset($_POST['kirim'])) { 
    include "../../../koneksi.php";

    if ($_POST){                     

        $sql = "SELECT MAX(id_balasantugas) AS last_id from tb_balasantugas LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_balasan_baru= "BLT000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_balasan_baru= "BLT".$text;
                }
                else if($jumlah>99){
                  $id_balasan_baru= "BLT0".$text;
                }
                else if($jumlah>9){
                  $id_balasan_baru= "BLT00".$text;
                }
              }
        $tanggal=date("Y:m:d");

        $sql = "INSERT INTO tb_balasantugas (id_balasantugas, isi_balasantugas, id_komentartugas, tanggal, id_guru) VALUES ('$id_balasan_baru', '{$_POST['balaskomentar']}', '$id_komentar', '$tanggal', '$id_guru')";
        $query = mysqli_query($conn, $sql);


        if($query){
          $getsiswa = "SELECT tb_tugas.id_tugas FROM tb_tugas 
          JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas WHERE tb_komentartugas.id_komentartugas='".$id_komentar."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                                $id_tugas=$data['id_tugas'];
                            }}
            echo "<script>alert('Berhasil Mengirimkan balasan komentar!');window.location='detailtugas.php?id_tugas=".$id_tugas."';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Proyek gagal ".$id_balasan_baru.",".$id_komentar.",".$_POST['balaskomentar'].",".$id_guru."');window.location='tugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>