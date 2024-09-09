<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='../../user/login.php';</script>";
        exit;
    }

    $id_akun = $_SESSION['id_akun'];
    $nama_guru = $_SESSION['nama_guru'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $nip = $_SESSION['nip'];
    $status = $_SESSION['status'];
    

    include "../../../../koneksi.php";
	  $query = mysqli_query($conn, "SELECT * FROM tb_kelompok WHERE id_proyek='".$_GET["id_proyek"]."' LIMIT 4,1");
    if ($data = mysqli_fetch_array($query)){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SCOPE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../../../text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/logo_scope_mini.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../../dashboard-guru.php"><img src="../../../images/logo_scope.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../../dashboard-guru.php"><img src="../../../images/logo_scope_mini.png" alt="logo"/></a>
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
                  <p>Masukkan nama ketua</p>
                  <img style="width:60%;" src="../../../images/panduan/nama ketua.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Masukkan nama anggota 1 dan seterusnya</p>
                  <img style="width:60%;" src="../../../images/panduan/nama anggota.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Klik Lanjutkan untuk kelompok selanjutnya</p>
                  <img style="width:30%;" src="../../../images/panduan/button lanjutkan 2.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Klik Selesai jika pembuatan kelompok sudah selesai</p>
                  <img style="width:25%;" src="../../../images/panduan/button selesai.png">
                  </p>
                </div>
              </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell mx-0"></i>
              <?php //NOTIFIKASI
              
                          
              include "../../../../koneksi.php";
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
              
                          
              include "../../../../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NULL");
              $hasilkomentugas = mysqli_num_rows($getkomentugas);   

              if($hasilkomentugas>0){
                  while($notifkomentugas = mysqli_fetch_array($getkomentugas)){ 
                    echo "<a href='../detailtugas.php?id_tugas=".$notifkomentugas['id_tugas']."' class='dropdown-item preview-item'>";
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
                      echo "<a href='../detailproyek.php?id_proyek=".$notifkomenproyek['id_proyek']."' class='dropdown-item preview-item'>";
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
            <?php echo "<img src='../../../images/pengguna/".$foto."' alt='profile'/>" ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="../../user/logout.php" class="dropdown-item">
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
            <a class="nav-link" href="../../../dashboard-guru.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../../siswa/siswa.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../materi/materi.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Materi</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="../../tugas/tugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Tugas</span>
            </a>
          </li>          
          <li class="nav-item">
            <a href="../../../profilpembuat.php" class="nav-link">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profil Pembuat</span>
            </a>            
          </li>        
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="font-weight-bold">Kelompok 5</h3><br>
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
        
          
          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <form class="forms-sample" class="pt-3" method="POST" action="cek5.php?id_proyek=<?php echo $data["id_proyek"]; ?>" enctype="multipart/form-data">    
              <?php echo $data['id_kelompok'];echo $data['jumlah_anggota'];?>
                  
                      <?php
                       if($data['jumlah_anggota']==1){
                       
                            echo "<div class='form-group'>";
                            echo "<label for='exampleInputUsername1'>Nama Ketua</label>";
                            echo "<select class='form-control' name='ketua'>";
                            
                            $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                            echo "</select></div>";
                       }

                       if($data['jumlah_anggota']==2){
                       
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Ketua</label>";
                              echo "<select class='form-control' name='ketua'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                              
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 1</label>";
                              echo "<select class='form-control' name='anggota1'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                       }

                       if($data['jumlah_anggota']==3){
                       
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Ketua</label>";
                              echo "<select class='form-control' name='ketua'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                              
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 1</label>";
                              echo "<select class='form-control' name='anggota1'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 2</label>";
                              echo "<select class='form-control' name='anggota2'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                       }

                       if($data['jumlah_anggota']==4){
                       
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Ketua</label>";
                              echo "<select class='form-control' name='ketua'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                              
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 1</label>";
                              echo "<select class='form-control' name='anggota1'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 2</label>";
                              echo "<select class='form-control' name='anggota2'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 3</label>";
                              echo "<select class='form-control' name='anggota3'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                       }

                       if($data['jumlah_anggota']==5){
                       
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Ketua</label>";
                              echo "<select class='form-control' name='ketua'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                              
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 1</label>";
                              echo "<select class='form-control' name='anggota1'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 2</label>";
                              echo "<select class='form-control' name='anggota2'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 3</label>";
                              echo "<select class='form-control' name='anggota3'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 4</label>";
                              echo "<select class='form-control' name='anggota4'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                       }

                       if($data['jumlah_anggota']==6){
                       
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Ketua</label>";
                              echo "<select class='form-control' name='ketua'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                              
                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 1</label>";
                              echo "<select class='form-control' name='anggota1'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 2</label>";
                              echo "<select class='form-control' name='anggota2'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 3</label>";
                              echo "<select class='form-control' name='anggota3'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 4</label>";
                              echo "<select class='form-control' name='anggota4'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";

                              echo "<div class='form-group'>";
                              echo "<label for='exampleInputUsername1'>Nama Anggota 5</label>";
                              echo "<select class='form-control' name='anggota5'>";
                              
                              $get = "SELECT * FROM tb_siswa";
                                  $eks = mysqli_query($conn, $get);
                                  $hasil = mysqli_num_rows($eks);
                                  
                                  if($hasil>0){
                                    while($data = mysqli_fetch_array($eks)){
                                      echo "<option>".$data['id_siswa']." - ".$data['nama_siswa']."</option>";
                                    }}
                              echo "</select></div>";
                       }
                      ?>     
                  
                  
                  <table style="width: 100%;">
                    <tr>
                      <td style="text-align: right;">
                        <?php
                        $getidproyek= "SELECT MAX(id_proyek) as id_proyek from tb_proyek ORDER BY id_proyek DESC LIMIT 1";
                        $hasilnya = mysqli_query($conn, $getidproyek);
                        $bariss = mysqli_fetch_array($hasilnya);
                        $id_proyek = $bariss['id_proyek'];

                        $getjmlklp = "SELECT jumlah_kelompok from tb_proyek WHERE id_proyek='".$_GET["id_proyek"]."'";
                        $hasil = mysqli_query($conn, $getjmlklp);
              
                        $baris = mysqli_fetch_array($hasil);
                        $jumlahklp = $baris['jumlah_kelompok'];
                        if($jumlahklp>5){
                          echo "<button type='submit' name='btn_selesai' class='btn btn-primary mr-2'>Lanjutkan</button>";
                        }
                        else{
                          echo "<button type='submit' name='btn_selesai' class='btn btn-primary mr-2'>Selesai</button>";
                        }
                        ?>
                        
                      </td>
                    </tr>
                  </table>
                </form>
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
  <script src="../../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../../vendors/chart.js/Chart.min.js"></script>
  <script src="../../../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../../../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../../js/off-canvas.js"></script>
  <script src="../../../js/hoverable-collapse.js"></script>
  <script src="../../../js/template.js"></script>
  <script src="../../../js/settings.js"></script>
  <script src="../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../js/dashboard.js"></script>
  <script src="../../../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body><?php
        } else echo "Data tidak ditemukan";
?>

</html>

