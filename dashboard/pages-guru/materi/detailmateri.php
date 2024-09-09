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
    $query = mysqli_query($conn, "SELECT * FROM tb_materi WHERE tb_materi.id_materi='".$_GET["id_materi"]."'");
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
        <a class="navbar-brand brand-logo mr-5" href="../../dashboard-guru.php"><img src="../../images/logo_scope.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../dashboard-guru.php"><img src="../../images/logo_scope_mini.png" alt="logo"/></a>
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
                  <p>Lihat ketuntasan materi <br>siswa</p>
                  <img style="width:70%;" src="../../images/panduan/ketuntasan materi.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Klik button Buat Kuis untuk membuat kuis</p>
                  <img style="width:40%;" src="../../images/panduan/button buat kuis.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Klik button Detail Kuis untuk melihat soal</p>
                  <img style="width:50%;" src="../../images/panduan/button detail kuis.png">
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <p>
                  <p>Klik button Edit jika ingin mengedit materi</p>
                  <img style="width:30%;" src="../../images/panduan/button edit materi.png">
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
                    echo "<a href='../tugas/detailtugas.php?id_tugas=".$notifkomentugas['id_tugas']."' class='dropdown-item preview-item'>";
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
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
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
                <h3 class="font-weight-bold"><?php echo $data['nama_materi']; ?></h3>
              </td>
              <td style="width:140px;" align="right">
                <?php 
                echo "<a href ='hapusmateri.php?id_materi=".$data['id_materi']."' name='hapus'>
                        <button type='button' class='btn btn-danger'>Hapus Materi</button>
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
            <div class="col-md-8 grid-margin stretch-card">
            <?php
                          
                          include "../../../koneksi.php";
                          
                          $getstatus="SELECT COUNT(id_siswa) as jumlah_siswa FROM tb_siswa";
                          $statusnya = mysqli_query($conn, $getstatus);
                          $hasilnya = mysqli_num_rows($statusnya);
                          if($hasilnya>0){
                            while($datanya = mysqli_fetch_array($statusnya)){

                          $getsiswa = "SELECT tb_akun.foto, tb_siswa.nama_siswa, tb_ketuntasanmateri.status, COUNT(tb_ketuntasanmateri.status) as siswa_tuntas FROM tb_materi 
                          JOIN tb_topik ON tb_materi.id_topik=tb_topik.id_topik 
                          JOIN tb_ketuntasanmateri ON tb_ketuntasanmateri.id_materi=tb_materi.id_materi 
                          JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasanmateri.id_siswa
                          JOIN tb_akun ON tb_akun.id_akun=tb_siswa.id_akun
                          WHERE tb_materi.id_materi='".$_GET["id_materi"]."' AND tb_ketuntasanmateri.status='Selesai'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                            
                          
                          ?>
              <div class="card">
                  <?php
                  if($datanya['jumlah_siswa']!=0){
                  $persen=($data['siswa_tuntas']/$datanya['jumlah_siswa']) * 100;
                  }else{
                    $persen=0;
                  }
                  ?>
                <div class="card-body">
                  <p class="card-title mb-0">Ketuntasan</p><br><br>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $persen; ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><br>
                  <p class="card-description"><?php echo $data['siswa_tuntas']; ?> dari <?php echo $datanya['jumlah_siswa']; ?> siswa telah menuntaskan materi</p>
                  <br>
                      
                      <?php } } } }?>
                      
                  
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>
                              Foto
                            </th>
                            <th>
                              Nama Lengkap
                            </th>
                            <th>
                              Nilai Kuis
                            </th>
                            <th>
                              Status
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          
                          include "../../../koneksi.php";

                          $getsiswa = "SELECT tb_akun.foto, tb_siswa.id_siswa, tb_siswa.nama_siswa, tb_ketuntasanmateri.status FROM tb_materi 
                          JOIN tb_topik ON tb_materi.id_topik=tb_topik.id_topik 
                          JOIN tb_ketuntasanmateri ON tb_ketuntasanmateri.id_materi=tb_materi.id_materi 
                          JOIN tb_siswa ON tb_siswa.id_siswa=tb_ketuntasanmateri.id_siswa
                          JOIN tb_akun ON tb_akun.id_akun=tb_siswa.id_akun
                          WHERE tb_materi.id_materi='".$_GET["id_materi"]."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);
                            
                          
                          
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                                echo "<tr>";
                                echo "<td width='20%'><img src='../../images/pengguna/".$data['foto']."' width='100px' height='100px'></td>";
                                echo "<td>".$data['nama_siswa']."</td>";

                                $getkuis = "SELECT SUM(tb_jawaban.poin) as nilai FROM tb_materi 
                                JOIN tb_kuis ON tb_materi.id_materi=tb_kuis.id_materi
                                JOIN tb_soal ON tb_soal.id_kuis=tb_kuis.id_kuis
                                JOIN tb_jawaban ON tb_jawaban.id_soal=tb_soal.id_soal
                                JOIN tb_siswa ON tb_siswa.id_siswa=tb_jawaban.id_siswa
                                WHERE tb_materi.id_materi='".$_GET["id_materi"]."' AND tb_siswa.id_siswa='".$data["id_siswa"]."'";
                                $ekskuis = mysqli_query($conn, $getkuis);
                                $hasilkuis = mysqli_num_rows($ekskuis);                                
                                
                                
                                if($hasilkuis>0){
                                  while($kuis = mysqli_fetch_array($ekskuis)){
                                    if($kuis['nilai']!=NULL){
                                      echo "<td>".$kuis['nilai']."</td>";
                                    }else{
                                      echo "<td>0</td>";
                                    }
                                  }
                                }


                                if($data['status']=='Selesai') {
                                  echo "<td><div class='badge badge-success'>Selesai</div></td>";
                                }
                                else{
                                  echo "<td><div class='badge badge-danger'>Belum Selesai</div></td>";
                                }   
                            }
                        }else{
                            echo "<tr><td colspan='5'>Belum ada siswa yang menuntaskan materi</td></tr>";
                        }  
                              
                            
                          ?>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin">
              
              <div class="card">
                  
                <div class="card-body">
                  <p class="card-title mb-0">Kuis</p><br><br>
                  <?php
                          
                          include "../../../koneksi.php";

                          $getsiswa = "SELECT * FROM tb_kuis JOIN tb_materi
                          ON tb_kuis.id_materi=tb_materi.id_materi
                          JOIN tb_soal ON tb_soal.id_kuis=tb_kuis.id_kuis
                          JOIN tb_opsi ON tb_opsi.id_soal=tb_soal.id_soal
                          JOIN tb_jawaban ON tb_jawaban.id_opsi=tb_opsi.id_opsi
                          WHERE tb_kuis.id_materi='".$_GET["id_materi"]."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);                       
                          
                          
                          if($hasil>0){
                  echo "<p class='font-weight-500'>Tingkat keberhasilan menjawab soal</p><br>
                  <table class='table table-striped'>
                        <thead>
                          <tr>
                            <th>
                              Soal
                            </th>
                            <th>
                              Keberhasilan
                            </th>
                            <th>
                              Jumlah
                            </th>
                          </tr>
                        </thead>
                        <tbody>";
                    include "../../../koneksi.php";
                  $i=1;
                  while($i<6){
                    $getsiswa = "SELECT COUNT(tb_ketuntasanmateri.id_ketuntasanmateri) as jml_siswa 
                          FROM tb_ketuntasanmateri JOIN tb_materi
                          ON tb_ketuntasanmateri.id_materi=tb_materi.id_materi
                          WHERE tb_ketuntasanmateri.status='Selesai' AND tb_materi.id_materi='".$_GET["id_materi"]."'";
                          $ekssiswa = mysqli_query($conn, $getsiswa);
                          $siswa = mysqli_fetch_array($ekssiswa);
                          $jumlahsiswa=$siswa['jml_siswa'];

                          $getbenar = "SELECT COUNT(tb_opsi.status) as jml_benar
                          FROM tb_opsi JOIN tb_soal ON tb_soal.id_soal=tb_opsi.id_soal
                          JOIN tb_kuis ON tb_kuis.id_kuis=tb_soal.id_kuis
                          JOIN tb_materi ON tb_materi.id_materi=tb_kuis.id_materi
                          JOIN tb_jawaban ON tb_jawaban.id_opsi=tb_opsi.id_opsi
                          WHERE tb_soal.nomor='".$i."' AND tb_opsi.status='Benar' AND tb_materi.id_materi='".$_GET["id_materi"]."'";
                          $eksbenar = mysqli_query($conn, $getbenar);
                          $hasilbenar = mysqli_num_rows($eksbenar);  
                          
                          
                          if($hasilbenar>0){
                            while($benar = mysqli_fetch_array($eksbenar)){
                          
                              $persen=($benar['jml_benar']/$jumlahsiswa)*100;
                              echo "<tr>
                              <td class='text-muted'>".$i."</td>";
                              if($persen>69){
                              echo "<td>
                              <div class='progress'>
                                <div class='progress-bar bg-success' role='progressbar' style='width: ".$persen."%' aria-valuemin='0' aria-valuemax='100'></div>
                              </div>
                              </td>";
                              }else if($persen>49 && $persen<70){
                                echo "<td>
                                <div class='progress'>
                                  <div class='progress-bar bg-warning' role='progressbar' style='width: ".$persen."%' aria-valuemin='0' aria-valuemax='100'></div>
                                </div>
                                </td>";
                              }else if($persen>=0 && $persen<50){
                                echo "<td>
                                <div class='progress'>
                                  <div class='progress-bar bg-danger' role='progressbar' style='width: ".$persen."%' aria-valuemin='0' aria-valuemax='100'></div>
                                </div>
                                </td>";

                              }
                              echo "<td><h5 class='font-weight-bold mb-0'>".$benar['jml_benar']."</h5></td>
                            </tr>"; 
                            }
                          }else{
                            
                          }
                          $i=$i+1;
                  }}else{
                    echo "<p>Belum ada siswa yang mengerjakan kuis</p>";
                  }
                          
                           
                              
                            
                          ?>
                          </tbody>
                        </table>
                        <?php
                          
                          include "../../../koneksi.php";

                          $getsiswa = "SELECT * FROM tb_kuis JOIN tb_materi
                          ON tb_kuis.id_materi=tb_materi.id_materi
                          WHERE tb_kuis.id_materi='".$_GET["id_materi"]."'";
                          $eks = mysqli_query($conn, $getsiswa);
                          $hasil = mysqli_num_rows($eks);                       
                          
                          
                          if($hasil>0){
                            while($data = mysqli_fetch_array($eks)){
                              echo "<br><br>";
                              echo "<a href='kuis/detailkuis.php?id_materi=".$_GET["id_materi"]."'>
                                <button type='button' class='btn btn-outline-primary btn-icon-text'>
                                  <i class='ti-file btn-icon-prepend'></i>
                                  Lihat Detail Kuis
                                </button>
                              </a>"; 
                            }
                          }else{
                            echo "<p class='font-weight-500'>Belum ada kuis</p>";
                            echo "<a href='kuis/buatkuis.php?id_materi=".$_GET["id_materi"]."'>
                            <button type='button' class='btn btn-outline-primary btn-icon-text'>
                              <i class='ti-file btn-icon-prepend'></i>
                              Buat Kuis
                            </button>
                          </a>";  
                            
                          }  
                              
                            
                          ?>
                          
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
           
          <?php
                        
                        include "../../../koneksi.php";
                        $getsiswa = "SELECT * FROM tb_materi JOIN tb_topik
                        ON tb_materi.id_topik=tb_topik.id_topik
                        WHERE tb_materi.id_materi='".$_GET["id_materi"]."'";
                        $eks = mysqli_query($conn, $getsiswa);
                        $hasil = mysqli_num_rows($eks);
                        if($hasil>0){
                          while($data = mysqli_fetch_array($eks)){
                          
                        
                        ?>
            <div class="card">
              <div class="card-body">
              <form class="forms-sample" class="pt-3" method="POST" action="cekeditmateri.php?id_materi=<?php echo $data['id_materi']; ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Nama Materi</label>
                    <input type="text" class="form-control" name="namamateri" value="<?php echo $data['nama_materi']; ?>" placeholder="Masukkan Nama Materi">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">Topik Materi</label>
                      <select class="form-control" name="topikmateri">
                      <?php
                            if ($data['nama_topik'] == "Konsep Website") {
                            echo "<option value='TPK0001 - Konsep Website' selected>TPK0001 - Konsep Website</option>";
                            echo "<option value='TPK0002 - Pengembangan Frontend'>TPK0002 - Pengembangan Frontend</option>";
                            echo "<option value='TPK0003 - Pengembangan Backend'>TPK0003 - Pengembangan Backend</option>";
                            echo "<option value='TPK0004 - Integrasi Website'>TPK0004 - Integrasi Website</option>";
                            }
                            else if($data['nama_topik'] == "Pengembangan Frontend") {
                              echo "<option value='TPK0001 - Konsep Website'>TPK0001 - Konsep Website</option>";
                              echo "<option value='TPK0002 - Pengembangan Frontend' selected>TPK0002 - Pengembangan Frontend</option>";
                              echo "<option value='TPK0003 - Pengembangan Backend'>TPK0003 - Pengembangan Backend</option>";
                              echo "<option value='TPK0004 - Integrasi Website'>TPK0004 - Integrasi Website</option>";
                            }
                            else if($data['nama_topik'] == "Pengembangan Backend") {
                              echo "<option value='TPK0001 - Konsep Website'>TPK0001 - Konsep Website</option>";
                              echo "<option value='TPK0002 - Pengembangan Frontend'>TPK0002 - Pengembangan Frontend</option>";
                              echo "<option value='TPK0003 - Pengembangan Backend' selected>TPK0003 - Pengembangan Backend</option>";
                              echo "<option value='TPK0004 - Integrasi Website'>TPK0004 - Integrasi Website</option>";
                            }
                            else if($data['nama_topik'] == "Integrasi Website") {
                              echo "<option value='TPK0001 - Konsep Website'>TPK0001 - Konsep Website</option>";
                              echo "<option value='TPK0002 - Pengembangan Frontend'>TPK0002 - Pengembangan Frontend</option>";
                              echo "<option value='TPK0003 - Pengembangan Backend'>TPK0003 - Pengembangan Backend</option>";
                              echo "<option value='TPK0004 - Integrasi Website' selected>TPK0004 - Integrasi Website</option>";
                            }
                       ?>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link Video Materi</label>
                    <input type="text" class="form-control" name="linkvideo" value="<?php echo $data['link_video']; ?>" placeholder="Masukkan Link Video Materi">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Isi Materi</label>
                    <textarea class="form-control" name="isimateri" rows="6" placeholder="Masukkan Isi Materi"><?php echo $data['isi']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Dokumen Pendukung</label>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="../../dokumen/panduan_materi/<?php echo $data['file']; ?>" allowfullscreen></iframe>
                    </div> 
                    <label class="col-form-label">Unggah Dokumen Baru</label>
                            <div class="col-sm-12">
                            <input type="file" name="panduan" required="" value="../../dokumen/panduan_materi/<?php echo $data['file']; ?>"/><br><br>
                            </div> 
                  </div>
                  <button type="submit" name="edit" class="btn btn-primary mr-2">Edit</button>
                </form>
              </div>
            </div>
          </div><?php }}?>
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

