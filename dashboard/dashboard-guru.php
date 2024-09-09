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
                  <p>Halaman ini menampilkan keseluruhan <br>data yang ada di web SCOPE untuk Guru</p>
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
                  <h3 class="font-weight-bold">Selamat Datang, <?php echo $nama_guru ?>!</h3>
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-body">
                  <p class="card-title">Detail Proyek</p>
                  <p class="font-weight-500">Berikut ini merupakan informasi seputar proyek siswa</p>
                  <br>  
                  <div class="d-flex flex-wrap mb-2">
                    <div class="mr-5 mt-3">
                      <?php
                      
                      include "../koneksi.php";
                      $getproyektuntas = mysqli_query($conn,"SELECT * FROM tb_proyek WHERE status='Selesai'");
                      $hasilproyektuntas = mysqli_num_rows($getproyektuntas);   
                      $getsemua = mysqli_query($conn,"SELECT * FROM tb_proyek");
                      $hasilsemua = mysqli_num_rows($getsemua);                
                      ?>
                      <p class="mb-4" style="font-weight: bold;">Total Proyek Tuntas</p>
                      <p class="fs-30 mb-2"><?php echo $hasilproyektuntas ?></p>
                      <p>dari <?php echo $hasilsemua ?> proyek</p>
                    </div>
                    <div class="mr-5 mt-3">
                      <?php
                      
                      include "../koneksi.php";
                      $getproyek = mysqli_query($conn,"SELECT * FROM tb_komentarproyek LEFT JOIN tb_balasanproyek
                                                  ON tb_komentarproyek.id_komentarproyek=tb_balasanproyek.id_komentarproyek
                                                  WHERE tb_balasanproyek.id_balasanproyek IS NULL");
                      $hasilproyek = mysqli_num_rows($getproyek); 
                      $getsemuaproyek = mysqli_query($conn,"SELECT * FROM tb_komentarproyek");
                      $hasilsemuaproyek = mysqli_num_rows($getsemuaproyek);                    
                      ?>

                      <p class="mb-4" style="font-weight: bold;">Komentar Proyek Baru</p>
                      <p class="fs-30 mb-2"><?php echo $hasilproyek ?></p>
                      <p>dari <?php echo $hasilsemuaproyek ?> komentar</p>
                    </div>
                    <div class="mr-5 mt-3">
                      <?php
                      
                      include "../koneksi.php";
                      $getperiksaproyek = mysqli_query($conn,"SELECT * FROM tb_ketuntasanproyek JOIN tb_nilaistep
                      ON tb_ketuntasanproyek.id_ketuntasanproyek=tb_nilaistep.id_ketuntasanproyek
                      WHERE tb_ketuntasanproyek.status='Selesai' AND tb_nilaistep.nilai='0'");
                      $hasiperiksaproyek = mysqli_num_rows($getperiksaproyek); 
                      $getsemua = mysqli_query($conn,"SELECT * FROM tb_ketuntasanproyek JOIN tb_nilaistep
                      ON tb_ketuntasanproyek.id_ketuntasanproyek=tb_nilaistep.id_ketuntasanproyek
                      WHERE tb_ketuntasanproyek.status='Selesai'");
                      $hasilsemua = mysqli_num_rows($getsemua); 

                      ?>
                      <p class="mb-4" style="font-weight: bold;">Perlu Dinilai</p>
                      <p class="fs-30 mb-2"><?php echo $hasiperiksaproyek ?></p>
                      <p>dari <?php echo $hasilsemua ?></p>
                    </div>
                    
                  </div>
                    <div style="text-align: right;">
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-outline-primary btn-icon-text">
                          <i class="ti-file btn-icon-prepend"></i>
                          Lihat Semua Proyek
                        </button>
                      </a>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <?php
                      include "../koneksi.php";
                      $get = mysqli_query($conn,"SELECT * FROM tb_tugas");
                      $hasil = mysqli_num_rows($get);
                      
                      ?>
                      <p class="mb-4">Total Tugas Mandiri</p>
                      <p class="fs-30 mb-2"><?php echo $hasil ?></p>
                      <br>
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-light">Detail</button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <?php
                      
                      include "../koneksi.php";
                      $getkomen = mysqli_query($conn,"SELECT * FROM tb_komentartugas JOIN tb_balasantugas
                      ON tb_komentartugas.id_komentartugas=tb_balasantugas.id_komentartugas");
                      $hasilkomen = mysqli_num_rows($getkomen); 
                      $getsemuakomen = mysqli_query($conn,"SELECT * FROM tb_komentartugas");
                      $hasilsemuakomen = mysqli_num_rows($getsemuakomen);   
                      $hasilnya=$hasilsemuakomen-$hasilkomen;           
                      ?>
                      <p class="mb-4">Komentar Tugas Mandiri</p>
                      <p class="fs-30 mb-2"><?php echo $hasilnya ?></p>
                      <br>
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-light">Detail</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <?php
                      
                      include "../koneksi.php";
                      $getkuis = mysqli_query($conn,"SELECT SUM(tb_jawaban.poin) as nilai FROM tb_materi 
                      JOIN tb_kuis ON tb_materi.id_materi=tb_kuis.id_materi
                      JOIN tb_soal ON tb_soal.id_kuis=tb_kuis.id_kuis
                      JOIN tb_jawaban ON tb_jawaban.id_soal=tb_soal.id_soal
                      JOIN tb_siswa ON tb_siswa.id_siswa=tb_jawaban.id_siswa");
                      $hasilkuis = mysqli_fetch_array($getkuis);
                      $hasill=$hasilkuis['nilai'];

                      $getsiswa = "SELECT COUNT(id_ketuntasanmateri) as jml_siswa FROM tb_ketuntasanmateri WHERE status='Selesai'";
                          $ekssiswa = mysqli_query($conn, $getsiswa);
                          $siswa = mysqli_fetch_array($ekssiswa);
                          $jumlahsiswa=$siswa['jml_siswa'];
                      
                      $rata2=$hasill/$jumlahsiswa;
                      
                      ?>
                      <p class="mb-4">Rata-rata nilai kuis</p>
                      <p class="fs-30 mb-2"><?php 
                      if($jumlahsiswa="NAN"){
                        echo "0";
                      }else{
                      echo $rata2;} ?></p>
                      <br>
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-light">Detail</button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <?php
                      
                      include "../koneksi.php";
                      $gettugas = mysqli_query($conn,"SELECT * FROM tb_ketuntasantugas JOIN tb_nilaitugas
                      ON tb_ketuntasantugas.id_ketuntasantugas=tb_nilaitugas.id_ketuntasantugas
                      WHERE tb_ketuntasantugas.status='Selesai' AND tb_nilaitugas.nilai='0'");
                      $hasiltugas = mysqli_num_rows($gettugas);
                      
                      ?>
                      <p class="mb-4">Tugas Mandiri yang Perlu Dinilai</p>
                      <p class="fs-30 mb-2"><?php echo $hasiltugas ?></p>
                      <br>
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-light">Detail</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
            <?php
          
            include "../koneksi.php";
            $getstatus="SELECT COUNT(id_siswa) as jumlah_siswa FROM tb_siswa";
            $statusnya = mysqli_query($conn, $getstatus);
            $hasilnya = mysqli_num_rows($statusnya);
            if($hasilnya>0){
              while($datanya = mysqli_fetch_array($statusnya)){
            $get = "SELECT * 
                    FROM tb_tugas JOIN tb_topik
                    ON tb_topik.id_topik=tb_tugas.id_topik 
                    ORDER BY tb_tugas.deadline DESC LIMIT 4";
            $eks = mysqli_query($conn, $get);
            $hasil = mysqli_num_rows($eks);
            
            ?>
              <div class="card">
                <div class="card-body">
                  <table style="width: 100%;">
                    <tr>
                      <td>
                        <p class="card-title mb-0">Tugas Siswa</p>
                      </td>
                      <td style="text-align: right;">
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-outline-primary btn-icon-text">
                          <i class="ti-file btn-icon-prepend"></i>
                          Lihat Semua Tugas
                        </button>
                      </a>
                      </td>
                    </tr>
                  </table><br>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Topik Materi</th>
                          <th>Nama Tugas</th>
                          <th>Ketuntasan</th>
                          <th>Deadline</th>
                        </tr>  
                      </thead>
                      <tbody>

                      <?php
                            if($hasil>0){
                                while($data = mysqli_fetch_array($eks)){
                                    echo "<tr>";
                                    echo "<td>".$data['nama_topik']."</td>";
                                    echo "<td class='font-weight-bold'>".$data['nama_tugas']."</td>";
                                    $getketuntasan = "SELECT COUNT(tb_siswa.id_siswa) as ketuntasan
                                    FROM tb_tugas JOIN tb_ketuntasantugas ON tb_tugas.id_tugas=tb_ketuntasantugas.id_tugas
                                    JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasantugas.id_siswa
                                    WHERE tb_ketuntasantugas.status='Selesai' AND tb_tugas.id_tugas='".$data['id_tugas']."'";
                                    $ketuntasannya = mysqli_query($conn, $getketuntasan);
                                    $barisnya = mysqli_num_rows($ketuntasannya); 
                                    if($barisnya>0){
                                      while($tuntas = mysqli_fetch_array($ketuntasannya)){ 
                                        $persen= ($tuntas['ketuntasan']/$datanya['jumlah_siswa'])*100;
                                        if($persen!=100){
                                          echo "<td><div class='progress'>";
                                          echo "<div class='progress-bar bg-success' role='progressbar' style='width: ".$persen."%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>"; 
                                          echo "</div></div></td>";
                                          }
                                          else{
                                            echo "<td class='font-weight-medium'><div class='badge badge-success'>Selesai</div>";
                                          } 
                                    }}    
                                     
                                    echo "<td>".date('d M Y',(strtotime($data["deadline"])))."</td>"; 
                                }
                            }else{
                                echo "<tr><td colspan='5'>Data yang Anda cari tidak tersedia</td></tr>";
                            } }}                          
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="row">
            
            
            <div class="col-md-5 stretch-card grid-margin">
              <?php
            
                include "../koneksi.php";
                $get = "SELECT tb_akun.foto, tb_siswa.nama_siswa, TRUNCATE(((((COALESCE(tb_nilaitugas.nilai, 0) + 
                        COALESCE(tb_nilaimateri.nilai, 0))/2)+(SUM(tb_nilaistep.nilai)/ 
                        COUNT(tb_proyek.jumlah_step)))/3), 3) as nilai_keseluruhan 
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
                        GROUP BY tb_siswa.id_siswa
                        ORDER BY nilai_keseluruhan DESC";
                $eks = mysqli_query($conn, $get);
                $hasil = mysqli_num_rows($eks);
                
              ?>
              <div class="card">
                <div class="card-body">
                  <table style="width: 100%;">
                    <tr>
                      <td>
                        <p class="card-title mb-0">Leaderboard</p>
                      </td>
                      <td style="text-align: right;">
                      <a href="pages-guru/siswa/siswa.php">
                        <button type="button" class="btn btn-outline-primary btn-icon-text">
                          <i class="ti-file btn-icon-prepend"></i>
                          Lihat Semua Siswa
                        </button>
                      </a>
                      </td>
                    </tr>
                  </table><br>
                  <ul class="icon-data-list">
                    <?php
                      if($hasil>0){
                        while($data = mysqli_fetch_array($eks)){
                          echo "<li>";
                          echo "<div class='d-flex'>";
                          echo "<img src='images/pengguna/".$data['foto']."' alt='user'>";
                          echo "<div>";
                          echo "<p class='text-info mb-1'>".$data['nama_siswa']."</p>";
                          echo "<small>".$data['nilai_keseluruhan']."</small>";
                          echo "</div>";
                          echo "</div>";
                          echo "</li>";
                           
                        }
                      }else{
                          echo "<tr><td colspan='5'>Belum Ada Siswa yang Terdaftar</td></tr>";
                      }                           
                    ?>                        
                  </ul>
                  
                </div>
              </div>
            </div>
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table style="width: 100%;">
                    <tr>
                      <td>
                        <p class="card-title mb-0">Proyek Siswa</p>
                      </td>
                      <td style="text-align: right;">
                      <a href="pages-guru/tugas/tugas.php">
                        <button type="button" class="btn btn-outline-primary btn-icon-text">
                          <i class="ti-file btn-icon-prepend"></i>
                          Lihat Semua Proyek
                        </button>
                      </a>
                      </td>
                    </tr>
                  </table><br>
                  <?php
                  $getstatus="SELECT COUNT(id_kelompok) as jumlah_kelompok FROM tb_kelompok";
                  $statusnya = mysqli_query($conn, $getstatus);
                  $hasilnya = mysqli_num_rows($statusnya);
                  if($hasilnya>0){
                    while($datanya = mysqli_fetch_array($statusnya)){
                  
                  include "../koneksi.php";
                  $get = "SELECT * FROM tb_proyek";
                  $eks = mysqli_query($conn, $get);
                  $hasil = mysqli_num_rows($eks);
                  
                  ?>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Nama Proyek</th>
                          <th>Ketuntasan</th>
                        </tr>  
                      </thead>
                          <?php
                            if($hasil>0){
                                while($data = mysqli_fetch_array($eks)){
                                    echo "<tr>";
                                    echo "<td>".$data['nama_proyek']."</td>"; 
                                    $getketuntasan = "SELECT tb_proyek.jumlah_step, COUNT(tb_kelompok.id_kelompok) as ketuntasan
                                    FROM tb_kelompok
                                    JOIN tb_ketuntasanproyek ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                                    JOIN tb_proyekstep ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                                    JOIN tb_proyek ON tb_proyek.id_proyek=tb_proyekstep.id_proyek
                                    WHERE tb_ketuntasanproyek.status='Selesai' AND tb_proyek.id_proyek='".$data["id_proyek"]."'
                                    GROUP BY tb_kelompok.id_kelompok
                                    HAVING tb_proyek.jumlah_step = COUNT(tb_kelompok.id_kelompok)";
                                    $ketuntasannya = mysqli_query($conn, $getketuntasan);
                                    $barisnya = mysqli_num_rows($ketuntasannya); 
                                    if($barisnya>0){
                                      while($tuntas = mysqli_fetch_array($ketuntasannya)){ 
                                        $persen=($barisnya/$datanya['jumlah_kelompok']) * 100;
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

                                    }   
                                }
                            }else{
                                echo "<tr><td colspan='5'>Data yang Anda cari tidak tersedia</td></tr>";
                            }}}                           
                          ?>
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

