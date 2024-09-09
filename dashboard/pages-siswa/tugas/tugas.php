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
                  <p>
                  <p>Klik Button Detail Proyek untuk melihat proyek</p>
                  <img src="../../images/panduan/button detail proyek.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Klik Button Detail Tugas untuk melihat tugas</p>
                  <img src="../../images/panduan/button detail tugas.png">
                  </p>
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
            <a class="nav-link" href="../materi/materi.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Materi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tugas.php">
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
          <h3 class="font-weight-bold">Tugas Proyek</h3><br>
          <div class="row">
          <?php
                  $getstatus="SELECT * FROM tb_proyek
                  JOIN tb_kelompok ON tb_kelompok.id_proyek=tb_proyek.id_proyek
                  JOIN tb_kelompoksiswa ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                  JOIN tb_siswa ON tb_siswa.id_siswa=tb_kelompoksiswa.id_siswa
                  WHERE tb_siswa.id_siswa='".$id_siswa."' ORDER BY tb_proyek.status DESC";
                  $statusnya = mysqli_query($conn, $getstatus);
                  $hasilnya = mysqli_num_rows($statusnya);
                  
                  ?>

            <div class="col-lg-9 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nama Tugas Proyek
                          </th>
                          <th>
                            Ketuntasan
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
                        if($hasilnya>0){
                          while($datanya = mysqli_fetch_array($statusnya)){
                            echo "<tr>";
                            echo "<td>".$datanya['nama_proyek']."</td>";
                            $idproyek=$datanya['id_proyek'];

                                    $getketuntasan = "SELECT COUNT(tb_proyekstep.id_proyekstep) as ketuntasan
                                    FROM tb_kelompok JOIN tb_ketuntasanproyek ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok 
                                    JOIN tb_nilaistep ON tb_ketuntasanproyek.id_ketuntasanproyek=tb_nilaistep.id_ketuntasanproyek
                                    JOIN tb_proyekstep ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep 
                                    JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek 
                                    WHERE tb_proyek.id_proyek='".$datanya['id_proyek']."' AND tb_kelompok.id_kelompok='".$datanya["id_kelompok"]."' AND tb_ketuntasanproyek.status='Selesai'
                                    ORDER BY tb_kelompok.id_kelompok";
                                    $ketuntasannya = mysqli_query($conn, $getketuntasan);
                                    $barisnya = mysqli_num_rows($ketuntasannya); 

                                    $getjumlahstep="SELECT jumlah_step FROM tb_proyek WHERE id_proyek='".$datanya["id_proyek"]."'";
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
                                      echo "<td><div class='progress'>";
                                          echo "<div class='progress-bar bg-success' role='progressbar' style='width: 0%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>"; 
                                          echo "</div></div></td>";

                                    } }} 

                                    $gettuntas = "SELECT * FROM tb_nilaistep
                                    JOIN tb_ketuntasanproyek ON tb_nilaistep.id_ketuntasanproyek=tb_ketuntasanproyek.id_ketuntasanproyek
                                    JOIN tb_proyekstep ON tb_proyekstep.id_proyekstep=tb_ketuntasanproyek.id_proyekstep
                                    JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                                    JOIN tb_kelompok ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                                    JOIN tb_kelompoksiswa ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                                    JOIN tb_siswa ON tb_siswa.id_siswa=tb_kelompoksiswa.id_siswa
                                    WHERE tb_siswa.id_siswa='".$datanya["id_siswa"]."' AND tb_proyek.id_proyek='".$datanya["id_proyek"]."' 
                                    AND tb_ketuntasanproyek.status='Selesai'";
                                    $tuntas = mysqli_query($conn, $gettuntas);
                                    $ketuntasan = mysqli_num_rows($tuntas);

                                    $getnilai = "SELECT * FROM tb_nilaistep
                                    JOIN tb_ketuntasanproyek ON tb_nilaistep.id_ketuntasanproyek=tb_ketuntasanproyek.id_ketuntasanproyek
                                    JOIN tb_proyekstep ON tb_proyekstep.id_proyekstep=tb_ketuntasanproyek.id_proyekstep
                                    JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                                    JOIN tb_kelompok ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                                    JOIN tb_kelompoksiswa ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                                    JOIN tb_siswa ON tb_siswa.id_siswa=tb_kelompoksiswa.id_siswa
                                    WHERE tb_siswa.id_siswa='".$datanya["id_siswa"]."' AND tb_proyek.id_proyek='".$datanya["id_proyek"]."'";
                                    $hasilnya = mysqli_query($conn, $getnilai);
                                    $barisnya = mysqli_num_rows($hasilnya);
                                    $nilai=0;
                                    if($barisnya>0){
                                      while($datanya = mysqli_fetch_array($hasilnya)){
                                        $nilai=$nilai+$datanya['nilai'];
                                        
                                      }
                                    }
                                    if($ketuntasan!=0){
                                      $nilaiakhir=number_format(($nilai/$ketuntasan),3);
                                      echo "<td>".$nilaiakhir."</td>";
                                    }else{
                                      echo "<td>0</td>";
                
                                    }
                               
                            echo "<td><a href ='detailproyek.php?id_proyek=".$idproyek."' name='detail'><button type='button' class='btn btn-primary btn-sm'>Detail Proyek</button></a>&nbsp;
                                    
                                    </td>"; 
                            echo "</tr>";
                          }
                        }else{
                          echo "<td colspan=4><p>Belum ada Proyek yang selesai</p><td>";
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                <div class="col-md-3 grid-margin">
                  <div class="card">
                      <div class="card-body">
                        <p class="card-title mb-0">Riwayat Proyek</p><br>
                        <ul class="list-ticked">
                        <?php
                          $getstatus="SELECT * FROM tb_proyek
                          JOIN tb_kelompok ON tb_kelompok.id_proyek=tb_proyek.id_proyek
                          JOIN tb_kelompoksiswa ON tb_kelompoksiswa.id_kelompok=tb_kelompok.id_kelompok
                          JOIN tb_siswa ON tb_siswa.id_siswa=tb_kelompoksiswa.id_siswa
                          WHERE tb_proyek.status='Selesai' AND tb_siswa.id_siswa='".$id_siswa."'";
                          $statusnya = mysqli_query($conn, $getstatus);
                          $hasilnya = mysqli_num_rows($statusnya);
                          if($hasilnya>0){
                            while($datanya = mysqli_fetch_array($statusnya)){
                              echo "<li><a href ='detailproyek.php?id_proyek=".$datanya['id_proyek']."' name='detail'>".$datanya['nama_proyek']."</a></li>";
                            }
                          }else{
                            echo "<p>Belum ada Proyek yang selesai</p>";
                          }
                          ?>
                        </ul>
                      </div>
                   </div>                  
                </div> 
              </div>


          <br>
          <h3 class="font-weight-bold">Tugas Mandiri</h3><br>
          <div class="row">
            <div class="col-lg-9 grid-margin stretch-card">
            <?php
                  $getstatus="SELECT * FROM tb_tugas
                  JOIN tb_ketuntasantugas ON tb_ketuntasantugas.id_tugas=tb_tugas.id_tugas
                  JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasantugas.id_siswa
                  JOIN tb_nilaitugas ON tb_nilaitugas.id_ketuntasantugas=tb_ketuntasantugas.id_ketuntasantugas
                  WHERE tb_siswa.id_siswa='".$id_siswa."'";
                  $statusnya = mysqli_query($conn, $getstatus);
                  $hasilnya = mysqli_num_rows($statusnya);
                  
                  ?>
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Nama Tugas
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
                        if($hasilnya>0){
                          while($datanya = mysqli_fetch_array($statusnya)){
                            echo "<tr>";
                            echo "<td>".$datanya['nama_tugas']."</td>";
                            if($datanya['status']=='Selesai'){
                              echo "<td class='font-weight-medium'><div class='badge badge-success'>Selesai</div>";
                            }else{
                              echo "<td class='font-weight-medium'><div class='badge badge-danger'>Belum Selesai</div>";
                            }
                            echo "<td>".$datanya['nilai']."</td>";
                            echo "<td><a href ='detailtugas.php?id_tugas=".$datanya['id_tugas']."' name='detail'><button type='button' class='btn btn-primary btn-sm'>Detail Tugas</button></a>&nbsp;</td>";
                            echo "</tr>";
                          }
                        }else{
                          echo "<td colspan=4><p>Belum ada Proyek yang selesai</p><td>";
                        }
                        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin">
            <div class="card">
                    <div class="card-body">
                      <p class="card-title mb-0">Riwayat Tugas</p><br>
                      <ul class="list-ticked">
                <?php
                  $getstatus="SELECT * FROM tb_tugas JOIN tb_ketuntasantugas
                  ON tb_tugas.id_tugas=tb_ketuntasantugas.id_tugas
                  JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasantugas.id_siswa
                  WHERE tb_ketuntasantugas.status='Selesai' AND tb_siswa.id_siswa='".$id_siswa."'";
                  $statusnya = mysqli_query($conn, $getstatus);
                  $hasilnya = mysqli_num_rows($statusnya);
                  if($hasilnya>0){
                    while($datanya = mysqli_fetch_array($statusnya)){
                      echo "<li><a href ='detailtugas.php?id_tugas=".$datanya['id_tugas']."' name='detail'>".$datanya['nama_tugas']."</a></li>";
                    }
                  }else{
                    echo "<p>Belum ada Tugas yang selesai</p>";
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
</body>

</html>

