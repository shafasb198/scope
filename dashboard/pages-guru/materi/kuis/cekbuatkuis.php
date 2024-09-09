<?php
if (isset($_POST['btn_buatkuis'])) { 
    include "../../../../koneksi.php";

    if ($_POST){
        $id_materi=$_GET['id_materi'];

        $sql = "SELECT MAX(id_kuis) AS last_id from tb_kuis LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_kuis_baru= "KUI000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_kuis_baru= "KUI".$text;
                }
                else if($jumlah>99){
                  $id_kuis_baru= "KUI0".$text;
                }
                else if($jumlah>9){
                  $id_kuis_baru= "KUI00".$text;
                }
              }
        
        //------------------------------------
        //save to tb_kuis
        //------------------------------------


        $sql = "INSERT INTO tb_kuis (id_kuis, id_materi) VALUES ('$id_kuis_baru', '$id_materi')";
        $query = mysqli_query($conn, $sql);


       

        if($query){
          header("Location: buatsoal.php?id_kuis=".$id_kuis_baru);
        }
        else{
            echo "<script>alert('Pembuatan Kuis gagal');window.location='buatkuis.php?id_materi=".$id_materi."';</script></script>";
        }
    }
  }

  else{
    header("Location: materi.php"); 
  }
?>