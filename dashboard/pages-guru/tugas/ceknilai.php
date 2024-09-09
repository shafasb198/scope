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
$id_ketuntasantugas= $_GET['id_ketuntasantugas'];


if (isset($_POST['kirim'])) { 
    include "../../../koneksi.php";

    if ($_POST){                     

        $nilai=$_POST['nilai'];
        $sql = "UPDATE tb_nilaitugas SET nilai='$nilai' WHERE id_ketuntasantugas='$id_ketuntasantugas'";
        $query = mysqli_query($conn, $sql);


        if($query){
            $getsiswa = "SELECT tb_tugas.id_tugas FROM tb_tugas JOIN tb_ketuntasantugas
            ON tb_tugas.id_tugas=tb_ketuntasantugas.id_tugas WHERE tb_ketuntasantugas.id_ketuntasantugas='".$id_ketuntasantugas."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                                $id_tugas=$data['id_tugas'];
                            }}
            echo "<script>alert('Berhasil Memberi Nilai!');window.location='detailtugas.php?id_tugas=".$id_tugas."';</script>";
        }
        else{
            $getsiswa = "SELECT * FROM tb_tugas JOIN tb_ketuntasantugas
            ON tb_tugas.id_tugas=tb_ketuntasantugas.id_tugas WHERE tb_ketuntasantugas.id_ketuntasantugas='".$id_ketuntasantugas."'";
                          $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);
                              
                            if($hasil>0){
                              while($data = mysqli_fetch_array($eks)){
                                $id_tugas=$data['id_tugas'];
                                $id_siswa=$data['id_siswa'];
                              }}
            echo "<script>alert('Pemberian Nilai gagal');window.location='detailtugassiswa.php?id_tugas=".$id_tugas."& id_siswa=".$id_siswa."';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>