<?php
if (isset($_POST['btn_buatsoal'])) { 
    include "../../../../koneksi.php";

    if ($_POST){
        $id_kuis=$_GET['id_kuis'];
        $getidmat = "SELECT id_materi from tb_kuis WHERE id_kuis='".$id_kuis."'";
              $queryy = mysqli_query($conn, $getidmat);
              $dataid = mysqli_fetch_array($queryy);
              $idmateri = $dataid['id_materi'];
        
        
        $i=1;
        
        while($i<6){  
          if($i==1){
            $soal=$_POST['soal1'];
            $benar=$_POST['benar1'];
          }else if($i==2){
            $soal=$_POST['soal2'];
            $benar=$_POST['benar2'];
          }else if($i==3){
            $soal=$_POST['soal3'];
            $benar=$_POST['benar3'];
          }else if($i==4){
            $soal=$_POST['soal4'];
            $benar=$_POST['benar4'];
          }else if($i==5){
            $soal=$_POST['soal5'];
            $benar=$_POST['benar5'];
          }   
          //------------------------------------
          //save to tb_soal
          //------------------------------------
              $sql = "SELECT MAX(id_soal) AS last_id from tb_soal LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_soal_baru= "SOA000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_soal_baru= "SOAUI".$text;
                }
                else if($jumlah>99){
                  $id_soal_baru= "SOA0".$text;
                }
                else if($jumlah>9){
                  $id_soal_baru= "SOA00".$text;
                }
              }

              $sql = "INSERT INTO tb_soal (id_soal, id_kuis, nomor, isi_soal) VALUES ('$id_soal_baru', '$id_kuis', '$i', '$soal')";
              $query = mysqli_query($conn, $sql); 

              
              $sql = "SELECT MAX(id_opsi) AS last_id from tb_opsi LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_opsi_baru= "OPS000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_opsi_baru= "OPSUI".$text;
                }
                else if($jumlah>99){
                  $id_opsi_baru= "OPS0".$text;
                }
                else if($jumlah>9){
                  $id_opsi_baru= "OPS00".$text;
                }
              }

              $sql = "INSERT INTO tb_opsi (id_opsi, id_soal, opsi, status) VALUES ('$id_opsi_baru', '$id_soal_baru', '$benar', 'Benar')";
              $query = mysqli_query($conn, $sql); 

              $iterasi=0;
              while($iterasi<4){
                if($i==1){
                  if($iterasi==0){
                    $salah=$_POST['salah1a'];
                  }else if($iterasi==1){
                    $salah=$_POST['salah1b'];
                  }else if($iterasi==2){
                    $salah=$_POST['salah1c'];
                  }else if($iterasi==3){
                    $salah=$_POST['salah1d'];
                  }
                }else if($i==2){
                  if($iterasi==0){
                    $salah=$_POST['salah2a'];
                  }else if($iterasi==1){
                    $salah=$_POST['salah2b'];
                  }else if($iterasi==2){
                    $salah=$_POST['salah2c'];
                  }else if($iterasi==3){
                    $salah=$_POST['salah2d'];
                  }
                }else if($i==3){
                  if($iterasi==0){
                    $salah=$_POST['salah3a'];
                  }else if($iterasi==1){
                    $salah=$_POST['salah3b'];
                  }else if($iterasi==2){
                    $salah=$_POST['salah3c'];
                  }else if($iterasi==3){
                    $salah=$_POST['salah3d'];
                  }
                }else if($i==4){
                  if($iterasi==0){
                    $salah=$_POST['salah4a'];
                  }else if($iterasi==1){
                    $salah=$_POST['salah4b'];
                  }else if($iterasi==2){
                    $salah=$_POST['salah4c'];
                  }else if($iterasi==3){
                    $salah=$_POST['salah4d'];
                  }
                }else if($i==5){
                  if($iterasi==0){
                    $salah=$_POST['salah5a'];
                  }else if($iterasi==1){
                    $salah=$_POST['salah5b'];
                  }else if($iterasi==2){
                    $salah=$_POST['salah5c'];
                  }else if($iterasi==3){
                    $salah=$_POST['salah5d'];
                  }
                }
                
                $sql = "SELECT MAX(id_opsi) AS last_id from tb_opsi LIMIT 1";
                $query = mysqli_query($conn, $sql);

                $data = mysqli_fetch_array($query);
                $last_id = $data['last_id'];
                $potong = substr($last_id, 3);
                $number = (int)$potong;
                $jumlah = $number+1;
                $text= (string)$jumlah;
                if($jumlah<10){
                  $id_opsi_baru= "OPS000".$text;
                }
                else if($jumlah<10000){
                  if($jumlah>999){
                    $id_opsi_baru= "OPSUI".$text;
                  }
                  else if($jumlah>99){
                    $id_opsi_baru= "OPS0".$text;
                  }
                  else if($jumlah>9){
                    $id_opsi_baru= "OPS00".$text;
                  }
                }

                $sql = "INSERT INTO tb_opsi (id_opsi, id_soal, opsi, status) VALUES ('$id_opsi_baru', '$id_soal_baru', '$salah', 'Salah')";
                $query = mysqli_query($conn, $sql); 

                $iterasi=$iterasi+1;

              }

            $i=$i+1;

        }

        

        

       

        if($query){
            echo "<script>alert('Pembuatan Kuis Berhasil!');window.location='../detailmateri.php?id_materi=".$idmateri."';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Kuis gagal');window.location='buatkuis.php?id_materi=".$idmateri."';</script></script>";
        }
    }
  }

  else{
    header("Location: materi.php"); 
  }
?>