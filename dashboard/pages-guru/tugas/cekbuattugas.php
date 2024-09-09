<?php
if (isset($_POST['btn_buattugas'])) { 
    include "../../../koneksi.php";

    if ($_POST){
        $sql = "SELECT MAX(id_tugas) AS last_id from tb_tugas LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_tugas_baru= "TGS000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_tugas_baru= "TGS".$text;
                }
                else if($jumlah>99){
                  $id_tugas_baru= "TGS0".$text;
                }
                else if($jumlah>9){
                  $id_tugas_baru= "TGS00".$text;
                }
              }
        
        //------------------------------------
        //get id topik
        //------------------------------------

        $ftopik = $_POST['topiktugas'];
        $id_topik= substr($ftopik, 0,7);
        
        if ($_FILES['panduan']['name'])
        {
             move_uploaded_file($_FILES['panduan']['tmp_name'], "../../dokumen/panduan_tugas/" . $_FILES['panduan']['name']);
            $filenya= $_FILES['panduan']['name'];
        }

        $sql = "INSERT INTO tb_tugas (id_tugas, nama_tugas, id_topik, deskripsi, file, deadline, status) VALUES ('$id_tugas_baru', '{$_POST['namatugas']}', '$id_topik',
                '{$_POST['deskripsitugas']}', '$filenya', '{$_POST['deadlinetugas']}', 'Belum Dimulai')";
        $query = mysqli_query($conn, $sql);

        //------------------------------------
        //SAVE TO TB_KETUNTASAN TUGAS
        //------------------------------------

        $getjumlahsiswa = "SELECT COUNT(id_siswa) AS jml_siswa from tb_siswa LIMIT 1";
        $hasilnya = mysqli_query($conn, $getjumlahsiswa);

        $jumlahnya = mysqli_fetch_array($hasilnya);
        $string = $jumlahnya['jml_siswa'];
        $intnya= (int)$string;
        $jml_siswa=$intnya+1;      

        
      

        $getidketuntasan = "SELECT MAX(id_ketuntasantugas) AS last_id from tb_ketuntasantugas LIMIT 1";
              $hasil = mysqli_query($conn, $getidketuntasan);

              $data = mysqli_fetch_array($hasil);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_ketuntasan_baru= "KTT000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_ketuntasan_baru= "KTT".$text;
                }
                else if($jumlah>99){
                  $id_ketuntasan_baru= "KTT0".$text;
                }
                else if($jumlah>9){
                  $id_ketuntasan_baru= "KTT00".$text;
                }
              }
          
          
          $getidnilai = "SELECT MAX(id_nilaitugas) AS last_id from tb_nilaitugas LIMIT 1";
              $hasils = mysqli_query($conn, $getidnilai);

              $datas = mysqli_fetch_array($hasils);
              $last_ids = $datas['last_id'];
              $potongs = substr($last_ids, 3);
              $numbers = (int)$potongs;
              $jumlahs = $numbers+1;
              $texts= (string)$jumlahs;
              if($jumlahs<10){
                $id_nilai_baru= "NLT000".$texts;
              }
              else if($jumlahs<10000){
                if($jumlahs>999){
                  $id_nilai_baru= "NLT".$texts;
                }
                else if($jumlahs>99){
                  $id_nilai_baru= "NLT0".$texts;
                }
                else if($jumlahs>9){
                  $id_nilai_baru= "NLT00".$texts;
                }
              }
        
        //loopingggggggggggggggggggg
        

        $getsiswa = "SELECT * FROM tb_akun JOIN tb_siswa
                      ON tb_akun.id_akun=tb_siswa.id_akun";
          $eks = mysqli_query($conn, $getsiswa);
          $hasil = mysqli_num_rows($eks);

        if($hasil>0){
            while($data = mysqli_fetch_array($eks)){

          $sqlnya = "INSERT INTO tb_ketuntasantugas (id_ketuntasantugas, id_siswa, id_tugas, status, file, tanggal) 
                VALUES ('$id_ketuntasan_baru', '".$data["id_siswa"]."', '$id_tugas_baru', 'Belum Dimulai', '', '0000-00-00')";
          $querynya = mysqli_query($conn, $sqlnya);
              
          $sqlnya = "INSERT INTO tb_nilaitugas (id_nilaitugas, id_ketuntasantugas, id_siswa, nilai) 
          VALUES ('$id_nilai_baru', '$id_ketuntasan_baru', '".$data["id_siswa"]."', '0')";
          $querynya = mysqli_query($conn, $sqlnya);
          
          //id ketuntasan ++
          $potong = substr($id_ketuntasan_baru, 3);
          $number = (int)$potong;
          $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_ketuntasan_baru= "KTT000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_ketuntasan_baru= "KTT".$text;
                }
                else if($jumlah>99){
                  $id_ketuntasan_baru= "KTT0".$text;
                }
                else if($jumlah>9){
                  $id_ketuntasan_baru= "KTT00".$text;
                }
              }

          $potongs = substr($id_nilai_baru, 3);
              $numbers = (int)$potongs;
              $jumlahs = $numbers+1;
              $texts= (string)$jumlahs;
              if($jumlahs<10){
                $id_nilai_baru= "NLT000".$texts;
              }
              else if($jumlahs<10000){
                if($jumlahs>999){
                  $id_nilai_baru= "NLT".$texts;
                }
                else if($jumlahs>99){
                  $id_nilai_baru= "NLT0".$texts;
                }
                else if($jumlahs>9){
                  $id_nilai_baru= "NLT00".$texts;
                }
              }

        }}

       

        if($query){
            echo "<script>alert('Pembuatan Tugas Berhasil!');window.location='tugas.php';</script>";
        }
        else{
            echo "<script>alert('Pembuatan Tugas gagal');window.location='buattugas.php';</script></script>";
        }
    }
  }

  else{
    header("Location: tugas.php"); 
  }
?>