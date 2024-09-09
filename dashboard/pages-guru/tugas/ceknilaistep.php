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
$id_ketuntasanproyek= $_GET['id_ketuntasanproyek'];


if (isset($_POST['kirim'])) { 
    include "../../../koneksi.php";

    if ($_POST){                     

        $nilai=$_POST['nilai'];
        $sql = "UPDATE tb_nilaistep SET nilai='$nilai' WHERE id_ketuntasanproyek='$id_ketuntasanproyek'";
        $query = mysqli_query($conn, $sql);


        if($query){
            $getsiswa = "SELECT tb_proyek.id_proyek FROM tb_proyek JOIN tb_proyekstep
            ON tb_proyek.id_proyek=tb_proyekstep.id_proyek 
            JOIN tb_ketuntasanproyek ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
            WHERE tb_ketuntasanproyek.id_ketuntasanproyek='".$id_ketuntasanproyek."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                                $id_proyek=$data['id_proyek'];
                            }}
            echo "<script>alert('Berhasil Memberi Nilai Proyek!');window.location='detailproyek.php?id_proyek=".$id_proyek."';</script>";
        }
        else{
            echo "<script>alert('Pemberian Nilai Proyek gagal');window.location='tugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>