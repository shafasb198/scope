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
$id_materi = $_GET['id_materi'];

if (isset($_POST['edit'])) { 
    include "../../../koneksi.php";

    if ($_POST){
        
        //------------------------------------
        //get id topik
        //------------------------------------

        $ftopik = $_POST['topikmateri'];
        $id_topik= substr($ftopik, 0,7);

        $nama_materi=$_POST['namamateri'];
        $link_video=$_POST['linkvideo'];
        $isi=$_POST['isimateri'];

        if ($_FILES['panduan']['name'])
        {
            move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/panduan_materi/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }
        else{
          $sql = "SELECT file from tb_materi WHERE id_materi='$id_materi'";
          $query = mysqli_query($conn, $sql);
              $data = mysqli_fetch_array($query);
              $filenya = $data['file'];
        }

        


        $sql = "UPDATE tb_materi set id_materi='$id_materi', id_topik='$id_topik', nama_materi='$nama_materi',
        link_video='$link_video', isi='$isi', file='$filenya' WHERE id_materi='$id_materi'";
        $query = mysqli_query($conn, $sql);

        

        if($query){
            echo "<script>alert('Pengeditan Materi Berhasil!');window.location='materi.php';</script>";
        }
        else{
            echo "<script>alert('Pengeditan Materi gagal');window.location='materi.php';</script></script>";
        }
    }
  }

  else{
    header("Location: materi.php"); 
  }
?>