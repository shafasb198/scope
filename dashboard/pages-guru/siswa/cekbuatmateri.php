<?php
    include "../../../koneksi.php";

    if ($_POST){
        

        //$linkvideo = $_POST['linkvideo'];
        //$video_id= substr($linkvideo, -11);
        //$thumbnail_url = "https://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";

        //$ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL, $thumbnail_url);
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_NOBODY, 1);
        //curl_exec($ch);
        //$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //curl_close($ch);

        //if ($_FILES['foto']['name'])
        //{
          //   move_uploaded_file($_FILES['foto']['tmp_name'], "../../images/pengguna/" . $_FILES['foto']['name']);
          //  $img = $_FILES['foto']['name'];
        //}

        //------------------------------------
        //auto increment id materi
        //------------------------------------

        $sql = "SELECT MAX(id_materi) AS last_id from tb_materi LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_materi_baru= "MTR000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_materi_baru= "MTR".$text;
                }
                else if($jumlah>99){
                  $id_materi_baru= "MTR0".$text;
                }
                else if($jumlah>9){
                  $id_materi_baru= "MTR00".$text;
                }
              }
        
        //------------------------------------
        //get id topik
        //------------------------------------

        $ftopik = $_POST['topikmateri'];
        if($ftopik="Perancangan"){
          $id_topik="TPK0001";
        }
        else if($ftopik="HTML"){
          $id_topik="TPK0002";
        }
        else if($ftopik="CSS"){
          $id_topik="TPK0003";
        }
        else if($ftopik="Javascript"){
          $id_topik="TPK0004";
        }
        else if($ftopik="Database"){
          $id_topik="TPK0005";
        }
        else if($ftopik="PHP"){
          $id_topik="TPK0006";
        }

        $sql = "INSERT INTO tb_materi (id_materi, id_topik, nama_materi, link_video, isi) VALUES ('$id_materi_baru', '$id_topik', '{$_POST['namamateri']}',
                '{$_POST['linkvideo']}', '{$_POST['isimateri']}')";
        $query = mysqli_query($conn, $sql);

        //------------------------------------
        //SAVE TO TB_KETUNTASAN MATERI
        //------------------------------------

        $getjumlahsiswa = "SELECT COUNT(id_siswa) AS jml_siswa from tb_siswa LIMIT 1";
        $hasilnya = mysqli_query($conn, $getjumlahsiswa);

        $jumlahnya = mysqli_fetch_array($hasilnya);
        $string = $jumlahnya['jml_siswa'];
        $intnya= (int)$string;
        $jml_siswa=$intnya+1;

        $getidsiswa = "SELECT MAX(id_siswa) AS last_id from tb_siswa LIMIT 1";
        $get = mysqli_query($conn, $getidsiswa);

        $baris = mysqli_fetch_array($get);
        $idnya = $baris['last_id'];
              $potongs = substr($last_id, 3);
              $numbers = (int)$potongs;
              $jumlahs = $numbers+1;
              $texts= (string)$jumlahs;
              if($jumlahs<10){
                $id_siswa_baru= "SIS000".$texts;
              }
              else if($jumlahs<10000){
                if($jumlahs>999){
                  $id_siswa_baru= "SIS".$texts;
                }
                else if($jumlahs>99){
                  $id_siswa_baru= "SIS0".$texts;
                }
                else if($jumlahs>9){
                  $id_siswa_baru= "SIS00".$texts;
                }
              }
      

        $getidketuntasan = "SELECT MAX(id_ketuntasanmateri) AS last_id from tb_ketuntasanmateri LIMIT 1";
              $hasil = mysqli_query($conn, $getidketuntasan);

              $data = mysqli_fetch_array($hasil);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_ketuntasan_baru= "KTM000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_ketuntasan_baru= "KTM".$text;
                }
                else if($jumlah>99){
                  $id_ketuntasan_baru= "KTM0".$text;
                }
                else if($jumlah>9){
                  $id_ketuntasan_baru= "KTM00".$text;
                }
              }
        
        //loopingggggggggggggggggggg
        
        $i=1;
        while($i<$jml_siswa){
          $sqlnya = "INSERT INTO tb_ketuntasanmateri (id_ketuntasanmateri, id_siswa, id_materi, status, tanggal) 
                VALUES ('$id_ketuntasan_baru', '$id_siswa_baru', '$id_materi_baru', 'Belum Dimulai', '0000-00-00')";
          $querynya = mysqli_query($conn, $sqlnya);
          
          //id ketuntasan ++
          $potong = substr($id_ketuntasan_baru, 3);
          $number = (int)$potong;
          $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_ketuntasan_baru= "KTM000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_ketuntasan_baru= "KTM".$text;
                }
                else if($jumlah>99){
                  $id_ketuntasan_baru= "KTM0".$text;
                }
                else if($jumlah>9){
                  $id_ketuntasan_baru= "KTM00".$text;
                }
              }
              
          //id siswa++
          $potongs = substr($id_siswa_baru, 3);
          $numbers = (int)$potongs;
          $tambah=$jumlahs+1;
          $texts= (string)$jumlahs;
              if($jumlahs<10){
                $id_siswa_baru= "SIS000".$texts;
              }
              else if($jumlahs<10000){
                if($jumlahs>999){
                  $id_siswa_baru= "SIS".$texts;
                }
                else if($jumlahs>99){
                  $id_siswa_baru= "SIS0".$texts;
                }
                else if($jumlahs>9){
                  $id_siswa_baru= "SIS00".$texts;
                }
              }          
        }
        
        

        if($querynya){
          echo "<script>alert('Pembuatan Ketuntasan Berhasil!');window.location='materi.php';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Ketuntasan gagal');window.location='buatmateri.php';</script></script>";
        }

        if($query){
            echo "<script>alert('Pembuatan Materi Berhasil!');window.location='materi.php';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Materi gagal');window.location='buatmateri.php';</script></script>";
        }
    }
?>