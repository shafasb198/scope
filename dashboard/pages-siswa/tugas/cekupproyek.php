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
$id_ketuntasanproyek = $_GET['id_ketuntasanproyek'];
$id_kelompok = $_GET['id_kelompok'];


if (isset($_POST['btn_upload'])) { 
    include "../../../koneksi.php";

    if ($_POST){  
      


        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/hasil_proyek/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }

        $tgl=date('Y-m-d');

        $sql = "UPDATE tb_ketuntasanproyek SET file='$filenya', tgl_pengumpulan='$tgl', status='Selesai' WHERE id_ketuntasanproyek='$id_ketuntasanproyek'";
        $query = mysqli_query($conn, $sql);

        $getidpro = "SELECT tb_proyek.id_proyek, tb_proyekstep.id_proyekstep FROM tb_proyekstep JOIN tb_proyek
        ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
        JOIN tb_ketuntasanproyek ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
        WHERE tb_ketuntasanproyek.id_ketuntasanproyek='".$id_ketuntasanproyek."'";
                $hasil = mysqli_query($conn, $getidpro);
                $hasilnya = mysqli_fetch_array($hasil);
                $idnya=$hasilnya['id_proyek'];
        
        $sql = "SELECT tb_proyek.jumlah_step, tb_proyek.jumlah_kelompok, COUNT(tb_ketuntasanproyek.status) as tuntas from tb_proyek
        JOIN tb_proyekstep ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
        JOIN tb_ketuntasanproyek ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
        WHERE tb_proyek.id_proyek='".$idnya."' AND tb_ketuntasanproyek.status='Selesai'";
                $query = mysqli_query($conn, $sql);

                $data = mysqli_fetch_array($query);
                $sstep = $data['jumlah_step'];
                $step = (int)$sstep;
                $sklp = $data['jumlah_kelompok'];
                $klp = (int)$sklp;
                
                $angka=$step*$klp;
                $tuntas=(int)$data['tuntas'];

                if($angka==$tuntas){
                  $sql = "UPDATE tb_proyek SET status='Selesai' WHERE id_proyek='$idnya'";
                  $query = mysqli_query($conn, $sql);
                }


        if($query){
            echo "<script>alert('Berhasil Menunggah File!');window.location='detailtahapan.php?id_proyekstep=".$hasilnya['id_proyekstep']."& id_kelompok=".$id_kelompok."';</script>";
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