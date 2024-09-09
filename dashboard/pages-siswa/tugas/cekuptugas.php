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
$id_ketuntasantugas = $_GET['id_ketuntasantugas'];


if (isset($_POST['btn_upload'])) { 
    include "../../../koneksi.php";

    if ($_POST){  
      


        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/hasil_tugas/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }

        $tgl=date('Y-m-d');

        $sql = "UPDATE tb_ketuntasantugas SET status='Selesai', file='$filenya', tanggal='$tgl' WHERE id_ketuntasantugas='$id_ketuntasantugas'";
        $query = mysqli_query($conn, $sql);

        $gettuntas = "SELECT COUNT(tb_ketuntasantugas.id_ketuntasantugas) as tuntas
        FROM tb_tugas JOIN tb_ketuntasantugas ON tb_ketuntasantugas.id_tugas=tb_tugas.id_tugas 
        WHERE tb_tugas.id_tugas='".$id_tugas."' AND tb_ketuntasantugas.status='Selesai'";
                $hasil = mysqli_query($conn, $gettuntas);
                $hasilnya = mysqli_fetch_array($hasil);
                $tuntas=$hasilnya['tuntas'];
        
        $sql = "SELECT COUNT(id_siswa) as jml_siswa FROM tb_siswa";
                $query = mysqli_query($conn, $sql);

                $data = mysqli_fetch_array($query);
                $jml = $data['jml_siswa'];
                $jumlah = (int)$jml;
                
                $ketuntasan=$tuntas;

                if($jumlah==$ketuntasan){
                  $sql = "UPDATE tb_tugas SET status='Selesai' WHERE id_tugas='".$id_tugas."'";
                  $query = mysqli_query($conn, $sql);
                }


        if($query){
            echo "<script>alert('Berhasil Menunggah File!');window.location='detailtugas.php?id_tugas=".$id_tugas."';</script>";
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