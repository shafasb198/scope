<?php
if (isset($_POST['btn_selesai'])) { 
    include "../../../../koneksi.php";

    if ($_POST){

      $idpro=$_GET["id_proyek"];
      $getjmlangg = "SELECT * from tb_kelompok WHERE id_proyek='".$_GET["id_proyek"]."' LIMIT 1";
      $hasil = mysqli_query($conn, $getjmlangg);
      $baris = mysqli_fetch_array($hasil);
      $jumlahangg = $baris['jumlah_anggota'];
      $idklp = $baris['id_kelompok'];

      $sql = "SELECT MAX(id_kelompoksiswa) AS last_id from tb_kelompoksiswa LIMIT 1";
      $query = mysqli_query($conn, $sql);
      $data = mysqli_fetch_array($query);
      $last_id = $data['last_id'];
      $potong = substr($last_id, 3);
      $number = (int)$potong;

      $getketua = "SELECT MAX(id_ketua) AS last_id from tb_ketua LIMIT 1";
      $getdata = mysqli_query($conn, $getketua);
      $getdata = mysqli_fetch_array($getdata);
      $idketua = $getdata['last_id'];
      $dipotong = substr($idketua, 3);
      $angkanya = (int)$dipotong;

      //===========================================================================================================
      //IF KELOMPOKNYA 1===========================================================================================
      //===========================================================================================================
      if($jumlahangg==1){
        $jumlah = $number+1;
        $text= (string)$jumlah;
          if($jumlah<10){
            $idklpsw1= "KSW000".$text;
          }
          else if($jumlah<10000){
              if($jumlah>999){
                $idklpsw1= "KSW".$text;
              }
              else if($jumlah>99){
                $idklpsw1= "KSW0".$text;
              }
              else if($jumlah>9){
                $idklpsw1= "KSW00".$text;
              }
          }

        $getidsiswa1=$_POST['ketua'];
        $id_siswa1= substr($getidsiswa1,0,7);
        
        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw1', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);
          
        $ditambah = $angkanya+1;
        $paten= (string)$ditambah;
          if($ditambah<10){
            $id_ketua_baru= "KET000".$paten;
          }
          else if($ditambah<10000){
              if($ditambah>999){
                $id_ketua_baru= "KET".$paten;
              }
              else if($ditambah>99){
                $id_ketua_baru= "KET0".$paten;
              }
              else if($ditambah>9){
                $id_ketua_baru= "KET00".$paten;
              }
          }
        $sql = "INSERT INTO tb_ketua (id_ketua, id_siswa, id_kelompok) VALUES ('$id_ketua_baru', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);
        }  


      //===========================================================================================================
      //IF KELOMPOKNYA 2===========================================================================================
      //===========================================================================================================
      else if($jumlahangg==2){
        
        $jumlah = $number+1;
        $text= (string)$jumlah;
          if($jumlah<10){
            $idklpsw1= "KSW000".$text;
          }
          else if($jumlah<10000){
              if($jumlah>999){
                $idklpsw1= "KSW".$text;
              }
              else if($jumlah>99){
                $idklpsw1= "KSW0".$text;
              }
              else if($jumlah>9){
                $idklpsw1= "KSW00".$text;
              }
          }
        $getidsiswa1=$_POST['ketua'];
        $id_siswa1= substr($getidsiswa1,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw1', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql); 
          
        $ditambah = $angkanya+1;
        $paten= (string)$ditambah;
          if($ditambah<10){
            $id_ketua_baru= "KET000".$paten;
          }
          else if($ditambah<10000){
              if($ditambah>999){
                $id_ketua_baru= "KET".$paten;
              }
              else if($ditambah>99){
                $id_ketua_baru= "KET0".$paten;
              }
              else if($ditambah>9){
                $id_ketua_baru= "KET00".$paten;
              }
          }
        $sql = "INSERT INTO tb_ketua (id_ketua, id_siswa, id_kelompok) VALUES ('$id_ketua_baru', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);       
        
        $potong = substr($idklpsw1, 3);
        $number = (int)$potong;
        $jumlahh = $number+1;
        $textt= (string)$jumlahh;
          if($jumlahh<10){
            $idklpsw2= "KSW000".$textt;
          }
          else if($jumlahh<10000){
              if($jumlahh>999){
                $idklpsw2= "KSW".$textt;
              }
              else if($jumlahh>99){
                $idklpsw2= "KSW0".$textt;
              }
              else if($jumlahh>9){
                $idklpsw2= "KSW00".$textt;
              }
          }
          $getidsiswa2=$_POST['anggota1'];
          $id_siswa2= substr($getidsiswa2,0,7);
        
        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw2', '$id_siswa2', '$idklp')";
        $query = mysqli_query($conn, $sql);
        }    
        
      
      //===========================================================================================================
      //IF KELOMPOKNYA 3===========================================================================================
      //===========================================================================================================
      else if($jumlahangg==3){
        
        $jumlah = $number+1;
        $text= (string)$jumlah;
          if($jumlah<10){
            $idklpsw1= "KSW000".$text;
          }
          else if($jumlah<10000){
              if($jumlah>999){
                $idklpsw1= "KSW".$text;
              }
              else if($jumlah>99){
                $idklpsw1= "KSW0".$text;
              }
              else if($jumlah>9){
                $idklpsw1= "KSW00".$text;
              }
          }
        $getidsiswa1=$_POST['ketua'];
        $id_siswa1= substr($getidsiswa1,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw1', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);   
          
        $ditambah = $angkanya+1;
        $paten= (string)$ditambah;
          if($ditambah<10){
            $id_ketua_baru= "KET000".$paten;
          }
          else if($ditambah<10000){
              if($ditambah>999){
                $id_ketua_baru= "KET".$paten;
              }
              else if($ditambah>99){
                $id_ketua_baru= "KET0".$paten;
              }
              else if($ditambah>9){
                $id_ketua_baru= "KET00".$paten;
              }
          }
        $sql = "INSERT INTO tb_ketua (id_ketua, id_siswa, id_kelompok) VALUES ('$id_ketua_baru', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);  
        
        $potong = substr($idklpsw1, 3);
        $number = (int)$potong;
        $jumlahh = $number+1;
        $textt= (string)$jumlahh;
          if($jumlahh<10){
            $idklpsw2= "KSW000".$textt;
          }
          else if($jumlahh<10000){
              if($jumlahh>999){
                $idklpsw2= "KSW".$textt;
              }
              else if($jumlahh>99){
                $idklpsw2= "KSW0".$textt;
              }
              else if($jumlahh>9){
                $idklpsw2= "KSW00".$textt;
              }
          }
          $getidsiswa2=$_POST['anggota1'];
          $id_siswa2= substr($getidsiswa2,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw2', '$id_siswa2', '$idklp')";
        $query = mysqli_query($conn, $sql);
         
        $potong = substr($idklpsw2, 3);
        $number = (int)$potong;
        $jumlahhh = $number+1;
        $texttt= (string)$jumlahhh;
          if($jumlahhh<10){
            $idklpsw3= "KSW000".$texttt;
          }
          else if($jumlahhh<10000){
              if($jumlahhh>999){
                $idklpsw3= "KSW".$texttt;
              }
              else if($jumlahhh>99){
                $idklpsw3= "KSW0".$texttt;
              }
              else if($jumlahhh>9){
                $idklpsw3= "KSW00".$texttt;
              }
          }
          $getidsiswa3=$_POST['anggota2'];
          $id_siswa3= substr($getidsiswa3,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw3', '$id_siswa3', '$idklp')";
        $query = mysqli_query($conn, $sql);
        }  
      
      //===========================================================================================================
      //IF KELOMPOKNYA 4===========================================================================================
      //===========================================================================================================
      else if($jumlahangg==4){
        
        $jumlah = $number+1;
        $text= (string)$jumlah;
          if($jumlah<10){
            $idklpsw1= "KSW000".$text;
          }
          else if($jumlah<10000){
              if($jumlah>999){
                $idklpsw1= "KSW".$text;
              }
              else if($jumlah>99){
                $idklpsw1= "KSW0".$text;
              }
              else if($jumlah>9){
                $idklpsw1= "KSW00".$text;
              }
          }
        $getidsiswa1=$_POST['ketua'];
        $id_siswa1= substr($getidsiswa1,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw1', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);    
          
        $ditambah = $angkanya+1;
        $paten= (string)$ditambah;
          if($ditambah<10){
            $id_ketua_baru= "KET000".$paten;
          }
          else if($ditambah<10000){
              if($ditambah>999){
                $id_ketua_baru= "KET".$paten;
              }
              else if($ditambah>99){
                $id_ketua_baru= "KET0".$paten;
              }
              else if($ditambah>9){
                $id_ketua_baru= "KET00".$paten;
              }
          }
        $sql = "INSERT INTO tb_ketua (id_ketua, id_siswa, id_kelompok) VALUES ('$id_ketua_baru', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql); 
        
        $potong = substr($idklpsw1, 3);
        $number = (int)$potong;
        $jumlahh = $number+1;
        $textt= (string)$jumlahh;
          if($jumlahh<10){
            $idklpsw2= "KSW000".$textt;
          }
          else if($jumlahh<10000){
              if($jumlahh>999){
                $idklpsw2= "KSW".$textt;
              }
              else if($jumlahh>99){
                $idklpsw2= "KSW0".$textt;
              }
              else if($jumlahh>9){
                $idklpsw2= "KSW00".$textt;
              }
          }
          $getidsiswa2=$_POST['anggota1'];
          $id_siswa2= substr($getidsiswa2,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw2', '$id_siswa2', '$idklp')";
        $query = mysqli_query($conn, $sql);
         
        $potong = substr($idklpsw2, 3);
        $number = (int)$potong;
        $jumlahhh = $number+1;
        $texttt= (string)$jumlahhh;
          if($jumlahhh<10){
            $idklpsw3= "KSW000".$texttt;
          }
          else if($jumlahhh<10000){
              if($jumlahhh>999){
                $idklpsw3= "KSW".$texttt;
              }
              else if($jumlahhh>99){
                $idklpsw3= "KSW0".$texttt;
              }
              else if($jumlahhh>9){
                $idklpsw3= "KSW00".$texttt;
              }
          }
          $getidsiswa3=$_POST['anggota2'];
          $id_siswa3= substr($getidsiswa3,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw3', '$id_siswa3', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw3, 3);
        $number = (int)$potong;
        $jumlahhhh = $number+1;
        $textttt= (string)$jumlahhhh;
          if($jumlahhhh<10){
            $idklpsw4= "KSW000".$textttt;
          }
          else if($jumlahhhh<10000){
              if($jumlahhhh>999){
                $idklpsw4= "KSW".$textttt;
              }
              else if($jumlahhhh>99){
                $idklpsw4= "KSW0".$textttt;
              }
              else if($jumlahhhh>9){
                $idklpsw4= "KSW00".$textttt;
              }
          }
          $getidsiswa4=$_POST['anggota3'];
          $id_siswa4= substr($getidsiswa4,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw4', '$id_siswa4', '$idklp')";
        $query = mysqli_query($conn, $sql);
        }  
        
      //===========================================================================================================
      //IF KELOMPOKNYA 5===========================================================================================
      //===========================================================================================================
      else if($jumlahangg==5){
        
        $jumlah = $number+1;
        $text= (string)$jumlah;
          if($jumlah<10){
            $idklpsw1= "KSW000".$text;
          }
          else if($jumlah<10000){
              if($jumlah>999){
                $idklpsw1= "KSW".$text;
              }
              else if($jumlah>99){
                $idklpsw1= "KSW0".$text;
              }
              else if($jumlah>9){
                $idklpsw1= "KSW00".$text;
              }
          }
        $getidsiswa1=$_POST['ketua'];
        $id_siswa1= substr($getidsiswa1,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw1', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);    
          
        $ditambah = $angkanya+1;
        $paten= (string)$ditambah;
          if($ditambah<10){
            $id_ketua_baru= "KET000".$paten;
          }
          else if($ditambah<10000){
              if($ditambah>999){
                $id_ketua_baru= "KET".$paten;
              }
              else if($ditambah>99){
                $id_ketua_baru= "KET0".$paten;
              }
              else if($ditambah>9){
                $id_ketua_baru= "KET00".$paten;
              }
          }
        $sql = "INSERT INTO tb_ketua (id_ketua, id_siswa, id_kelompok) VALUES ('$id_ketua_baru', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw1, 3);
        $number = (int)$potong;
        $jumlahh = $number+1;
        $textt= (string)$jumlahh;
          if($jumlahh<10){
            $idklpsw2= "KSW000".$textt;
          }
          else if($jumlahh<10000){
              if($jumlahh>999){
                $idklpsw2= "KSW".$textt;
              }
              else if($jumlahh>99){
                $idklpsw2= "KSW0".$textt;
              }
              else if($jumlahh>9){
                $idklpsw2= "KSW00".$textt;
              }
          }
          $getidsiswa2=$_POST['anggota1'];
          $id_siswa2= substr($getidsiswa2,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw2', '$id_siswa2', '$idklp')";
        $query = mysqli_query($conn, $sql);
         
        $potong = substr($idklpsw2, 3);
        $number = (int)$potong;
        $jumlahhh = $number+1;
        $texttt= (string)$jumlahhh;
          if($jumlahhh<10){
            $idklpsw3= "KSW000".$texttt;
          }
          else if($jumlahhh<10000){
              if($jumlahhh>999){
                $idklpsw3= "KSW".$texttt;
              }
              else if($jumlahhh>99){
                $idklpsw3= "KSW0".$texttt;
              }
              else if($jumlahhh>9){
                $idklpsw3= "KSW00".$texttt;
              }
          }
          $getidsiswa3=$_POST['anggota2'];
          $id_siswa3= substr($getidsiswa3,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw3', '$id_siswa3', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw3, 3);
        $number = (int)$potong;
        $jumlahhhh = $number+1;
        $textttt= (string)$jumlahhhh;
          if($jumlahhhh<10){
            $idklpsw4= "KSW000".$textttt;
          }
          else if($jumlahhhh<10000){
              if($jumlahhhh>999){
                $idklpsw4= "KSW".$textttt;
              }
              else if($jumlahhhh>99){
                $idklpsw4= "KSW0".$textttt;
              }
              else if($jumlahhhh>9){
                $idklpsw4= "KSW00".$textttt;
              }
          }
          $getidsiswa4=$_POST['anggota3'];
          $id_siswa4= substr($getidsiswa4,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw4', '$id_siswa4', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw4, 3);
        $number = (int)$potong;
        $jumlahhhhh = $number+1;
        $texttttt= (string)$jumlahhhhh;
          if($jumlahhhhh<10){
            $idklpsw5= "KSW000".$texttttt;
          }
          else if($jumlahhhhh<10000){
              if($jumlahhhhh>999){
                $idklpsw5= "KSW".$texttttt;
              }
              else if($jumlahhhhh>99){
                $idklpsw5= "KSW0".$texttttt;
              }
              else if($jumlahhhhh>9){
                $idklpsw5= "KSW00".$texttttt;
              }
          }
          $getidsiswa5=$_POST['anggota4'];
          $id_siswa5= substr($getidsiswa5,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw5', '$id_siswa5', '$idklp')";
        $query = mysqli_query($conn, $sql);
        } 
        
      //===========================================================================================================
      //IF KELOMPOKNYA 6===========================================================================================
      //===========================================================================================================
      else if($jumlahangg==6){
        
        $jumlah = $number+1;
        $text= (string)$jumlah;
          if($jumlah<10){
            $idklpsw1= "KSW000".$text;
          }
          else if($jumlah<10000){
              if($jumlah>999){
                $idklpsw1= "KSW".$text;
              }
              else if($jumlah>99){
                $idklpsw1= "KSW0".$text;
              }
              else if($jumlah>9){
                $idklpsw1= "KSW00".$text;
              }
          }
        $getidsiswa1=$_POST['ketua'];
        $id_siswa1= substr($getidsiswa1,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw1', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);    
          
        $ditambah = $angkanya+1;
        $paten= (string)$ditambah;
          if($ditambah<10){
            $id_ketua_baru= "KET000".$paten;
          }
          else if($ditambah<10000){
              if($ditambah>999){
                $id_ketua_baru= "KET".$paten;
              }
              else if($ditambah>99){
                $id_ketua_baru= "KET0".$paten;
              }
              else if($ditambah>9){
                $id_ketua_baru= "KET00".$paten;
              }
          }
        $sql = "INSERT INTO tb_ketua (id_ketua, id_siswa, id_kelompok) VALUES ('$id_ketua_baru', '$id_siswa1', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw1, 3);
        $number = (int)$potong;
        $jumlahh = $number+1;
        $textt= (string)$jumlahh;
          if($jumlahh<10){
            $idklpsw2= "KSW000".$textt;
          }
          else if($jumlahh<10000){
              if($jumlahh>999){
                $idklpsw2= "KSW".$textt;
              }
              else if($jumlahh>99){
                $idklpsw2= "KSW0".$textt;
              }
              else if($jumlahh>9){
                $idklpsw2= "KSW00".$textt;
              }
          }
          $getidsiswa2=$_POST['anggota1'];
          $id_siswa2= substr($getidsiswa2,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw2', '$id_siswa2', '$idklp')";
        $query = mysqli_query($conn, $sql);
         
        $potong = substr($idklpsw2, 3);
        $number = (int)$potong;
        $jumlahhh = $number+1;
        $texttt= (string)$jumlahhh;
          if($jumlahhh<10){
            $idklpsw3= "KSW000".$texttt;
          }
          else if($jumlahhh<10000){
              if($jumlahhh>999){
                $idklpsw3= "KSW".$texttt;
              }
              else if($jumlahhh>99){
                $idklpsw3= "KSW0".$texttt;
              }
              else if($jumlahhh>9){
                $idklpsw3= "KSW00".$texttt;
              }
          }
          $getidsiswa3=$_POST['anggota2'];
          $id_siswa3= substr($getidsiswa3,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw3', '$id_siswa3', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw3, 3);
        $number = (int)$potong;
        $jumlahhhh = $number+1;
        $textttt= (string)$jumlahhhh;
          if($jumlahhhh<10){
            $idklpsw4= "KSW000".$textttt;
          }
          else if($jumlahhhh<10000){
              if($jumlahhhh>999){
                $idklpsw4= "KSW".$textttt;
              }
              else if($jumlahhhh>99){
                $idklpsw4= "KSW0".$textttt;
              }
              else if($jumlahhhh>9){
                $idklpsw4= "KSW00".$textttt;
              }
          }
          $getidsiswa4=$_POST['anggota3'];
          $id_siswa4= substr($getidsiswa4,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw4', '$id_siswa4', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw4, 3);
        $number = (int)$potong;
        $jumlahhhhh = $number+1;
        $texttttt= (string)$jumlahhhhh;
          if($jumlahhhhh<10){
            $idklpsw5= "KSW000".$texttttt;
          }
          else if($jumlahhhhh<10000){
              if($jumlahhhhh>999){
                $idklpsw5= "KSW".$texttttt;
              }
              else if($jumlahhhhh>99){
                $idklpsw5= "KSW0".$texttttt;
              }
              else if($jumlahhhhh>9){
                $idklpsw5= "KSW00".$texttttt;
              }
          }
          $getidsiswa5=$_POST['anggota4'];
          $id_siswa5= substr($getidsiswa5,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw5', '$id_siswa5', '$idklp')";
        $query = mysqli_query($conn, $sql);
        
        $potong = substr($idklpsw5, 3);
        $number = (int)$potong;
        $jumlahhhhhh = $number+1;
        $textttttt= (string)$jumlahhhhhh;
          if($jumlahhhhhh<10){
            $idklpsw6= "KSW000".$textttttt;
          }
          else if($jumlahhhhhh<10000){
              if($jumlahhhhhh>999){
                $idklpsw6= "KSW".$textttttt;
              }
              else if($jumlahhhhhh>99){
                $idklpsw6= "KSW0".$texttttt;
              }
              else if($jumlahhhhhh>9){
                $idklpsw6= "KSW00".$textttttt;
              }
          }
          $getidsiswa6=$_POST['anggota5'];
          $id_siswa6= substr($getidsiswa6,0,7);

        $sql = "INSERT INTO tb_kelompoksiswa (id_kelompoksiswa, id_siswa, id_kelompok) VALUES ('$idklpsw6', '$id_siswa6', '$idklp')";
        $query = mysqli_query($conn, $sql);
        }  

      //=========================================================================================================
      //=========================================================================================================
      //=========================================================================================================
      //KETUNTASAN PROYEK!!!!!!!!!!!!!!!!!!!!!!!!================================================================
      //=========================================================================================================
      //=========================================================================================================
      //=========================================================================================================
      $getstep= "SELECT * FROM tb_proyekstep WHERE id_proyek='".$_GET['id_proyek']."'";
          $hasilstep = mysqli_query($conn, $getstep);
          $barisstep = mysqli_num_rows($hasilstep);
            if($barisstep>0){
              while($step = mysqli_fetch_array($hasilstep)){
                $getkelompok= "SELECT * FROM tb_kelompok WHERE id_proyek='".$_GET['id_proyek']."'";
                $hasilnya = mysqli_query($conn, $getkelompok);
                $barisnya = mysqli_num_rows($hasilnya);
                  if($barisnya>0){
                    while($kelompok = mysqli_fetch_array($hasilnya)){
                      
                      $sql = "SELECT MAX(id_ketuntasanproyek) AS last_id from tb_ketuntasanproyek LIMIT 1";
                      $query = mysqli_query($conn, $sql);
                      $data = mysqli_fetch_array($query);
                      $last_id = $data['last_id'];
                      $potong = substr($last_id, 3);
                      $number = (int)$potong;

                              $jumlah = $number+1;
                              $text= (string)$jumlah;
                                if($jumlah<10){
                                  $idtuntas= "KTP000".$text;
                                }
                                else if($jumlah<10000){
                                    if($jumlah>999){
                                      $idtuntas= "KTP".$text;
                                    }
                                    else if($jumlah>99){
                                      $idtuntas= "KTP0".$text;
                                    }
                                    else if($jumlah>9){
                                      $idtuntas= "KTP00".$text;
                                    }
                                }
                      
                      $idnilai = "SELECT MAX(id_nilaistep) AS last_id from tb_nilaistep LIMIT 1";
                      $gett = mysqli_query($conn, $idnilai);
                      $getnilai = mysqli_fetch_array($gett);
                      $idnya = $getnilai['last_id'];
                      $cut = substr($idnya, 3);
                      $angka = (int)$cut;

                              $tambah = $angka+1;
                              $huruf= (string)$tambah;
                                if($tambah<10){
                                  $id_nilai_baru= "NLS000".$huruf;
                                }
                                else if($tambah<10000){
                                    if($tambah>999){
                                      $id_nilai_baru= "NLS".$huruf;
                                    }
                                    else if($tambah>99){
                                      $id_nilai_baru= "NLS0".$huruf;
                                    }
                                    else if($tambah>9){
                                      $id_nilai_baru= "NLS00".$huruf;
                                    }
                                }

                      $sql = "INSERT INTO tb_ketuntasanproyek (id_ketuntasanproyek, id_proyekstep, id_kelompok, tgl_pengumpulan, file, status) 
                              VALUES ('$idtuntas', '{$step['id_proyekstep']}', '{$kelompok['id_kelompok']}', '0000-00-00', '', 'Belum Dimulai')";
                      $query = mysqli_query($conn, $sql);

                      $sql = "INSERT INTO tb_nilaistep (id_nilaistep, id_ketuntasanproyek, nilai) 
                              VALUES ('$id_nilai_baru', '$idtuntas', '0')";
                      $query = mysqli_query($conn, $sql);
                    }
                  }
              }
            }
      
      


      if($query){
        $getjmlklp = "SELECT * from tb_proyek WHERE id_proyek='".$_GET["id_proyek"]."'";
        $hasil = mysqli_query($conn, $getjmlklp);
        $baris = mysqli_fetch_array($hasil);
        $jumlahklp = $baris['jumlah_kelompok'];
        if($jumlahklp>1){
          header("Location: kelompok2.php?id_proyek=".$_GET["id_proyek"]);
        }
        else{
          echo "<script>alert('Berhasil Membuat Kelompok Proyek');window.location='../detailproyek.php?id_proyek=".$_GET["id_proyek"]."';</script></script>";          
        }     
        
      }
      else{
        echo "<script>alert('Pembuatan Kelompok Gagal');window.location='../detailproyek.php?id_proyek=".$_GET["id_proyek"]."';</script></script>";
      }
    }
  }

  else{
    header("Location: ../../../dashboard-guru.php"); 
  }
?>