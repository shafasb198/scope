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
$id_komentar = $_GET['id_komentarproyek'];


if (isset($_POST['kirim'])) { 
    include "../../../koneksi.php";

    if ($_POST){                     

        $sql = "SELECT MAX(id_balasanproyek) AS last_id from tb_balasanproyek LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_balasan_baru= "BLP000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_balasan_baru= "BLP".$text;
                }
                else if($jumlah>99){
                  $id_balasan_baru= "BLP0".$text;
                }
                else if($jumlah>9){
                  $id_balasan_baru= "BLP00".$text;
                }
              }
        $tanggal=date("Y:m:d");

        $sql = "INSERT INTO tb_balasanproyek (id_balasanproyek, id_komentarproyek, isi_balasanproyek, tanggal, id_guru) VALUES ('$id_balasan_baru', '$id_komentar', '{$_POST['balaskomentar']}', '$tanggal', '$id_guru')";
        $query = mysqli_query($conn, $sql);


        if($query){
          $getsiswa = "SELECT tb_proyek.id_proyek FROM tb_proyek JOIN tb_proyekstep
          ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
          JOIN tb_komentarproyek ON tb_proyekstep.id_proyekstep=tb_komentarproyek.id_proyekstep WHERE tb_komentarproyek.id_komentarproyek='".$id_komentar."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                                $id_proyek=$data['id_proyek'];
                            }}
            echo "<script>alert('Berhasil Mengirimkan balasan komentar!');window.location='detailproyek.php?id_proyek=".$id_proyek."';</script>";
        }
        else{
            echo "<script>alert('Pengiriman balasan komentar gagal');window.location='tugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>