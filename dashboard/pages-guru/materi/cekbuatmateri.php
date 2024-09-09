<?php
if (isset($_POST['btn_buatmateri'])) { 
    include "../../../koneksi.php";

    if ($_POST){
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
        $id_topik= substr($ftopik, 0,7);

        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/panduan_materi/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }

        $sql = "INSERT INTO tb_materi (id_materi, id_topik, nama_materi, link_video, isi, file, status) VALUES ('$id_materi_baru', '$id_topik', '{$_POST['namamateri']}',
                '{$_POST['linkvideo']}', '{$_POST['isimateri']}', '$filenya', 'Belum Dimulai')";
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

        

        
      

        $getidketuntasan = "SELECT MAX(id_ketuntasanmateri) AS last_id from tb_ketuntasanmateri LIMIT 1";
              $hasil = mysqli_query($conn, $getidketuntasan);

              $data = mysqli_fetch_array($hasil);
              $last_id = $data['last_id'];
              if($last_id=='NULL'){
                $id_ketuntasan_baru= "KTM0001";
              }
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
          
          
          $getidnilai = "SELECT MAX(id_nilaimateri) AS last_id from tb_nilaimateri LIMIT 1";
              $hasils = mysqli_query($conn, $getidnilai);

              $datas = mysqli_fetch_array($hasils);
              $last_ids = $datas['last_id'];
              if($last_id=='NULL'){
                $id_ketuntasan_baru= "NLM0001";
              }
              $potongs = substr($last_ids, 3);
              $numbers = (int)$potongs;
              $jumlahs = $numbers+1;
              $texts= (string)$jumlahs;
              if($jumlahs<10){
                $id_nilai_baru= "NLM000".$texts;
              }
              else if($jumlahs<10000){
                if($jumlahs>999){
                  $id_nilai_baru= "NLM".$texts;
                }
                else if($jumlahs>99){
                  $id_nilai_baru= "NLM0".$texts;
                }
                else if($jumlahs>9){
                  $id_nilai_baru= "NLM00".$texts;
                }
              }
        
        //loopingggggggggggggggggggg
        

        $getsiswa = "SELECT * FROM tb_akun JOIN tb_siswa
                      ON tb_akun.id_akun=tb_siswa.id_akun";
          $eks = mysqli_query($conn, $getsiswa);
          $hasil = mysqli_num_rows($eks);

        if($hasil>0){
            while($data = mysqli_fetch_array($eks)){

          $sqlnya = "INSERT INTO tb_ketuntasanmateri (id_ketuntasanmateri, id_siswa, id_materi, status, tanggal) 
                VALUES ('$id_ketuntasan_baru', '".$data["id_siswa"]."', '$id_materi_baru', 'Belum Dimulai', '0000-00-00')";
          $querynya = mysqli_query($conn, $sqlnya);
              
          $sqlnya = "INSERT INTO tb_nilaimateri (id_nilaimateri, id_ketuntasanmateri, id_siswa, nilai) 
          VALUES ('$id_nilai_baru', '$id_ketuntasan_baru', '".$data["id_siswa"]."', '0')";
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

          $potongs = substr($id_nilai_baru, 3);
              $numbers = (int)$potongs;
              $jumlahs = $numbers+1;
              $texts= (string)$jumlahs;
              if($jumlahs<10){
                $id_nilai_baru= "NLM000".$texts;
              }
              else if($jumlahs<10000){
                if($jumlahs>999){
                  $id_nilai_baru= "NLM".$texts;
                }
                else if($jumlahs>99){
                  $id_nilai_baru= "NLM0".$texts;
                }
                else if($jumlahs>9){
                  $id_nilai_baru= "NLM00".$texts;
                }
              }

        }}

       

        if($query){
            echo "<script>alert('Pembuatan Materi Berhasil!');window.location='materi.php';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Materi gagal');window.location='buatmateri.php';</script></script>";
        }
    }
  }

  else{
    header("Location: materi.php"); 
  }
?>