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
    
    include "../../../koneksi.php";
    $query = mysqli_query($conn, "SELECT * FROM tb_materi WHERE id_materi='".$_GET["id_materi"]."'");
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
        <a class="navbar-brand brand-logo mr-5" href="../../dashboard-siswa.php"><img src="../../images/logo_scope.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../dashboard-siswa.php"><img src="../../images/logo_scope.png" alt="logo"/></a>
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
                  <table style="width:100%;">
                    <tr>
                      <td>
                      <p>Klik button play untuk <br>memutar video materi</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/play video.png"></td>
                    </tr>
                  </table>                
                  
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <table style="width:100%;">
                    <tr>
                      <td>
                      <p>Buka materi yang <br>belum dipelajari di <br>rekomendasi materi</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/rekomendasi.png"></td>
                    </tr>
                  </table>                
                  
                  </p>
                </div>
              </a>    
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <table style="width:100%;">
                    <tr>
                      <td>
                      <p>Buka materi yang <br>belum dipelajari di <br>rekomendasi materi</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/rekomendasi.png"></td>
                    </tr>
                  </table>                
                  
                  </p>
                </div>
              </a>  
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <br>
                  <p>Kerjakan Kuis untuk menuntaskan materi</p>
                  <img style="width:50%;" src="../../images/panduan/kerjakan kuis.png">
                  </p>
                </div>
              </a>      
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <table style="width:100%;">
                    <tr>
                      <td>
                      <p>Lihat Detail Kuis <br>yang sudah dikerjakan</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/lihat detail kuis.png"></td>
                    </tr>
                  </table>   
                </div>
              </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="icon-bell mx-0"></i>
              <?php //NOTIFIKASI
              
                          
              include "../../../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NOT NULL");
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
                                        WHERE tb_balasanproyek.id_balasanproyek IS NOT NULL");
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
              WHERE tb_balasantugas.id_balasantugas IS NOT NULL");
              $hasilkomentugas = mysqli_num_rows($getkomentugas);   

              if($hasilkomentugas>0){
                  while($notifkomentugas = mysqli_fetch_array($getkomentugas)){ 
                    echo "<a href='../tugas/detailtugas.php?id_tugas=".$notifkomentugas['id_tugas']."' class='dropdown-item preview-item'>";
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
                                        WHERE tb_balasanproyek.id_balasanproyek IS NOT NULL");
                $hasilkomenproyek = mysqli_num_rows($getkomenproyek);   

                if($hasilkomenproyek>0){
                    while($notifkomenproyek = mysqli_fetch_array($getkomenproyek)){ 
                      echo "<a href='../tugas/detailproyek.php?id_proyek=".$notifkomenproyek['id_proyek']."' class='dropdown-item preview-item'>";
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
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../dashboard-siswa.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="materi.php">
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
            <a href="../../profilpembuatsiswa.php" class="nav-link">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profil Pembuat</span>
            </a>            
          </li>       
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="font-weight-bold"><?php echo $data['nama_materi'];?></h3><br>
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
          <div class="row" id="html">
          <?php
          $link=substr($data['link_video'],-11);
          ?>
            <div class="col-md-8 stretch-card grid-margin">
              <div class="card" style="background-color: transparent; padding: 1px;">
                <div class="card-body" style="padding: 0px;">
                  <div class="container">
                    <iframe class="video" src="//www.youtube.com/embed/<?php echo $link;?>" frameborder="0" allowfullscreen="allowfullscreen">
                    </iframe>
                  </div>                  
                </div>
              </div>
            </div>
            
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card" style="background-color: transparent; padding: 1px;">
                <div class="card-body" style="padding: 0px;">
                  <p class="card-title">Rekomendasi Materi Untuk Kamu</p>
                  
                    
                          <?php
                        
                          include "../../../koneksi.php";
                          $getsiswa = "SELECT * FROM tb_materi JOIN tb_ketuntasanmateri
                          ON tb_materi.id_materi=tb_ketuntasanmateri.id_materi
                          JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasanmateri.id_siswa
                          WHERE tb_ketuntasanmateri.status='Belum Dimulai' AND tb_siswa.id_siswa='".$id_siswa."' 
                          AND tb_materi.id_materi!='".$_GET["id_materi"]."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($datanya = mysqli_fetch_array($eks)){
                              
                              $link=substr($datanya['link_video'],-11);
                              $thumbnail="http://img.youtube.com/vi/".$link."/maxresdefault.jpg";
                              echo "<a href='detailmateri.php?id_materi=".$datanya['id_materi']."'>";
                              echo "<div class='card' style='padding: 1px; border-radius: 10px; margin-bottom: 10px;'>";
                              echo "<div class='card-body' style='padding: 5px;'>";
                              echo "<table>";
                              echo "<tr style='vertical-align: top;'>";
                              echo "<td style='height: 30px; width: 40%; text-align: left;'>";
                              echo "<img style='width: 100%; border-radius: 3px;' src='".$thumbnail."'>";
                              echo "</td>";
                              echo "<td style='height: 30px; width: 40%; text-align: left;'>";
                              echo "<p style='padding-left: 10px; font-weight: 700;'>".$datanya['nama_materi']."</p>";
                              echo "</td>";
                              echo "</tr>";
                              echo "</table></div></div>";
                              echo "</a>";

                            }
                          }else{
                            echo "<p>Belum ada materi baru yang perlu kamu pelajari</p>";
                          }
                          
                          ?>
                          
                    
                    
                  
                </div>
              </div>
            </div>
            <div class="col-md-9 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                            <div class="ml-xl-3 mt-3">
                              <p class="card-title"><?php echo $data['isi'];?></p>
                              <p class="font-weight-500">Selengkapnya, pelajari modul di bawah ini!</p><br>
                              <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="../../dokumen/panduan_materi/<?php echo $data['file']; ?>" allowfullscreen></iframe>
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
            <div class="col-md-3 grid-margin">
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card position-relative">
                    <div class="card-body">
                      <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row">
                              <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                                <div class="ml-xl-3 mt-3">
                                  <p class="card-title">Kuis</p>
                                  <?php 
                                  $gettuntas = "SELECT * FROM tb_jawaban JOIN tb_siswa
                                  ON tb_jawaban.id_siswa=tb_siswa.id_siswa
                                  JOIN tb_soal ON tb_soal.id_soal=tb_jawaban.id_soal
                                  JOIN tb_kuis ON tb_kuis.id_kuis=tb_soal.id_kuis
                                  JOIN tb_materi ON tb_materi.id_materi=tb_kuis.id_materi
                                  WHERE tb_siswa.id_siswa='".$id_siswa."' AND tb_materi.id_materi='".$_GET['id_materi']."'";
                                  $ekstuntas = mysqli_query($conn, $gettuntas);
                                  $hasiltuntas = mysqli_num_rows($ekstuntas);
                                  
                                  if($hasiltuntas>0){
                                    $nilai=0;
                                    while($tuntas = mysqli_fetch_array($ekstuntas)){
                                      $nilai=$nilai+$tuntas['poin'];
                                    }
                                      echo "<p class='text-muted'>Nilai Kuis Anda</p>";
                                      echo "<h3 class='text-primary fs-30 font-weight-medium'>".$nilai."</h3><br>";
                                      echo "<a href='kuis/detail.php?id_materi=".$_GET['id_materi']."'><button type='button' class='btn btn-success btn-icon-text'>                                                 
                                            Lihat Detail Hasil</button>";
                                    }else{
                                      $gettuntas = "SELECT * FROM tb_kuis
                                      JOIN tb_materi ON tb_materi.id_materi=tb_kuis.id_materi
                                      WHERE tb_materi.id_materi='".$_GET['id_materi']."'";
                                      $ekstuntas = mysqli_query($conn, $gettuntas);
                                      $hasiltuntas = mysqli_num_rows($ekstuntas);
                                      
                                      if($hasiltuntas>0){
                                        echo "<p class='font-weight-500'>Kerjakan kuis di bawah ini</p><br>
                                        <a href='kuis/kuis.php?id_materi=".$data['id_materi']."'>
                                      <button type='button' class='btn btn-outline-primary btn-icon-text'>
                                        <i class='ti-file btn-icon-prepend'></i>
                                        Kerjakan Kuis
                                      </button>
                                    </a>";

                                      }else{
                                        echo "<p class='font-weight-500'>Kuis belum tersedia</p><br>";
                                      }


                                      

                                    }
                                  ?>
                                  
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
        } else echo "Data tidak ditemukan";
?>

</html>

