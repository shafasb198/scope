<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='pages-siswa/user/login.php';</script>";
        exit;
    }

    $id_akun = $_SESSION['id_akun'];
    $nama_siswa = $_SESSION['nama_siswa'];
    $id_siswa = $_SESSION['id_siswa'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $status = $_SESSION['status'];
    
    include "../koneksi.php";
    
    //$getidpemilik = "SELECT tb_pemilik.id_pemilik FROM tb_pengguna JOIN tb_pemilik
    //ON tb_pemilik.id_pengguna=tb_pengguna.id_pengguna
    //JOIN tb_kos ON tb_pemilik.id_pemilik=tb_kos.id_pemilik
    //WHERE tb_pengguna.id_pengguna='$id_pengguna'";
    //$hasil = mysqli_query($conn, $getidpemilik);
    //$idpemilik = mysqli_num_rows($hasil);

    
?>



<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
  }
  
  .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }
  
  .container {
    padding: 2px 16px;
  }
  </style>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SCOPE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo_scope_mini.png" />
  <style>
                .a:hover{
                  font-weight:bold;
                }
                </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="dashboard-siswa.php"><img src="images/logo_scope.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard-siswa.php"><img src="images/logo_scope_mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          
        <li class="nav-item dropdown show">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="true">
            <i class="ti-info-alt mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-bold float-left dropdown-header">Petunjuk Penggunaan</p>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Pada halaman ini, disajikan ringkasan tugas <br>dan nilai yang didapatkan oleh siswa</p>
                  </p>
                </div>
              </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell mx-0"></i>
              <?php //NOTIFIKASI
              
                          
              include "../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NOT NULL AND tb_siswa.id_siswa='".$id_siswa."'");
              $hasilkomentugas = mysqli_num_rows($getkomentugas);   

              if($hasilkomentugas>0){
                echo "<span class='count'></span>";
                }
              else if($hasilkomentugas<0){
                $getkomenproyek = mysqli_query($conn,"SELECT tb_proyek.id_proyek, tb_siswa.nama_siswa, tb_proyekstep.nama_step, tb_komentarproyek.isi_komentarproyek
                FROM tb_komentarproyek
                                        JOIN tb_siswa ON tb_komentarproyek.id_siswa=tb_siswa.id_siswa
                                        JOIN tb_proyekstep ON tb_komentarproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                                        JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                                        LEFT JOIN tb_balasanproyek ON tb_balasanproyek.id_komentarproyek=tb_komentarproyek.id_komentarproyek
                                        WHERE tb_balasanproyek.id_balasanproyek IS NOT NULL AND tb_siswa.id_siswa='".$id_siswa."'");
                $hasilkomenproyek = mysqli_num_rows($getkomenproyek);   

                if($hasilkomenproyek>0){
                  echo "<span class='count'></span>";
                    
                  }
              } else{
                echo "<span></span>";
              }     
              
              
              
              ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifikasi</p>
              
              <?php
              
                          
              include "../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NOT NULL AND tb_siswa.id_siswa='".$id_siswa."'");
              $hasilkomentugas = mysqli_num_rows($getkomentugas);   

              if($hasilkomentugas>0){
                  while($notifkomentugas = mysqli_fetch_array($getkomentugas)){ 
                    echo "<a href='pages-siswa/tugas/detailtugas.php?id_tugas=".$notifkomentugas['id_tugas']."' class='dropdown-item preview-item'>";
                    echo "<div class='preview-thumbnail'><div class='preview-icon bg-success'>";
                    echo "<i class='ti-comment-alt mx-0'></i>";
                    echo "</div></div>";
                    echo "<div class='preview-item-content'>";
                    echo "<h6 class='preview-subject font-weight-normal'>Balasan Baru</h6>";
                    echo "<p class='font-weight-light small-text mb-0 text-muted'>Tugas: ".$notifkomentugas['nama_tugas']."</p>";
                    echo "</div></a>";
                  }
                }
              else if($hasilkomentugas<0){
                $getkomenproyek = mysqli_query($conn,"SELECT tb_proyek.id_proyek, tb_siswa.nama_siswa, tb_proyekstep.nama_step, tb_komentarproyek.isi_komentarproyek
                FROM tb_komentarproyek
                                        JOIN tb_siswa ON tb_komentarproyek.id_siswa=tb_siswa.id_siswa
                                        JOIN tb_proyekstep ON tb_komentarproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                                        JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                                        LEFT JOIN tb_balasanproyek ON tb_balasanproyek.id_komentarproyek=tb_komentarproyek.id_komentarproyek
                                        WHERE tb_balasanproyek.id_balasanproyek IS NOT NULL AND tb_siswa.id_siswa='".$id_siswa."'");
                $hasilkomenproyek = mysqli_num_rows($getkomenproyek);   

                if($hasilkomenproyek>0){
                    while($notifkomenproyek = mysqli_fetch_array($getkomenproyek)){ 
                      echo "<a href='pages-siswa/tugas/detailproyek.php?id_proyek=".$notifkomenproyek['id_proyek']."' class='dropdown-item preview-item'>";
                      echo "<div class='preview-thumbnail'><div class='preview-icon bg-info'>";
                      echo "<i class='ti-comment-alt mx-0'></i>";
                      echo "</div></div>";
                      echo "<div class='preview-item-content'>";
                      echo "<h6 class='preview-subject font-weight-normal'>Komentar Baru</h6>";
                      echo "<p class='font-weight-light small-text mb-0 text-muted'>Tugas: ".$notifkomenproyek['nama_tugas']."</p>";
                      echo "</div></a>";
                    }
                  }
              } else{
                echo "<a class='dropdown-item preview-item'>";
                      echo "<br><div class='preview-item-content'>";
                      echo "<p class='font-weight-light small-text mb-0 text-muted'>Tidak ada notifikasi</p>";
                      echo "</div></a>";
              }     
              
              
              
              ?>
            </div>
          </li>
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <?php echo "<img src='images/pengguna/".$foto."' alt='profile'/>" ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="pages-siswa/user/logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard-siswa.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="pages-siswa/materi/materi.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Materi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-siswa/tugas/tugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Tugas</span>
            </a>
          </li>        
          <li class="nav-item">
            <a href="profilpembuatsiswa.php" class="nav-link">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profil Pembuat</span>
            </a>            
          </li>        
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang, <?php echo $nama_siswa ?>!</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div class="ml-xl-3 mt-3">
                    <table>
                      <tr>
                        <td>
                          <div class="mr-5 mt-10">
                            <p class="text-muted">Nilai Keseluruhan</p>
                            <h1 class="text-primary font-weight-medium">
                            <?php                            
                            include "../koneksi.php";
                            $getsiswa = "SELECT tb_akun.foto, tb_siswa.id_siswa, tb_akun.foto, tb_siswa.nama_siswa, TRUNCATE(((((COALESCE(tb_nilaitugas.nilai, 0) + 
                            COALESCE(tb_nilaimateri.nilai, 0))/2)+(SUM(tb_nilaistep.nilai)/ 
                            COUNT(tb_proyek.jumlah_step)))/3), 1) as nilai_keseluruhan 
                            FROM tb_ketuntasantugas JOIN tb_siswa ON tb_ketuntasantugas.id_siswa=tb_siswa.id_siswa 
                            JOIN tb_ketuntasanmateri ON tb_ketuntasanmateri.id_siswa=tb_siswa.id_siswa 
                            JOIN tb_kelompoksiswa ON tb_kelompoksiswa.id_siswa=tb_siswa.id_siswa 
                            JOIN tb_ketuntasanproyek ON tb_ketuntasanproyek.id_kelompok=tb_kelompoksiswa.id_kelompok 
                            JOIN tb_nilaitugas ON tb_ketuntasantugas.id_ketuntasantugas=tb_nilaitugas.id_ketuntasantugas 
                            JOIN tb_nilaimateri ON tb_nilaimateri.id_ketuntasanmateri=tb_ketuntasanmateri.id_ketuntasanmateri 
                            JOIN tb_nilaistep ON tb_ketuntasanproyek.id_ketuntasanproyek=tb_nilaistep.id_ketuntasanproyek
                            JOIN tb_kelompok ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                            JOIN tb_proyekstep ON tb_proyekstep.id_proyekstep=tb_ketuntasanproyek.id_proyekstep
                            JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                            JOIN tb_akun ON tb_akun.id_akun=tb_siswa.id_akun
                            WHERE tb_siswa.id_siswa='".$id_siswa."'
                            GROUP BY tb_siswa.id_siswa
                            ORDER BY nilai_keseluruhan DESC";
                            $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);
                            if($hasil>0){
                              while($data = mysqli_fetch_array($eks)){
                              echo $data['nilai_keseluruhan'];
                            }}
                            else{
                              echo "0";
                            }
                            ?>

                            </h1>
                          </div>
                          </td>
                    </table>

                    
                  </div> 
                </div>
              </div>
            </div>
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div class="ml-xl-3 mt-3">
                    <table style="width: 100%;">
                      <tr>
                        <td>
                          <td>
                          <div class="mr-5 mt-10">
                            <p class="text-muted">Nilai Tugas Mandiri</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php                            
                            $getstatus="SELECT SUM(status) as status FROM tb_ketuntasantugas WHERE id_siswa='".$id_siswa."' AND status='Selesai'";
                            $statusnya = mysqli_query($conn, $getstatus);
                            $hasilnya = mysqli_num_rows($statusnya);
                            if($hasilnya>0){
                              while($datanya = mysqli_fetch_array($statusnya)){

                            $getsiswa = "SELECT tb_siswa.nama_siswa, TRUNCATE((COALESCE(tb_nilaitugas.nilai, 0) / '".$datanya["status"]."'),1) as nilai_tugas
                            FROM tb_ketuntasantugas JOIN tb_siswa ON tb_ketuntasantugas.id_siswa=tb_siswa.id_siswa 
                            JOIN tb_nilaitugas ON tb_ketuntasantugas.id_ketuntasantugas=tb_nilaitugas.id_ketuntasantugas 
                            WHERE tb_siswa.id_siswa='".$id_siswa."' AND tb_ketuntasantugas.status='Selesai'
                            GROUP BY tb_siswa.id_siswa";
                            $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);
                            if($hasil>0){
                              while($data = mysqli_fetch_array($eks)){
                              
                                echo $data['nilai_tugas']; 
                              
                              } } 
                              
                            else{
                                echo "0";
                            }
                            } }?>
                            </h3>
                          </div>
                          </td>
                          <td>
                            <div class="mr-5 mt-10">
                            <p class="text-muted">Nilai Proyek</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php
                            
                            $getsiswa = "SELECT tb_siswa.nama_siswa, TRUNCATE((SUM(tb_nilaistep.nilai)/tb_proyek.jumlah_step), 1) as nilai_proyek, COUNT(tb_ketuntasanproyek.status) as ketuntasan, tb_proyek.jumlah_step
                            FROM tb_proyek JOIN tb_proyekstep
                            ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                            JOIN tb_ketuntasanproyek
                            ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                            JOIN tb_nilaistep
                            ON tb_nilaistep.id_ketuntasanproyek=tb_ketuntasanproyek.id_ketuntasanproyek
                            JOIN tb_kelompok
                            ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                            JOIN tb_kelompoksiswa
                            ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                            JOIN tb_siswa
                            ON tb_kelompoksiswa.id_siswa=tb_siswa.id_siswa
                            WHERE tb_ketuntasanproyek.status='Selesai' AND tb_siswa.id_siswa='".$id_siswa."'";
                            $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);
                              if($hasil>0){
                                while($data = mysqli_fetch_array($eks)){
                                  $getjml = "SELECT COUNT(id_proyek) as jumlah_proyek FROM tb_proyek";
                                  $eksjml = mysqli_query($conn, $getjml);
                                  $hasiljml = mysqli_num_rows($eksjml);
                                  if($hasiljml>0){
                                    while($jml = mysqli_fetch_array($eksjml)){
                                      if($jml['jumlah_proyek']!=0){
                                        $nilai=$data['nilai_proyek']/$jml['jumlah_proyek'];
                                      }else{
                                        $nilai=0;
                                      }
                                      echo $nilai;
                                    }
                                  }
                            
                            }}  
                            
                            ?>
                            </h3>
                          </div>
                          </td>
                          <td>
                            <div class="mr-5 mt-10">
                            <p class="text-muted">Nilai Materi</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php
                            
                            
                            $getstatus="SELECT SUM(status) as status FROM tb_ketuntasanmateri WHERE id_siswa='".$id_siswa."' AND status='Selesai'";
                            $statusnya = mysqli_query($conn, $getstatus);
                            $hasilnya = mysqli_num_rows($statusnya);
                            if($hasilnya>0){
                              while($datanya = mysqli_fetch_array($statusnya)){

                            $getsiswa = "SELECT tb_siswa.nama_siswa, TRUNCATE((COALESCE(tb_nilaimateri.nilai, 0) / '".$datanya["status"]."'),1) as nilai_materi
                            FROM tb_ketuntasanmateri JOIN tb_siswa ON tb_ketuntasanmateri.id_siswa=tb_siswa.id_siswa
                            JOIN tb_nilaimateri ON tb_nilaimateri.id_ketuntasanmateri=tb_ketuntasanmateri.id_ketuntasanmateri 
                            WHERE tb_siswa.id_siswa='".$id_siswa."' AND tb_ketuntasanmateri.status='Selesai'
                            GROUP BY tb_siswa.id_siswa";
                            $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);
                            if($hasil>0){
                              while($data = mysqli_fetch_array($eks)){
                              
                                echo $data['nilai_materi']; 
                            
                            } } 
                            else{
                              echo "0";
                            }
                            } }?>
                            </h3>
                          </div>
                        </td>
                        <td>
                            <div class="mr-5 mt-10">
                            <p class="text-muted">Nilai Kuis</p>
                            <h3 class="text-primary fs-30 font-weight-medium">
                            <?php
                            
                            
                            $getstatus="SELECT SUM(status) as status FROM tb_ketuntasanmateri WHERE id_siswa='".$id_siswa."' AND status='Selesai'";
                            $statusnya = mysqli_query($conn, $getstatus);
                            $hasilnya = mysqli_num_rows($statusnya);
                            $datanya = mysqli_fetch_array($statusnya);

                            $getsiswa = "SELECT SUM(tb_jawaban.poin) as nilai FROM tb_materi 
                            JOIN tb_kuis ON tb_materi.id_materi=tb_kuis.id_materi
                            JOIN tb_soal ON tb_soal.id_kuis=tb_kuis.id_kuis
                            JOIN tb_jawaban ON tb_jawaban.id_soal=tb_soal.id_soal
                            JOIN tb_siswa ON tb_siswa.id_siswa=tb_jawaban.id_siswa
                            WHERE tb_siswa.id_siswa='".$id_siswa."'";
                            $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);

                            
                            if($hasil>0){
                              while($data = mysqli_fetch_array($eks)){
                                $rata2=$data['nilai']/$datanya['status'];
                                if($data['nilai']!=NULL){
                                  echo $rata2; 
                                }else{
                                  echo "0";
                                }                             
                            
                            } } 
                            else{
                              echo "0";
                            }?>
                            </h3>
                          </div>
                        </td>
                      </tr>
                    </table>

                    
                  </div> 
                </div>
              </div>
            </div>

            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                
                
                <div class="col-md-6 grid-margin stretch-card">
                  <div class="card position-relative">
                    <div class="card-body">
                      <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                                <div class="ml-xl-3 mt-3">
                                  <div style="font-size: small;" class="text-success">Tugas Proyek Anda</div><br>
                                  

                                  <table class="table table-striped table-borderless">
                                    <thead>
                                      <tr>
                                        <th>Nama Materi</th>
                                        <th>Ketuntasan</th>
                                      </tr>  
                                    </thead>
                                    <tbody>
                                    <?php                            

                                      $getsiswa = "SELECT * FROM tb_proyek
                                      JOIN tb_kelompok ON tb_kelompok.id_proyek=tb_proyek.id_proyek
                                      JOIN tb_kelompoksiswa ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                                      JOIN tb_siswa ON tb_siswa.id_siswa=tb_kelompoksiswa.id_siswa
                                      WHERE tb_siswa.id_siswa='".$id_siswa."' ORDER BY tb_proyek.status DESC";
                                      $eks = mysqli_query($conn, $getsiswa);
                                      $hasil = mysqli_num_rows($eks);
                                      if($hasil>0){
                                        while($data = mysqli_fetch_array($eks)){
                                        
                                          echo "<tr>";
                                          echo "<td><a href='pages-siswa/tugas/detailproyek.php?id_proyek=".$data['id_proyek']."'>".$data['nama_proyek']."</td>";
                                          
                                          $getketuntasan = "SELECT COUNT(tb_proyekstep.id_proyekstep) as ketuntasan
                                          FROM tb_kelompok JOIN tb_ketuntasanproyek ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok 
                                          JOIN tb_nilaistep ON tb_ketuntasanproyek.id_ketuntasanproyek=tb_nilaistep.id_ketuntasanproyek
                                          JOIN tb_proyekstep ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep 
                                          JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek 
                                          WHERE tb_proyek.id_proyek='".$data['id_proyek']."' AND tb_kelompok.id_kelompok='".$data["id_kelompok"]."' AND tb_ketuntasanproyek.status='Selesai'
                                          ORDER BY tb_kelompok.id_kelompok";
                                          $ketuntasannya = mysqli_query($conn, $getketuntasan);
                                          $barisnya = mysqli_num_rows($ketuntasannya); 

                                          $getjumlahstep="SELECT jumlah_step FROM tb_proyek WHERE id_proyek='".$data["id_proyek"]."'";
                                          $stepnya = mysqli_query($conn, $getjumlahstep);
                                          $barisstep = mysqli_num_rows($stepnya);

                                          if($barisstep>0){
                                            while($step = mysqli_fetch_array($stepnya)){

                                          if($barisnya>0){
                                            while($tuntas = mysqli_fetch_array($ketuntasannya)){ 
                                              $persen=($tuntas['ketuntasan']/$step['jumlah_step']) * 100;
                                              if($persen!=100){
                                                echo "<td><div class='progress'>";
                                                echo "<div class='progress-bar bg-success' role='progressbar' style='width: ".$persen."%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>"; 
                                                echo "</div></div></td>";
                                                }
                                                else{
                                                  echo "<td class='font-weight-medium'><div class='badge badge-success'>Selesai</div>";
                                                } 
                                          }}
                                          else{
                                            echo "<td>";
                                                  echo "<div class='mr-5 mt-3'>";
                                                  echo "<p class='text-muted'>Ketuntasan Proyek</p>";
                                                  echo "<h1 style='font-weight: 500;'><h2>0%</h2></h1>";
                                                  echo "</div>";
                                                  echo "</td>";

                                          } }} 
                                          echo "</tr>";
                                        
                                        } 
                                      } 
                                        
                                      else{
                                        echo "<td colspan=2>
                                        Belum ada proyek
                                  
                                        </td>"; 
                                        }
                                      ?>
                                    </tbody>
                                  </table>


                                  
                                </div>  
                              </div>
                              
                            </div>
                          </div>
    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card position-relative">
                    <div class="card-body">
                      <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                                <div class="ml-xl-3 mt-3">
                                  <div style="font-size: small;" class="text-success">Ketuntasan Tugas</div><br>
                                  <div class="mr-5 mt-3">
                                    <?php
                                    $getketuntasantugas = "SELECT * FROM tb_ketuntasantugas JOIN tb_siswa
                                    ON tb_ketuntasantugas.id_siswa=tb_siswa.id_siswa
                                    WHERE tb_siswa.id_siswa='".$id_siswa."' AND tb_ketuntasantugas.status='Belum Dimulai'";
                                    $ketuntasannyatugas = mysqli_query($conn, $getketuntasantugas);
                                    $barisnyatugas = mysqli_num_rows($ketuntasannyatugas); 
                                    ?>
                                    <h1 style="font-weight: 500;"><h2><?php echo $barisnyatugas;?></h2></h1>
                                    <p class="text-muted">Tugas perlu dituntaskan</p>
                                    <br>
                                    <a href="pages-siswa/tugas/tugas.php">
                                    <button type="button" class="btn btn-outline-primary btn-icon-text">
                                      <i class="ti-file btn-icon-prepend"></i>
                                      Detail
                                    </button>
                                    </a>
                                  </div>

                                  
                                </div>  
                              </div>
                              
                            </div>
                          </div>
    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card position-relative">
                    <div class="card-body">
                      <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                                <div class="ml-xl-3 mt-3">
                                  <div style="font-size: small;" class="text-success">Ketuntasan Materi</div><br>
                                  <div class="mr-5 mt-3">
                                  <?php
                                    $getketuntasanmateri = "SELECT * FROM tb_ketuntasanmateri JOIN tb_siswa
                                    ON tb_ketuntasanmateri.id_siswa=tb_siswa.id_siswa
                                    WHERE tb_siswa.id_siswa='".$id_siswa."' AND tb_ketuntasanmateri.status='Belum Dimulai'";
                                    $ketuntasannyamateri = mysqli_query($conn, $getketuntasanmateri);
                                    $barisnyamateri = mysqli_num_rows($ketuntasannyamateri); 
                                    ?>
                                    <h1 style="font-weight: 500;"><h2><?php echo $barisnyamateri;?></h2></h1>
                                    <p class="text-muted">Materi perlu dituntaskan</p>
                                    <br>
                                    <a href="pages-siswa/materi/materi.php">
                                    <button type="button" class="btn btn-outline-primary btn-icon-text">
                                      <i class="ti-file btn-icon-prepend"></i>
                                      Detail
                                    </button>
                                    </a>
                                  </div>

                                  
                                </div>  
                              </div>
                              
                            </div>
                          </div>
    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
                           
            </div>

            
          </div>

          

          
          
          
          
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2024</span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Shafa Salsabila</span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

