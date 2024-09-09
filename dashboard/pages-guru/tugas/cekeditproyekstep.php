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
$id_proyekstep = $_GET['id_proyekstep'];


if (isset($_POST['edit'])) { 
    include "../../../koneksi.php";

    if ($_POST){   

        $nama=$_POST['namaproyek'];
        $deskripsi=$_POST['deskripsiproyek'];
        $tgl_mulai=$_POST['tanggalawal'];
        $tgl_akhir=$_POST['tanggalakhir'];

        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/panduan_proyek/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }


        $sql = "UPDATE tb_proyekstep SET id_proyekstep='$id_proyekstep', nama_step='$nama', 
        deskripsi='$deskripsi', tgl_mulai='$tgl_mulai', tgl_akhir='$tgl_akhir', file='$filenya'  WHERE id_proyekstep='$id_proyekstep'";
        $query = mysqli_query($conn, $sql);


        if($query){
            $getsiswa = "SELECT tb_proyek.id_proyek FROM tb_proyek JOIN tb_proyekstep
            ON tb_proyek.id_proyek=tb_proyekstep.id_proyek WHERE tb_proyekstep.id_proyekstep='".$id_proyekstep."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                                $id_proyek=$data['id_proyek'];
                            }}
            echo "<script>alert('Berhasil Mengedit Tahapan Proyek!');window.location='editproyek.php?id_proyek=".$id_proyek."';</script>";
        }
        else{
            echo "<script>alert('Pengeditan Tugas Tahapan Proyek');window.location='tugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>