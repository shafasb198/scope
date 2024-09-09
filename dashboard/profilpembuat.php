<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        echo "<script>alert('Anda Harus Login !!!');</script>";
        echo "<script>location='pages-guru/user/login.php';</script>";
        exit;
    }

    $id_akun = $_SESSION['id_akun'];
    $nama_guru = $_SESSION['nama_guru'];
    $password = $_SESSION['password'];
    $foto = $_SESSION['foto'];
    $nip = $_SESSION['nip'];
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
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="dashboard-guru.php"><img src="images/logo_scope.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="dashboard-guru.php"><img src="images/logo_scope_mini.png" alt="logo"/></a>
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
                  <p>Halaman ini berisi informasi pembuat<br>media pembelajaran scope
                  <br>dan kredit konten yang bersumber<br>dari internet</p>
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
              
                          
              include "../koneksi.php";
              $getkomentugas = mysqli_query($conn,"SELECT tb_komentartugas.id_komentartugas,tb_tugas.id_tugas, tb_tugas.nama_tugas, tb_siswa.nama_siswa, tb_komentartugas.isi_komentartugas
              FROM tb_tugas JOIN tb_komentartugas ON tb_tugas.id_tugas=tb_komentartugas.id_tugas
              JOIN tb_siswa ON tb_komentartugas.id_siswa=tb_siswa.id_siswa
              LEFT JOIN tb_balasantugas ON tb_balasantugas.id_komentartugas=tb_komentartugas.id_komentartugas
              WHERE tb_balasantugas.id_balasantugas IS NULL");
              $hasilkomentugas = mysqli_num_rows($getkomentugas);   

              if($hasilkomentugas>0){
                  while($notifkomentugas = mysqli_fetch_array($getkomentugas)){ 
                    echo "<a href='pages-guru/tugas/detailtugas.php?id_tugas=".$notifkomentugas['id_tugas']."' class='dropdown-item preview-item'>";
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
                      echo "<a href='pages-guru/tugas/detailproyek.php?id_proyek=".$notifkomenproyek['id_proyek']."' class='dropdown-item preview-item'>";
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
              <a href="pages-guru/user/logout.php" class="dropdown-item">
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
            <a class="nav-link" href="dashboard-guru.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="pages-guru/siswa/siswa.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages-guru/materi/materi.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Materi</span>
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="pages-guru/tugas/tugas.php">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Tugas</span>
            </a>
          </li>    
          <li class="nav-item">
            <a href="profilpembuat.php" class="nav-link">
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
                  <h3 class="font-weight-bold">Profil Pembuat</h3>
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          <div class="row">
          <div class="col-md-4 grid-margin">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/panduan/shafasalsabila.png" alt="people">
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin transparent">
              <div class="row">
                <div class="col-md-10 mb-4 stretch-card transparent">
                  <div class="card">
                  <div class="card-body">
                    <p class="card-title mb-0">Data Diri</p><br>
                    <div class="table-responsive">
                      <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                              <th>Nama Lengkap</th><td>: Shafa Salsabila</td>
                            </tr>  
                            <tr>
                              <th>Tempat, Tanggal Lahir</th><td>: Bandung, 19 Agustus 2002</td>
                            </tr>  
                            <tr>
                              <th>NIM</th><td>: 2003467</td>
                            </tr>  
                            <tr>
                              <th>Program Studi</th><td>: Pendidikan Ilmu Komputer</td>
                            </tr> 
                            <tr>
                              <th style="vertical-align:top;">Fakultas</th><td>: Pendidikan Matematika <br><br>&nbsp&nbspdan Ilmu Pengetahuan Alam</td>
                            </tr> 
                            <tr>
                              <th>Perguruan Tinggi</th><td>: Universitas Pendidikan Indonesia</td>
                            </tr>   
                          </thead>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="col-md-2 mb-4 transparent">
                  <div class="card">
                    <div class="card-body">
                      <a href="https://www.linkedin.com/in/shafa-salsabila-a476b6218/">
                      <button type="button" class="btn btn-social-icon btn-outline-linkedin"><i class="ti-linkedin"></i></button>
                      <br><br>
                      <a href="https://www.instagram.com/shafasb__/">
                      <button type="button" class="btn btn-social-icon btn-outline-linkedin"><i class="ti-instagram"></i></button></a>
                      
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <p class="card-title mb-0">Kredit Konten</p><br>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Konten</th>
                          <th>Jenis Konten</th>
                          <th>Sumber</th>
                          <th>Creator</th>
                        </tr>  
                      </thead>
                      <tbody>
                        <tr>
                          <td>Materi Konsep dan Perencanaan Website</td>
                          <td>Video</td>
                          <td>Youtube</td>
                          <td><a href="https://www.youtube.com/watch?v=Z_gjlIji8hU">
                            <button type="button" class="btn btn-primary btn-sm">James Q Quick</button></a></td>
                        </tr>
                        <tr>
                          <td>Materi Pengembangan Frontend Website</td>
                          <td>Video</td>
                          <td>Youtube</td>
                          <td><a href="https://www.youtube.com/watch?v=02G2xumxSLk">
                            <button type="button" class="btn btn-primary btn-sm">Jason K</button></a></td>
                        </tr>
                        <tr>
                          <td>Materi Pengembangan Backend Website</td>
                          <td>Video</td>
                          <td>Youtube</td>
                          <td><a href="https://www.youtube.com/watch?v=gOghS3BmaxI">
                            <button type="button" class="btn btn-primary btn-sm">Jason K</button></a></td>
                        </tr>
                        <tr>
                          <td>Materi Integrasi dan Penyelesaian</td>
                          <td>Video</td>
                          <td>Youtube</td>
                          <td><a href="https://www.youtube.com/watch?v=tHKsZdS8Oug">
                            <button type="button" class="btn btn-primary btn-sm">Dani Krossing</button></a></td>
                        </tr>
                      </tbody>
                    </table>
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

