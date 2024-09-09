<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='../user/login.php';</script>";
        exit;
    }

    $id_akun = $_SESSION['id_akun'];
    $nama_guru = $_SESSION['nama_guru'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $nip = $_SESSION['nip'];
    $status = $_SESSION['status'];
    
    include "../../../koneksi.php";
                        
    $get="SELECT * FROM tb_proyek WHERE id_proyek='".$_GET["id_proyek"]."'";
    $status = mysqli_query($conn, $get);
    $hasil = mysqli_num_rows($status);
    if($hasil>0){
      while($data = mysqli_fetch_array($status)){ 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SCOPE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../../text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/logo_scope_mini.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../dashboard-guru.php"><img src="../../images/logo_scope.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../dashboard-guru.php"><img src="../../images/logo_scope_mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        
        <ul class="navbar-nav navbar-nav-right">
          
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell mx-0"></i>
              <?php //NOTIFIKASI
              
                          
              include "../../../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NULL");
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
                                        WHERE tb_balasanproyek.id_balasanproyek IS NULL");
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
              
                          
              include "../../../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NULL");
              $hasilkomentugas = mysqli_num_rows($getkomentugas);   

              if($hasilkomentugas>0){
                  while($notifkomentugas = mysqli_fetch_array($getkomentugas)){ 
                    echo "<a href='detailtugas.php?id_tugas=".$notifkomentugas['id_tugas']."' class='dropdown-item preview-item'>";
                    echo "<div class='preview-thumbnail'><div class='preview-icon bg-success'>";
                    echo "<i class='ti-comment-alt mx-0'></i>";
                    echo "</div></div>";
                    echo "<div class='preview-item-content'>";
                    echo "<h6 class='preview-subject font-weight-normal'>Komentar Baru</h6>";
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
                                        WHERE tb_balasanproyek.id_balasanproyek IS NULL");
                $hasilkomenproyek = mysqli_num_rows($getkomenproyek);   

                if($hasilkomenproyek>0){
                    while($notifkomenproyek = mysqli_fetch_array($getkomenproyek)){ 
                      echo "<a href='detailproyek.php?id_proyek=".$notifkomenproyek['id_proyek']."' class='dropdown-item preview-item'>";
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
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" name="profileDropdown">
            <?php echo "<img src='../../images/pengguna/".$foto."' alt='profile'/>" ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="../user/logout.php" class="dropdown-item">
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
      <nav class="sidebar sidebar-offcanvas" name="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../dashboard-guru.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../siswa/siswa.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../materi/materi.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Materi</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="../tugas/tugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Tugas</span>
            </a>
          </li>  
          <li class="nav-item">
            <a href="../../profilpembuat.php" class="nav-link">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profil Pembuat</span>
            </a>            
          </li>        
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <table style="width: 100%;">
            <tr>
              <td>
                <h3 class="font-weight-bold"><?php echo $data['nama_proyek']; ?></h3>
              </td>
              <td align="right">
                <?php
                echo "<a href ='editproyek.php?id_proyek=".$_GET["id_proyek"]."' name='detail'><button type='button' class='btn btn-primary btn-icon-text'>
                Edit Proyek</button></a>";
                ?>
              <?php
                echo "<a href ='hapusproyek.php?id_proyek=".$data['id_proyek']."' name='hapus'>
                  <button type='button' class='btn btn-danger'>Hapus Proyek</button>
                </a>";
                ?>
              </td>
            </tr>
          </table><br>
          <style>
            html,
            body {
              height: 100%;
              width: 100%;
            }
            .container {
              position: relative;
              width: 100%;
              height: 0;
              padding-bottom: 56.25%;
            }
            .video {
              position: absolute;
              top: 0;
              left: 0;
              width: 100% !important;
              height: auto;
              min-height: 100%;
              overflow: hidden;
            }
            .coverr{
              position: absolute;
              top: 0;
              left: 0;
              width: 100% !important;
              height: auto;
              min-height: 100%;
              overflow: hidden;
            }
          </style>


          

          <div class="row">
          <div class="col-md-4 grid-margin">
            <div class="card">
              <div class="card-body">
                <p class="card-title mb-0">Ketuntasan</p><br><br>
                
                <?php
                      include "../../../koneksi.php";
                      $getstatus="SELECT jumlah_kelompok FROM tb_proyek WHERE id_proyek='".$_GET["id_proyek"]."'";
                      $statusnya = mysqli_query($conn, $getstatus);
                      $hasilnya = mysqli_num_rows($statusnya);
                      if($hasilnya>0){
                        while($datanya = mysqli_fetch_array($statusnya)){

                      $getsiswa = "SELECT tb_proyek.jumlah_step, COUNT(tb_kelompok.id_kelompok) as ketuntasan
                      FROM tb_kelompok
                      JOIN tb_ketuntasanproyek ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                      JOIN tb_proyekstep ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                      JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                      WHERE tb_ketuntasanproyek.status='Selesai' AND tb_proyek.id_proyek='".$_GET["id_proyek"]."'
                      GROUP BY tb_kelompok.id_kelompok
                      HAVING tb_proyek.jumlah_step = COUNT(tb_kelompok.id_kelompok)";
                      $eks = mysqli_query($conn, $getsiswa);
                      $hasil = mysqli_num_rows($eks);
                      if($hasil>0){

                          $persen=($hasil/$datanya['jumlah_kelompok']) * 100;
                          
                          echo "<div class='progress'>";
                          echo "<div class='progress-bar bg-success' role='progressbar' style='width: ";
                          while($data = mysqli_fetch_array($eks)){
                            echo $persen;
                          }
                          echo "%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>";
                          echo "</div><br>";
                          echo "<p class='card-description'>".$hasil." dari ".$datanya['jumlah_kelompok']." kelompok telah menuntaskan proyek</p>";
                          echo "<br>";
                      } 
                      else{
                          
                        echo "<div class='progress'>";
                        echo "<div class='progress-bar bg-success' role='progressbar' style='width: 0%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>";
                        echo "</div><br>";
                        echo "<p class='card-description'>".$datanya['jumlah_kelompok']." kelompok belum menuntaskan proyek</p>";
                        echo "<br>";

                      }
                    
                    }}
                        
                      
                      ?>
                
                
                    
                          <?php

                          include "../../../koneksi.php";

                          $getsiswa = "SELECT tb_proyekstep.nama_step, tb_kelompok.id_kelompok, tb_siswa.nama_siswa, tb_proyek.jumlah_step, COUNT(tb_kelompok.id_kelompok) as ketuntasan, TRUNCATE(((COUNT(tb_kelompok.id_kelompok)/tb_proyek.jumlah_step)*100),0) as persen
                          FROM tb_kelompok
                          JOIN tb_ketuntasanproyek ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                          JOIN tb_proyekstep ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                          JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                          JOIN tb_ketua ON tb_ketua.id_kelompok=tb_kelompok.id_kelompok
                          JOIN tb_siswa ON tb_ketua.id_siswa=tb_siswa.id_siswa
                          WHERE tb_ketuntasanproyek.status='Selesai' AND tb_proyek.id_proyek='".$_GET["id_proyek"]."'
                          GROUP BY tb_kelompok.id_kelompok";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);

                          echo "<div class='table-responsive'>
                          <table class='table table-striped'>
                            <thead>
                              <tr>
                                <th>
                                  ID Kelompok
                                </th>
                                <th>
                                  Progres
                                </th>
                              </tr>
                            </thead>
                            <tbody>";
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){

                                echo "<tr>";
                                echo "<td>".$data['id_kelompok']."</td>";
                                
                                if($data['persen']!=100){
                                echo "<td><div class='progress'>";
                                echo "<div class='progress-bar bg-success' role='progressbar' style='width: ".$data['persen']."%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>"; 
                                echo "</div></div></td>";
                                }
                                else{
                                  echo "<td class='font-weight-medium'><div class='badge badge-success'>Selesai</div>";
                                }
                                echo "</tr>";
                              }
                          }else{
                            //$getsiswa = "SELECT * FROM tb_kelompok JOIN tb_proyek ON
                            //tb_kelompok.id_proyek=tb_proyek.id_proyek WHERE tb_proyek.id_proyek='".$_GET["id_proyek"]."'";
                            //$eks = mysqli_query($conn, $getsiswa);
                            //$hasil = mysqli_num_rows($eks);
                            //if($hasil>0){
                              //while($data = mysqli_fetch_array($eks)){
                                echo "<tr><td colspan='5'>Belum ada kelompok<br><br>yang mengerjakan proyek<br><br><br></td></tr>";
                              //}
                            //}else{
                              //echo "<tr><td colspan='5'>Anda belum mengatur kelompok<br><br><br></td></tr>";
                            //}
                             
                          }
                          echo "
                          </tbody>      
                      </table>
                    </div>";
                            
                          
                          ?>
                  
              </div>
            </div>
          </div>

          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p class="card-title mb-0">Detail Ketuntasan Kelompok</p><br><br>
                
                
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              ID Kelompok
                            </th>
                            <th>
                              Nama Kelompok
                            </th>
                            <th>
                              Status
                            </th>
                            <th>
                              Nilai
                            </th>
                            <th>
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          include "../../../koneksi.php";

                          $getsiswa = "SELECT tb_proyekstep.tgl_akhir, tb_ketuntasanproyek.tgL_pengumpulan, tb_kelompok.id_kelompok, tb_nilaistep.nilai, tb_proyekstep.id_proyekstep, tb_proyekstep.nama_step, tb_ketuntasanproyek.status 
                          FROM tb_kelompok JOIN tb_ketuntasanproyek ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok 
                          JOIN tb_proyekstep ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep 
                          JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek 
                          JOIN tb_nilaistep ON tb_nilaistep.id_ketuntasanproyek=tb_ketuntasanproyek.id_ketuntasanproyek
                          WHERE tb_proyek.id_proyek='".$_GET["id_proyek"]."' 
                          ORDER BY tb_kelompok.id_kelompok";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){

                                echo "<tr>";
                                echo "<td>".$data['id_kelompok']."</td>";
                                if($data['tgl_akhir']<$data['tgL_pengumpulan']){
                                  echo "<td><div class='badge badge-danger'>!</div> ".$data['nama_step']."
                                  </td>";
                                }else{
                                  echo "<td>".$data['nama_step']."</td>";
                                } 

                                
                                if($data['status']=='Selesai'){
                                  echo "<td class='font-weight-medium'>
                                  <i class='ti-check'></i>
                                  </td>";
                                }
                                else{
                                  echo "<td class='font-weight-medium'>
                                  <i class='ti-close'></i>
                                  </td>";
                                }
                                echo "<td>".$data['nilai']."</td>"; 
                                echo "<td><a href ='detailstepkelompok.php?id_proyekstep=".$data['id_proyekstep']."& id_kelompok=".$data["id_kelompok"]."' name='detail'><button type='button' class='btn btn-primary btn-sm'>Detail</button></a>&nbsp";
                                echo "</tr>";
                              }
                          }else{
                              echo "<tr><td colspan='5'>Belum ada kelompok yang terdaftar<br><br><br>
                                    </td></tr>";
                          }
                            
                          
                          ?>
                          </tbody>      
                      </table>
                    </div>
                  
              </div>
            </div>
          </div>
      

          </div>

          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                  <div class="card-body">
                    <p class="card-title mb-0">Kelompok</p><br><br>

                    <div class="table-responsive">
                      
                            <?php

                            include "../../../koneksi.php";

                            $getsiswa = "SELECT * FROM tb_kelompok WHERE id_proyek='".$_GET["id_proyek"]."'";
                            $eks = mysqli_query($conn, $getsiswa);
                            $hasil = mysqli_num_rows($eks);

                            if($hasil>0){
                              while($data = mysqli_fetch_array($eks)){

                                  echo "<a href ='detailkelompok.php?id_kelompok=".$data['id_kelompok']."& id_proyek=".$_GET["id_proyek"]."' name='detail'>
                                  <button type='button' class='btn btn-inverse-primary btn-fw'>".$data['nama_kelompok']."</button>
                                  </a><br><br>";
                                }
                              }else{
                                echo "Anda belum mengatur kelompok<br><br>
                                          <a href='kelompok/jumlahanggota.php?id_proyek=".$_GET["id_proyek"]."'>
                                            <button type='button' class='btn btn-outline-primary btn-icon-text'>
                                              <i class='ti-file btn-icon-prepend'></i>
                                              Bentuk Kelompok
                                            </button>
                                          </a>";
                            }
                              
                            
                            ?>
                      </div>
                    
                    
                  </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Komentar Baru</p><br><br>

                  <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Nama Siswa
                            </th>
                            <th>
                              Tahapan Proyek
                            </th>
                            <th>
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php

                          include "../../../koneksi.php";

                          $getsiswa = "SELECT tb_komentarproyek.id_komentarproyek, tb_siswa.nama_siswa, tb_proyekstep.nama_step, tb_komentarproyek.isi_komentarproyek
                          FROM tb_komentarproyek
                                                  JOIN tb_siswa ON tb_komentarproyek.id_siswa=tb_siswa.id_siswa
                                                  JOIN tb_proyekstep ON tb_komentarproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                                                  JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                                                  LEFT JOIN tb_balasanproyek ON tb_balasanproyek.id_komentarproyek=tb_komentarproyek.id_komentarproyek
                                                  WHERE tb_proyek.id_proyek='".$_GET["id_proyek"]."' AND tb_balasanproyek.id_balasanproyek IS NULL";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);

                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){

                                echo "<tr>";
                                echo "<td>".$data['nama_siswa']."</td>";
                                echo "<td>".$data['nama_step']."</td>";
                                echo "<td><a href ='balasproyek.php?id_komentarproyek=".$data['id_komentarproyek']."' name='detail'><button type='button' class='btn btn-primary btn-sm'>Balas Komentar</button></a>&nbsp";
                                echo "</tr>";
                              }
                          }else{
                              echo "<tr><td colspan='4'>Belum ada komentar baru<br><br><br>
                                        
                                    </td></tr>";
                          }
                            
                          
                          ?>
                          </tbody>      
                      </table>
                    </div>
                  
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Riwayat Komentar</p><br><br>
                  <?php
            
                    include "../../../koneksi.php";
                    $getsiswa = "SELECT *
                          FROM tb_komentarproyek
                          JOIN tb_siswa ON tb_komentarproyek.id_siswa=tb_siswa.id_siswa
                          JOIN tb_akun ON tb_siswa.id_akun=tb_akun.id_akun
                          JOIN tb_proyekstep ON tb_komentarproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                          JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                          LEFT JOIN tb_balasanproyek ON tb_balasanproyek.id_komentarproyek=tb_komentarproyek.id_komentarproyek
                          WHERE tb_proyek.id_proyek='".$_GET["id_proyek"]."' AND tb_balasanproyek.id_balasanproyek IS NOT NULL";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                    
                  ?>

                  <ul class="icon-data-list">
                    <?php
                      if($hasil>0){
                        while($data = mysqli_fetch_array($eks)){
                          echo "<li>";
                          echo "<div class='d-flex'>";
                          echo "<img src='../../images/pengguna/".$data['foto']."' alt='user'>";
                          echo "<div>";
                          echo "<a href ='balasproyek.php?id_komentarproyek=".$data['id_komentarproyek']."' name='detail'><p class='text-info mb-1'>".$data['nama_siswa']."</a></p>";
                          echo "<small>".date('d M Y',(strtotime($data["tanggal"])))."</small>";
                          
                          echo "</div>";
                          echo "</div>";
                          echo "</li>";
                           
                        }
                      }else{
                          echo "<tr><td colspan='5'>Belum ada riwayat komentar</td></tr>";
                      }                           
                    ?>                        
                  </ul>
                  
                  
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/dashboard.js"></script>
  <script src="../../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body><?php
      }
        } else echo "Data tidak ditemukan";
?>

</html>

