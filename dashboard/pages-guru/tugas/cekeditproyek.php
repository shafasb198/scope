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
$id_proyek = $_GET['id_proyek'];


if (isset($_POST['edit'])) { 
    include "../../../koneksi.php";

    if ($_POST){   

        $nama=$_POST['namaproyek'];
        $deskripsi=$_POST['deskripsiproyek'];


        $sql = "UPDATE tb_proyek SET id_proyek='$id_proyek', nama_proyek='$nama', 
        deskripsi_proyek='$deskripsi' WHERE id_proyek='$id_proyek'";
        $query = mysqli_query($conn, $sql);


        if($query){
            echo "<script>alert('Berhasil Mengedit Proyek!');window.location='detailproyek.php?id_proyek=".$id_proyek."';</script>";
        }
        else{
            echo "<script>alert('Pengeditan Tugas Proyek');window.location='tugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>