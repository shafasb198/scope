<?php
session_start();

if (!isset($_SESSION["username"])) {
    echo "<script>alert('Anda Harus Login !!!');</script>";
    echo "<script>location='pages-siswa/user/login.php';</script>";
    exit;
}

$id_akun = $_SESSION['id_akun'];
$nama_siswa = $_SESSION['nama_siswa'];
$id_siswa = $_SESSION['id_siswa'];
$password = $_SESSION['password'];
$foto = $_SESSION['foto'];
$status = $_SESSION['status'];

if (isset($_POST['btn_selesai'])) { 
        include "../../../../koneksi.php";
        if ($_POST){
        
        $id_kuis=$_GET['id_kuis'];
        $opsi1=$_POST['opsi1'];
        $opsi2=$_POST['opsi2'];
        $opsi3=$_POST['opsi3'];
        $opsi4=$_POST['opsi4'];
        $opsi5=$_POST['opsi5'];

        $nilaiakhir=0;

        //===========================================================================================================
        //SOAL 1=====================================================================================================
        //===========================================================================================================
        $getsoal1 = "SELECT * FROM tb_soal JOIN tb_kuis ON tb_soal.id_kuis=tb_kuis.id_kuis
        JOIN tb_opsi ON tb_soal.id_soal=tb_opsi.id_soal
        WHERE tb_kuis.id_kuis='".$id_kuis."' AND tb_soal.nomor='1' AND tb_opsi.status='Benar'";
        $eksekusi1 = mysqli_query($conn, $getsoal1);
        $soal1 = mysqli_fetch_array($eksekusi1);

        if($soal1['opsi']==$opsi1){
          $poin1=20;
        }else{
          $poin1=0;
        }

        $getopsi = "SELECT id_opsi FROM tb_opsi WHERE opsi='".$opsi1."'";
        $eksopsi = mysqli_query($conn, $getopsi);
        $opsinya = mysqli_fetch_array($eksopsi);
        $opsi=$opsinya['id_opsi'];

              $sql = "SELECT MAX(id_jawaban) AS last_id from tb_jawaban LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){$id_jawaban_baru= "JAW000".$text;}
              else if($jumlah<10000){
                if($jumlah>999){$id_jawaban_baru= "JAW".$text;}
                else if($jumlah>99){$id_jawaban_baru= "JAW0".$text;}
                else if($jumlah>9){$id_jawaban_baru= "JAW00".$text;}
              }

              $sql = "INSERT INTO tb_jawaban (id_jawaban, id_siswa, id_soal, id_opsi, poin) VALUES ('$id_jawaban_baru', '$id_siswa',
              '".$soal1["id_soal"]."', '$opsi', '$poin1')";
              $query = mysqli_query($conn, $sql);
        
        //===========================================================================================================
        //SOAL 2=====================================================================================================
        //===========================================================================================================
        $getsoal2 = "SELECT * FROM tb_soal JOIN tb_kuis ON tb_soal.id_kuis=tb_kuis.id_kuis
        JOIN tb_opsi ON tb_soal.id_soal=tb_opsi.id_soal
        WHERE tb_kuis.id_kuis='".$id_kuis."' AND tb_soal.nomor='2' AND tb_opsi.status='Benar'";
        $eksekusi2 = mysqli_query($conn, $getsoal2);
        $soal2 = mysqli_fetch_array($eksekusi2);

        if($soal2['opsi']==$opsi2){
          $poin2=20;
        }else{
          $poin2=0;
        }
        
        $getopsi = "SELECT id_opsi FROM tb_opsi WHERE opsi='".$opsi2."'";
        $eksopsi = mysqli_query($conn, $getopsi);
        $opsinya = mysqli_fetch_array($eksopsi);
        $opsi=$opsinya['id_opsi'];

              $sql = "SELECT MAX(id_jawaban) AS last_id from tb_jawaban LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){$id_jawaban_baru= "JAW000".$text;}
              else if($jumlah<10000){
                if($jumlah>999){$id_jawaban_baru= "JAW".$text;}
                else if($jumlah>99){$id_jawaban_baru= "JAW0".$text;}
                else if($jumlah>9){$id_jawaban_baru= "JAW00".$text;}
              }

              $sql = "INSERT INTO tb_jawaban (id_jawaban, id_siswa, id_soal, id_opsi, poin) VALUES ('$id_jawaban_baru', '$id_siswa',
              '".$soal2["id_soal"]."', '$opsi', '$poin2')";
              $query = mysqli_query($conn, $sql);

        //===========================================================================================================
        //SOAL 3=====================================================================================================
        //===========================================================================================================
        $getsoal3 = "SELECT * FROM tb_soal JOIN tb_kuis ON tb_soal.id_kuis=tb_kuis.id_kuis
        JOIN tb_opsi ON tb_soal.id_soal=tb_opsi.id_soal
        WHERE tb_kuis.id_kuis='".$id_kuis."' AND tb_soal.nomor='3' AND tb_opsi.status='Benar'";
        $eksekusi3 = mysqli_query($conn, $getsoal3);
        $soal3 = mysqli_fetch_array($eksekusi3);

        if($soal3['opsi']==$opsi3){
          $poin3=20;
        }else{
          $poin3=0;
        }

        $getopsi = "SELECT id_opsi FROM tb_opsi WHERE opsi='".$opsi3."'";
        $eksopsi = mysqli_query($conn, $getopsi);
        $opsinya = mysqli_fetch_array($eksopsi);
        $opsi=$opsinya['id_opsi'];

              $sql = "SELECT MAX(id_jawaban) AS last_id from tb_jawaban LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){$id_jawaban_baru= "JAW000".$text;}
              else if($jumlah<10000){
                if($jumlah>999){$id_jawaban_baru= "JAW".$text;}
                else if($jumlah>99){$id_jawaban_baru= "JAW0".$text;}
                else if($jumlah>9){$id_jawaban_baru= "JAW00".$text;}
              }

              $sql = "INSERT INTO tb_jawaban (id_jawaban, id_siswa, id_soal, id_opsi, poin) VALUES ('$id_jawaban_baru', '$id_siswa',
              '".$soal3["id_soal"]."', '$opsi', '$poin3')";
              $query = mysqli_query($conn, $sql);


        //===========================================================================================================
        //SOAL 4=====================================================================================================
        //===========================================================================================================
        $getsoal4 = "SELECT * FROM tb_soal JOIN tb_kuis ON tb_soal.id_kuis=tb_kuis.id_kuis
        JOIN tb_opsi ON tb_soal.id_soal=tb_opsi.id_soal
        WHERE tb_kuis.id_kuis='".$id_kuis."' AND tb_soal.nomor='4' AND tb_opsi.status='Benar'";
        $eksekusi4 = mysqli_query($conn, $getsoal4);
        $soal4 = mysqli_fetch_array($eksekusi4);

        if($soal4['opsi']==$opsi4){
          $poin4=20;
        }else{
          $poin4=0;
        }
        
        $getopsi = "SELECT id_opsi FROM tb_opsi WHERE opsi='".$opsi4."'";
        $eksopsi = mysqli_query($conn, $getopsi);
        $opsinya = mysqli_fetch_array($eksopsi);
        $opsi=$opsinya['id_opsi'];

              $sql = "SELECT MAX(id_jawaban) AS last_id from tb_jawaban LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){$id_jawaban_baru= "JAW000".$text;}
              else if($jumlah<10000){
                if($jumlah>999){$id_jawaban_baru= "JAW".$text;}
                else if($jumlah>99){$id_jawaban_baru= "JAW0".$text;}
                else if($jumlah>9){$id_jawaban_baru= "JAW00".$text;}
              }

              $sql = "INSERT INTO tb_jawaban (id_jawaban, id_siswa, id_soal, id_opsi, poin) VALUES ('$id_jawaban_baru', '$id_siswa',
              '".$soal4["id_soal"]."', '$opsi', '$poin4')";
              $query = mysqli_query($conn, $sql);



        //===========================================================================================================
        //SOAL 5=====================================================================================================
        //===========================================================================================================
        $getsoal5 = "SELECT * FROM tb_soal JOIN tb_kuis ON tb_soal.id_kuis=tb_kuis.id_kuis
        JOIN tb_opsi ON tb_soal.id_soal=tb_opsi.id_soal
        WHERE tb_kuis.id_kuis='".$id_kuis."' AND tb_soal.nomor='5' AND tb_opsi.status='Benar'";
        $eksekusi5 = mysqli_query($conn, $getsoal5);
        $soal5 = mysqli_fetch_array($eksekusi5);

        if($soal5['opsi']==$opsi5){
          $poin5=20;
        }else{
          $poin5=0;
        }
        
        $getopsi = "SELECT id_opsi FROM tb_opsi WHERE opsi='".$opsi5."'";
        $eksopsi = mysqli_query($conn, $getopsi);
        $opsinya = mysqli_fetch_array($eksopsi);
        $opsi=$opsinya['id_opsi'];

              $sql = "SELECT MAX(id_jawaban) AS last_id from tb_jawaban LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){$id_jawaban_baru= "JAW000".$text;}
              else if($jumlah<10000){
                if($jumlah>999){$id_jawaban_baru= "JAW".$text;}
                else if($jumlah>99){$id_jawaban_baru= "JAW0".$text;}
                else if($jumlah>9){$id_jawaban_baru= "JAW00".$text;}
              }

              $sql = "INSERT INTO tb_jawaban (id_jawaban, id_siswa, id_soal, id_opsi, poin) VALUES ('$id_jawaban_baru', '$id_siswa',
              '".$soal5["id_soal"]."', '$opsi', '$poin5')";
              $query = mysqli_query($conn, $sql);

        $nilaiakhir=$poin1+$poin2+$poin3+$poin4+$poin5;

        if($nilaiakhir<80){
          $getsoal = "SELECT * FROM tb_kuis 
            JOIN tb_materi ON tb_materi.id_materi=tb_kuis.id_materi WHERE tb_kuis.id_kuis='".$id_kuis."'";
            $eksekusi = mysqli_query($conn, $getsoal);
            $soal = mysqli_fetch_array($eksekusi);

          $sql = "DELETE FROM tb_jawaban WHERE id_soal='".$soal1["id_soal"]."' AND id_siswa='$id_siswa'";
          $query = mysqli_query($conn, $sql);
          $sql = "DELETE FROM tb_jawaban WHERE id_soal='".$soal2["id_soal"]."' AND id_siswa='$id_siswa'";
          $query = mysqli_query($conn, $sql);
          $sql = "DELETE FROM tb_jawaban WHERE id_soal='".$soal3["id_soal"]."' AND id_siswa='$id_siswa'";
          $query = mysqli_query($conn, $sql);
          $sql = "DELETE FROM tb_jawaban WHERE id_soal='".$soal4["id_soal"]."' AND id_siswa='$id_siswa'";
          $query = mysqli_query($conn, $sql);
          $sql = "DELETE FROM tb_jawaban WHERE id_soal='".$soal5["id_soal"]."' AND id_siswa='$id_siswa'";
          $query = mysqli_query($conn, $sql);
        }else{
          $getsoal = "SELECT * FROM tb_kuis 
            JOIN tb_materi ON tb_materi.id_materi=tb_kuis.id_materi WHERE tb_kuis.id_kuis='".$id_kuis."'";
            $eksekusi = mysqli_query($conn, $getsoal);
            $soal = mysqli_fetch_array($eksekusi);

          $tanggal=date("Y:m:d");
          $sql = "UPDATE tb_ketuntasanmateri set status='Selesai', tanggal='$tanggal' 
          WHERE id_siswa='$id_siswa' AND id_materi='".$soal['id_materi']."'";
          $query = mysqli_query($conn, $sql);

          $getnilai = "SELECT * FROM tb_ketuntasanmateri JOIN tb_nilaimateri
          ON tb_nilaimateri.id_ketuntasanmateri=tb_ketuntasanmateri.id_ketuntasanmateri
          JOIN tb_materi ON tb_materi.id_materi=tb_ketuntasanmateri.id_materi
          JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasanmateri.id_siswa
          WHERE tb_materi.id_materi='".$soal['id_materi']."' AND tb_siswa.id_siswa='$id_siswa'";
            $eksekusinilai = mysqli_query($conn, $getnilai);
            $nilai = mysqli_fetch_array($eksekusinilai);
          
            $sql = "UPDATE tb_nilaimateri set nilai='100' 
          WHERE id_nilaimateri='".$nilai['id_nilaimateri']."'";
          $query = mysqli_query($conn, $sql);
        }

        if($query){

          if($nilaiakhir>79){
          echo "<script>alert('Anda Berhasil Menuntaskan Kuis dengan Nilai ".$nilaiakhir."!');window.location='../detailmateri.php?id_materi=".$soal['id_materi']."&nilai=".$nilaiakhir."';</script>";
          }else{
            echo "<script>alert('Anda Belum Berhasil Menuntaskan Kuis dengan Nilai ".$nilaiakhir."!');window.location='../detailmateri.php?id_materi=".$soal['id_materi']."';</script>";
          }
        }
        else{
            echo "<script>alert('Pembuatan Kuis gagal');window.location='kuis.php?id_materi=".$soal['id_materi']."';</script></script>";
        }
    }
  }

  else{
    header("Location: materi.php"); 
  }
?>