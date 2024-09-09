<?php
if (isset($_POST['btn_lanjutkan'])) { 
    include "../../../../koneksi.php";

    if ($_POST){

      $idpro=$_GET["id_proyek"];
      $getjmlklp = "SELECT jumlah_kelompok from tb_proyek WHERE id_proyek='".$_GET["id_proyek"]."'";
      $hasil = mysqli_query($conn, $getjmlklp);
      $baris = mysqli_fetch_array($hasil);
      $jumlahklp = $baris['jumlah_kelompok'];

      $sql = "SELECT MAX(id_kelompok) AS last_id from tb_kelompok LIMIT 1";
      $query = mysqli_query($conn, $sql);
      $data = mysqli_fetch_array($query);
      $last_id = $data['last_id'];
      $potong = substr($last_id, 3);
      $number = (int)$potong;

              if($jumlahklp==1){
              $jumlah = $number+1;
              $text= (string)$jumlah;
                if($jumlah<10){
                  $idklp1= "KLP000".$text;
                }
                else if($jumlah<10000){
                    if($jumlah>999){
                      $idklp1= "KLP".$text;
                    }
                    else if($jumlah>99){
                      $idklp1= "KLP0".$text;
                    }
                    else if($jumlah>9){
                      $idklp1= "KLP00".$text;
                    }
                }
              }
              if($jumlahklp==2){
                $jumlah = $number+1;
                $jumlahh = $number+2;
                $text= (string)$jumlah;
                $textt= (string)$jumlahh;
                  if($jumlah<10){
                    $idklp1= "KLP000".$text;
                    $idklp2= "KLP000".$textt;
                  }
                  else if($jumlah<10000){
                      if($jumlah>999){
                        $idklp1= "KLP".$text;
                      }
                      else if($jumlah>99){
                        $idklp1= "KLP0".$text;
                      }
                      else if($jumlah>9){
                        $idklp1= "KLP00".$text;
                      }
                  }
                  
                  if($jumlahh<10){
                    $idklp2= "KLP000".$textt;
                  }
                  else if($jumlahh<10000){
                      if($jumlahh>999){
                        $idklp2= "KLP".$textt;
                      }
                      else if($jumlahh>99){
                        $idklp2= "KLP0".$textt;
                      }
                      else if($jumlahh>9){
                        $idklp2= "KLP00".$textt;
                      }
                  }
                }

              if($jumlahklp==3){
              $jumlah = $number+1;
              $jumlahh = $number+2;
              $jumlahhh = $number+3;
              $text= (string)$jumlah;
              $textt= (string)$jumlahh;
              $texttt= (string)$jumlahhh;
                if($jumlah<10){
                  $idklp1= "KLP000".$text;
                }
                else if($jumlah<10000){
                    if($jumlah>999){
                      $idklp1= "KLP".$text;
                    }
                    else if($jumlah>99){
                      $idklp1= "KLP0".$text;
                    }
                    else if($jumlah>9){
                      $idklp1= "KLP00".$text;
                    }
                }
                  
                if($jumlahh<10){
                  $idklp2= "KLP000".$textt;
                }
                else if($jumlahh<10000){
                    if($jumlahh>999){
                      $idklp2= "KLP".$textt;
                    }
                    else if($jumlahh>99){
                      $idklp2= "KLP0".$textt;
                    }
                    else if($jumlahh>9){
                      $idklp2= "KLP00".$textt;
                    }
                }
                
                  
                if($jumlahhh<10){
                  $idklp3= "KLP000".$texttt;
                }
                else if($jumlahhh<10000){
                    if($jumlahhh>999){
                      $idklp3= "KLP".$texttt;
                    }
                    else if($jumlahhh>99){
                      $idklp3= "KLP0".$texttt;
                    }
                    else if($jumlahhh>9){
                      $idklp3= "KLP00".$texttt;
                    }
                }
              }

              if($jumlahklp==4){
                $jumlah = $number+1;
                $jumlahh = $number+2;
                $jumlahhh = $number+3;
                $jumlahhhh = $number+4;
                $text= (string)$jumlah;
                $textt= (string)$jumlahh;
                $texttt= (string)$jumlahhh;
                $textttt= (string)$jumlahhhh;
                
                if($jumlah<10){
                  $idklp1= "KLP000".$text;
                }
                else if($jumlah<10000){
                    if($jumlah>999){
                      $idklp1= "KLP".$text;
                    }
                    else if($jumlah>99){
                      $idklp1= "KLP0".$text;
                    }
                    else if($jumlah>9){
                      $idklp1= "KLP00".$text;
                    }
                }
                  
                if($jumlahh<10){
                  $idklp2= "KLP000".$textt;
                }
                else if($jumlahh<10000){
                    if($jumlahh>999){
                      $idklp2= "KLP".$textt;
                    }
                    else if($jumlahh>99){
                      $idklp2= "KLP0".$textt;
                    }
                    else if($jumlahh>9){
                      $idklp2= "KLP00".$textt;
                    }
                }
                
                  
                if($jumlahhh<10){
                  $idklp3= "KLP000".$texttt;
                }
                else if($jumlahhh<10000){
                    if($jumlahhh>999){
                      $idklp3= "KLP".$texttt;
                    }
                    else if($jumlahhh>99){
                      $idklp3= "KLP0".$texttt;
                    }
                    else if($jumlahhh>9){
                      $idklp3= "KLP00".$texttt;
                    }
                }
                
                  
                if($jumlahhhh<10){
                  $idklp4= "KLP000".$textttt;
                }
                else if($jumlahhhh<10000){
                    if($jumlahhhh>999){
                      $idklp4= "KLP".$textttt;
                    }
                    else if($jumlahhhh>99){
                      $idklp4= "KLP0".$textttt;
                    }
                    else if($jumlahhhh>9){
                      $idklp4= "KLP00".$textttt;
                    }
                }
                }

                if($jumlahklp==5){
                  $jumlah = $number+1;
                  $jumlahh = $number+2;
                  $jumlahhh = $number+3;
                  $jumlahhhh = $number+4;
                  $jumlahhhhh = $number+5;
                  $text= (string)$jumlah;
                  $textt= (string)$jumlahh;
                  $texttt= (string)$jumlahhh;
                  $textttt= (string)$jumlahhhh;
                  $texttttt= (string)$jumlahhhhh;
                
                  if($jumlah<10){
                    $idklp1= "KLP000".$text;
                  }
                  else if($jumlah<10000){
                      if($jumlah>999){
                        $idklp1= "KLP".$text;
                      }
                      else if($jumlah>99){
                        $idklp1= "KLP0".$text;
                      }
                      else if($jumlah>9){
                        $idklp1= "KLP00".$text;
                      }
                  }
                    
                  if($jumlahh<10){
                    $idklp2= "KLP000".$textt;
                  }
                  else if($jumlahh<10000){
                      if($jumlahh>999){
                        $idklp2= "KLP".$textt;
                      }
                      else if($jumlahh>99){
                        $idklp2= "KLP0".$textt;
                      }
                      else if($jumlahh>9){
                        $idklp2= "KLP00".$textt;
                      }
                  }
                  
                    
                  if($jumlahhh<10){
                    $idklp3= "KLP000".$texttt;
                  }
                  else if($jumlahhh<10000){
                      if($jumlahhh>999){
                        $idklp3= "KLP".$texttt;
                      }
                      else if($jumlahhh>99){
                        $idklp3= "KLP0".$texttt;
                      }
                      else if($jumlahhh>9){
                        $idklp3= "KLP00".$texttt;
                      }
                  }
                  
                    
                  if($jumlahhhh<10){
                    $idklp4= "KLP000".$textttt;
                  }
                  else if($jumlahhhh<10000){
                      if($jumlahhhh>999){
                        $idklp4= "KLP".$textttt;
                      }
                      else if($jumlahhhh>99){
                        $idklp4= "KLP0".$textttt;
                      }
                      else if($jumlahhhh>9){
                        $idklp4= "KLP00".$textttt;
                      }
                  }
                  
                    
                  if($jumlahhhhh<10){
                    $idklp5= "KLP000".$texttttt;
                  }
                  else if($jumlahhhhh<10000){
                      if($jumlahhhhh>999){
                        $idklp5= "KLP".$texttttt;
                      }
                      else if($jumlahhhhh>99){
                        $idklp5= "KLP0".$texttttt;
                      }
                      else if($jumlahhhhh>9){
                        $idklp5= "KLP00".$texttttt;
                      }
                  }
                  }

                  if($jumlahklp==6){
                    $jumlah = $number+1;
                    $jumlahh = $number+2;
                    $jumlahhh = $number+3;
                    $jumlahhhh = $number+4;
                    $jumlahhhhh = $number+5;
                    $jumlahhhhhh = $number+6;
                    $text= (string)$jumlah;
                    $textt= (string)$jumlahh;
                    $texttt= (string)$jumlahhh;
                    $textttt= (string)$jumlahhhh;
                    $texttttt= (string)$jumlahhhhh;
                    $textttttt= (string)$jumlahhhhhh;
                
                    if($jumlah<10){
                      $idklp1= "KLP000".$text;
                    }
                    else if($jumlah<10000){
                        if($jumlah>999){
                          $idklp1= "KLP".$text;
                        }
                        else if($jumlah>99){
                          $idklp1= "KLP0".$text;
                        }
                        else if($jumlah>9){
                          $idklp1= "KLP00".$text;
                        }
                    }
                      
                    if($jumlahh<10){
                      $idklp2= "KLP000".$textt;
                    }
                    else if($jumlahh<10000){
                        if($jumlahh>999){
                          $idklp2= "KLP".$textt;
                        }
                        else if($jumlahh>99){
                          $idklp2= "KLP0".$textt;
                        }
                        else if($jumlahh>9){
                          $idklp2= "KLP00".$textt;
                        }
                    }
                    
                      
                    if($jumlahhh<10){
                      $idklp3= "KLP000".$texttt;
                    }
                    else if($jumlahhh<10000){
                        if($jumlahhh>999){
                          $idklp3= "KLP".$texttt;
                        }
                        else if($jumlahhh>99){
                          $idklp3= "KLP0".$texttt;
                        }
                        else if($jumlahhh>9){
                          $idklp3= "KLP00".$texttt;
                        }
                    }
                    
                      
                    if($jumlahhhh<10){
                      $idklp4= "KLP000".$textttt;
                    }
                    else if($jumlahhhh<10000){
                        if($jumlahhhh>999){
                          $idklp4= "KLP".$textttt;
                        }
                        else if($jumlahhhh>99){
                          $idklp4= "KLP0".$textttt;
                        }
                        else if($jumlahhhh>9){
                          $idklp4= "KLP00".$textttt;
                        }
                    }
                    
                      
                    if($jumlahhhhh<10){
                      $idklp5= "KLP000".$texttttt;
                    }
                    else if($jumlahhhhh<10000){
                        if($jumlahhhhh>999){
                          $idklp5= "KLP".$texttttt;
                        }
                        else if($jumlahhhhh>99){
                          $idklp5= "KLP0".$texttttt;
                        }
                        else if($jumlahhhhh>9){
                          $idklp5= "KLP00".$texttttt;
                        }
                    }
                    
                      
                    if($jumlahhhhhh<10){
                      $idklp6= "KLP000".$textttttt;
                    }
                    else if($jumlahhhhhh<10000){
                        if($jumlahhhhhh>999){
                          $idklp6= "KLP".$textttttt;
                        }
                        else if($jumlahhhhhh>99){
                          $idklp6= "KLP0".$textttttt;
                        }
                        else if($jumlahhhhhh>9){
                          $idklp6= "KLP00".$textttttt;
                        }
                    }
                    }

      //===========================================================================================================
      //IF KELOMPOKNYA 1===========================================================================================
      //===========================================================================================================
      if($jumlahklp==1){
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp1', '{$_POST['namakelompok1']}', '{$_POST['jumlahanggota1']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        }  


      //===========================================================================================================
      //IF KELOMPOKNYA 2===========================================================================================
      //===========================================================================================================
      else if($jumlahklp==2){
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp1', '{$_POST['namakelompok1']}', '{$_POST['jumlahanggota1']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp2', '{$_POST['namakelompok2']}', '{$_POST['jumlahanggota2']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        }    
        
      
      //===========================================================================================================
      //IF KELOMPOKNYA 3===========================================================================================
      //===========================================================================================================
      else if($jumlahklp==3){
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp1', '{$_POST['namakelompok1']}', '{$_POST['jumlahanggota1']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp2', '{$_POST['namakelompok2']}', '{$_POST['jumlahanggota2']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp3', '{$_POST['namakelompok3']}', '{$_POST['jumlahanggota3']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        }  
      
      //===========================================================================================================
      //IF KELOMPOKNYA 4===========================================================================================
      //===========================================================================================================
      else if($jumlahklp==4){
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp1', '{$_POST['namakelompok1']}', '{$_POST['jumlahanggota1']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp2', '{$_POST['namakelompok2']}', '{$_POST['jumlahanggota2']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp3', '{$_POST['namakelompok3']}', '{$_POST['jumlahanggota3']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp4', '{$_POST['namakelompok4']}', '{$_POST['jumlahanggota4']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        }  
        
      //===========================================================================================================
      //IF KELOMPOKNYA 5===========================================================================================
      //===========================================================================================================
      else if($jumlahklp==5){
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp1', '{$_POST['namakelompok1']}', '{$_POST['jumlahanggota1']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp2', '{$_POST['namakelompok2']}', '{$_POST['jumlahanggota2']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp3', '{$_POST['namakelompok3']}', '{$_POST['jumlahanggota3']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp4', '{$_POST['namakelompok4']}', '{$_POST['jumlahanggota4']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp5', '{$_POST['namakelompok5']}', '{$_POST['jumlahanggota5']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        } 
        
      //===========================================================================================================
      //IF KELOMPOKNYA 6===========================================================================================
      //===========================================================================================================
      else if($jumlahklp==6){
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp1', '{$_POST['namakelompok1']}', '{$_POST['jumlahanggota1']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp2', '{$_POST['namakelompok2']}', '{$_POST['jumlahanggota2']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp3', '{$_POST['namakelompok3']}', '{$_POST['jumlahanggota3']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp4', '{$_POST['namakelompok4']}', '{$_POST['jumlahanggota4']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp5', '{$_POST['namakelompok5']}', '{$_POST['jumlahanggota5']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        $sql = "INSERT INTO tb_kelompok (id_kelompok, nama_kelompok, jumlah_anggota, id_proyek) VALUES ('$idklp6', '{$_POST['namakelompok6']}', '{$_POST['jumlahanggota6']}', '{$_GET["id_proyek"]}')";
        $query = mysqli_query($conn, $sql);
        }  


      if($query){
        echo "<script>alert('Berhasil Membuat Kelompok Proyek');window.location='kelompok1.php?id_proyek=".$_GET["id_proyek"]."';</script></script>";          
      }
      else{
        echo "<script>alert('Pembuatan Kelompok Gagal');window.location='jumlahanggota.php';</script></script>";
      }
    }
  }

  else{
    header("Location: ../tugas.php"); 
  }
?>