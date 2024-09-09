<?php
    include "../../../koneksi.php";
    $id = $_GET["id_tugas"];
    //mengambil id yang ingin dihapus

        //jalankan query DELETE untuk menghapus data
        $getkomen = "SELECT * FROM tb_komentartugas WHERE id_tugas='$id'";
          $ekskomen = mysqli_query($conn, $getkomen);
          $hasilkomen = mysqli_num_rows($ekskomen);
          if($hasilkomen>0){
            while($datakomen = mysqli_fetch_array($ekskomen)){
                
                $query = "DELETE FROM tb_balasantugas WHERE id_komentartugas='".$datakomen["id_komentartugas"]."'";
                $hasil_query = mysqli_query($conn, $query);

        }}
        
        $query = "DELETE FROM tb_komentartugas WHERE id_tugas='$id'";
        $hasil_query = mysqli_query($conn, $query);

        $getid = "SELECT * FROM tb_ketuntasantugas WHERE id_tugas='$id'";
          $eks = mysqli_query($conn, $getid);
          $hasil = mysqli_num_rows($eks);

        if($hasil>0){
            while($data = mysqli_fetch_array($eks)){
                
                $query = "DELETE FROM tb_nilaitugas WHERE id_ketuntasantugas='".$data["id_ketuntasantugas"]."'";
                $hasil_query = mysqli_query($conn, $query);

        }}

        
        
        $query = "DELETE FROM tb_ketuntasantugas WHERE id_tugas='$id'";
        $hasil_query = mysqli_query($conn, $query);
        $query = "DELETE FROM tb_tugas WHERE id_tugas='$id'";
        $hasil_query = mysqli_query($conn, $query);

        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
        die ("Gagal menghapus tugas: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
        } else {
        echo "<script>alert('Sukses menghapus data tugas!');window.location='tugas.php';</script>";
        }
?>