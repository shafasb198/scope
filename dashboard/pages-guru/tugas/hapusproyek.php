<?php
    include "../../../koneksi.php";
    $id = $_GET["id_proyek"];
    //mengambil id yang ingin dihapus

        //jalankan query DELETE untuk menghapus data
        $getid = "SELECT * FROM tb_proyekstep WHERE id_proyek='$id'";
          $eks = mysqli_query($conn, $getid);
          $hasil = mysqli_num_rows($eks);

        if($hasil>0){
            while($data = mysqli_fetch_array($eks)){

              $getidk = "SELECT * FROM tb_ketuntasanproyek WHERE id_proyekstep='".$data["id_proyekstep"]."'";
              $eksk = mysqli_query($conn, $getidk);
              $hasilk = mysqli_num_rows($eksk);

              if($hasilk>0){
                  while($datak = mysqli_fetch_array($eksk)){
                    $query = "DELETE FROM tb_nilaistep WHERE id_ketuntasanproyek='".$datak["id_ketuntasanproyek"]."'";
                    $hasil_query = mysqli_query($conn, $query);                  
                  }
              }                
                
                $query = "DELETE FROM tb_ketuntasanproyek WHERE id_proyekstep='".$data["id_proyekstep"]."'";
                $hasil_query = mysqli_query($conn, $query);
              
              $getkomen = "SELECT * FROM tb_komentarproyek WHERE id_proyekstep='".$data["id_proyekstep"]."'";
              $ekskomen = mysqli_query($conn, $getkomen);
              $hasilkomen = mysqli_num_rows($ekskomen);

              if($hasilkomen>0){
                  while($datakomen = mysqli_fetch_array($ekskomen)){
                    $query = "DELETE FROM tb_balasanproyek WHERE id_komentarproyek='".$datakomen["id_komentarproyek"]."'";
                    $hasil_query = mysqli_query($conn, $query);                  
                  }
              }  
              $query = "DELETE FROM tb_komentarproyek WHERE id_proyekstep='".$data["id_proyekstep"]."'";
              $hasil_query = mysqli_query($conn, $query);

        }}
        
        
        $query = "DELETE FROM tb_proyekstep WHERE id_proyek='$id'";
        $hasil_query = mysqli_query($conn, $query);
        
        $getidd = "SELECT * FROM tb_kelompok WHERE id_proyek='$id'";
          $ekss = mysqli_query($conn, $getidd);
          $hasill = mysqli_num_rows($ekss);

        if($hasill>0){
            while($dataa = mysqli_fetch_array($ekss)){
                
                $query = "DELETE FROM tb_kelompoksiswa WHERE id_kelompok='".$dataa["id_kelompok"]."'";
                $hasil_query = mysqli_query($conn, $query);
                $query = "DELETE FROM tb_ketua WHERE id_kelompok='".$dataa["id_kelompok"]."'";
                $hasil_query = mysqli_query($conn, $query);

        }}

        $query = "DELETE FROM tb_kelompok WHERE id_proyek='$id'";
        $hasil_query = mysqli_query($conn, $query);
        $query = "DELETE FROM tb_proyek WHERE id_proyek='$id'";
        $hasil_query = mysqli_query($conn, $query);

        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
        die ("Gagal menghapus proyek: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
        } else {
        echo "<script>alert('Sukses menghapus data proyek!');window.location='tugas.php';</script>";
        }
?>