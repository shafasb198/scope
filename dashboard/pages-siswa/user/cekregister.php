<?php
    include "../../../koneksi.php";

    if ($_POST){
        if ($_FILES['foto']['name'])
        {
             move_uploaded_file($_FILES['foto']['tmp_name'], "../../images/pengguna/" . $_FILES['foto']['name']);
            $img = $_FILES['foto']['name'];
        }

        $sql = "SELECT MAX(id_akun) AS last_id from tb_akun LIMIT 1";
              $query = mysqli_query($conn, $sql);

              $data = mysqli_fetch_array($query);
              $last_id = $data['last_id'];
              $potong = substr($last_id, 3);
              $number = (int)$potong;
              $jumlah = $number+1;
              $text= (string)$jumlah;
              if($jumlah<10){
                $id_akun_baru= "SCP000".$text;
              }
              else if($jumlah<10000){
                if($jumlah>999){
                  $id_akun_baru= "SCP".$text;
                }
                else if($jumlah>99){
                  $id_akun_baru= "SCP0".$text;
                }
                else if($jumlah>9){
                  $id_akun_baru= "SCP00".$text;
                }
              }


        $sql = "INSERT INTO tb_akun (id_akun, username, password, status, foto) VALUES ('$id_akun_baru', '{$_POST['unamenya']}',
                '{$_POST['pwnya']}', 'Siswa', '$img')";
        $query = mysqli_query($conn, $sql);

        



        $sqlnya = "SELECT MAX(id_siswa) AS last_id from tb_siswa LIMIT 1";
              $querynya = mysqli_query($conn, $sqlnya);

              $datanya = mysqli_fetch_array($querynya);
              $last_idnya = $datanya['last_id'];
              $potongnya = substr($last_idnya, 3);
              $numbernya = (int)$potongnya;
              $jumlahnya = $numbernya+1;
              $textnya= (string)$jumlahnya;
              if($jumlahnya<10){
                $id_siswa_baru= "SIS000".$textnya;
              }
              else if($jumlahnya<10000){
                if($jumlahnya>999){
                  $id_siswa_baru= "SIS".$textnya;
                }
                else if($jumlahnya>99){
                  $id_siswa_baru= "SIS0".$textnya;
                }
                else if($jumlahnya>9){
                  $id_siswa_baru= "SIS00".$textnya;
                }
              }

        $sql = "INSERT INTO tb_siswa (id_siswa, nama_siswa, id_akun) VALUES ('$id_siswa_baru', '{$_POST['namanya']}', '$id_akun_baru')";
        $query = mysqli_query($conn, $sql);


        if($query){
            echo "<script>alert('Pendaftaran Berhasil!');window.location='login.php';</script>";
        }
        else{
            echo "<script>alert('Pendaftaran gagal');window.location='register.php';</script></script>";
        }
    }
?>