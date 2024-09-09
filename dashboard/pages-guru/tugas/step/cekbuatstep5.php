<?php
if (isset($_POST['btn_selesai'])) { 
    include "../../../../koneksi.php";

    if ($_POST){
        $sql = "SELECT MAX(id_proyekstep) AS last_id from tb_proyekstep LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_proyekstep_baru= "PST000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_proyekstep_baru= "PST".$text;
                }
                else if($jumlah>99){
                  $id_proyekstep_baru= "PST0".$text;
                }
                else if($jumlah>9){
                  $id_proyekstep_baru= "PST00".$text;
                }
              }
          
          
          $sqls = "SELECT MAX(id_proyek) AS last_id from tb_proyek LIMIT 1";
              $querys = mysqli_query($conn, $sqls);

              $datas = mysqli_fetch_array($querys);
              $last_ids = $datas['last_id'];
              
        
        
        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../../dokumen/panduan_proyek/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }
        
        $sql = "INSERT INTO tb_proyekstep (id_proyekstep, nama_step, deskripsi, tgl_mulai, tgl_akhir, id_proyek, file) VALUES ('$id_proyekstep_baru', '{$_POST['namatahapan']}', 
                '{$_POST['deskripsistep']}', '{$_POST['tglawal']}', '{$_POST['tglakhir']}', '$last_ids', '$filenya')";
        $query = mysqli_query($conn, $sql);


        if($query){
          $getjmlstep = "SELECT jumlah_step from tb_proyek WHERE id_proyek='$last_ids'";
          $hasil = mysqli_query($conn, $getjmlstep);

          $baris = mysqli_fetch_array($hasil);
          $jumlahstep = $baris['jumlah_step'];
          if($jumlahstep>5){
            header("Location: buatstep6.php");
          }
          else{
            echo "<script>alert('Berhasil Membuat Tahapan Proyek');window.location='../detailproyek.php?id_proyek=".$last_ids."';</script></script>";
          }
        }
        else{
            echo "<script>alert('Pembuatan Tahapan Proyek Gagal');window.location='buatstep5.php';</script></script>";
        }
    }
  }

  else{
    header("Location: ../tugas.php"); 
  }
?>