<?php
if (isset($_POST['btn_lanjutkan'])) { 
    include "../../../koneksi.php";

    if ($_POST){
        $sql = "SELECT MAX(id_proyek) AS last_id from tb_proyek LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_proyek_baru= "PRO000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_proyek_baru= "PRO".$text;
                }
                else if($jumlah>99){
                  $id_proyek_baru= "PRO0".$text;
                }
                else if($jumlah>9){
                  $id_proyek_baru= "PRO00".$text;
                }
              }

        $sql = "INSERT INTO tb_proyek (id_proyek, nama_proyek, deskripsi_proyek, jumlah_step, jumlah_kelompok, status) VALUES ('$id_proyek_baru', '{$_POST['namaproyek']}', 
                '{$_POST['deskripsiproyek']}', '{$_POST['jumlahstep']}', '{$_POST['jumlahkelompok']}', 'Belum Selesai')";
        $query = mysqli_query($conn, $sql);


        if($query){
            echo "<script>alert('Pembuatan Proyek Berhasil! Lanjutkan membuat tahapan proyek!');window.location='step/buatstep1.php';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Proyek gagal');window.location='buatproyek.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>