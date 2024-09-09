<?php
    include "../../../koneksi.php";
    $id = $_GET["id_materi"];
    //mengambil id yang ingin dihapus

        //jalankan query DELETE untuk menghapus data
        $getid = "SELECT * FROM tb_ketuntasanmateri WHERE id_materi='$id'";
        $eks = mysqli_query($conn, $getid);
        $hasil = mysqli_num_rows($eks);

        if($hasil>0){
            while($data = mysqli_fetch_array($eks)){
                
                $query = "DELETE FROM tb_nilaimateri WHERE id_ketuntasanmateri='".$data["id_ketuntasanmateri"]."'";
                $hasil_query = mysqli_query($conn, $query);

        }}
        
        $query = "DELETE FROM tb_ketuntasanmateri WHERE id_materi='$id'";
        $hasil_query = mysqli_query($conn, $query);

        
        $getidkuis = "SELECT * FROM tb_kuis WHERE id_materi='$id'";
        $ekskuis = mysqli_query($conn, $getidkuis);
        $hasilkuis = mysqli_num_rows($ekskuis);

        if($hasilkuis>0){
            while($datakuis = mysqli_fetch_array($ekskuis)){

                $getidsoal = "SELECT * FROM tb_soal WHERE id_kuis='".$datakuis["id_kuis"]."'";
                $ekssoal = mysqli_query($conn, $getidsoal);
                $hasilsoal = mysqli_num_rows($ekssoal);

                if($hasilsoal>0){
                    while($datasoal = mysqli_fetch_array($ekssoal)){
                        
                        $query = "DELETE FROM tb_jawaban WHERE id_soal='".$datasoal["id_soal"]."'";
                        $hasil_query = mysqli_query($conn, $query);
                        
                        $query = "DELETE FROM tb_opsi WHERE id_soal='".$datasoal["id_soal"]."'";
                        $hasil_query = mysqli_query($conn, $query);

                }}
                
                $query = "DELETE FROM tb_soal WHERE id_kuis='".$datakuis["id_kuis"]."'";
                $hasil_query = mysqli_query($conn, $query);

        }}
        $query = "DELETE FROM tb_kuis WHERE id_materi='$id'";
        $hasil_query = mysqli_query($conn, $query);

        $query = "DELETE FROM tb_materi WHERE id_materi='$id'";
        $hasil_query = mysqli_query($conn, $query);

        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
        die ("Gagal menghapus materi: ".mysqli_errno($conn).
        " - ".mysqli_error($conn));
        } else {
        echo "<script>alert('Sukses menghapus data materi!');window.location='materi.php';</script>";
        }
?>