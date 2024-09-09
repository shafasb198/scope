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
$id_tugas = $_GET['id_tugas'];


if (isset($_POST['edit'])) { 
    include "../../../koneksi.php";

    if ($_POST){   


        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/panduan_tugas/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }

        $ftopik = $_POST['topiktugas'];
        if($ftopik="Konsep Website"){
          $id_topik="TPK0001";
        }
        else if($ftopik="Pengembangan Frontend"){
          $id_topik="TPK0002";
        }
        else if($ftopik="Pengembangan Backend"){
          $id_topik="TPK0003";
        }
        else if($ftopik="Integrasi Website"){
          $id_topik="TPK0004";
        }

        $nama=$_POST['namatugas'];
        $deskripsi=$_POST['deskripsitugas'];
        $deadline=$_POST['deadlinetugas'];


        $sql = "UPDATE tb_tugas SET id_tugas='$id_tugas', nama_tugas='$nama', id_topik='$id_topik', 
        deskripsi='$deskripsi', file='$filenya', deadline='$deadline' WHERE id_tugas='$id_tugas'";
        $query = mysqli_query($conn, $sql);


        if($query){
            echo "<script>alert('Berhasil Mengedit Tugas!');window.location='tugas.php';</script>";
        }
        else{
            echo "<script>alert('Pengeditan Tugas gagal');window.location='tugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>