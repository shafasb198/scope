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
    $query = mysqli_query($conn, "SELECT * FROM tb_proyekstep WHERE id_proyekstep='".$_GET["id_proyekstep"]."'");
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
                      <p>Baca panduan tahapan proyek <br>pada file yang tersedia</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/pdf tahapan.png"></td>
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
                      <p>Unggah hasil pengerjaan proyek <br>dalam format .pdf</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/unggah proyek.png"></td>
                    </tr>
                  </table>  
                </div>
              </a>      
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <table style="width:100%;">
                    <tr>
                      <td>
                      <p>Kirim komentar atau pertanyaan</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/kirim komentar.png"></td>
                    </tr>
                  </table>   
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <table style="width:100%;">
                    <tr>
                      <td>
                      <p>Lihat riwayat komentar yang <br>terkirim atau sudah dibalas</p>
                      </td>
                      <td style="text-align:right;"><img style="width:70%;" src="../../images/panduan/riwayat komentar siswa.png"></td>
                    </tr>
                  </table>   
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-item-content">
                  <br>
                  <p>Lihat nilai dari guru terhadao hasil pengerjaan proyek</p>
                  <img style="width:20%;" src="../../images/panduan/nilai anda.png">
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
          <h3 class="font-weight-bold"><?php echo $data['nama_step'];?></h3><br>
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
                        <div class="col-md-8 grid-margin stretch-card">
                          <div class="card position-relative">
                            <div class="card-body">
                              <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="../../dokumen/panduan_proyek/<?php echo $data['file']; ?>" allowfullscreen></iframe>
                              </div> 
                            </div>
                          </div>
                        </div>
            
                        <div class="col-md-4 grid-margin">
                          <div class="card">
                            <div class="card-body">
                              <p class="card-title mb-0">Detail Tahapan</p><br>
                                <p><?php echo $data['deskripsi']; ?></p><br>
                                  <p class="font-weight-bold">Tanggal Mulai</p>
                                  <mark class="bg-primary text-white"><?php echo $data['tgl_mulai']; ?></mark><br><br>
                                  <p class="font-weight-bold">Tanggal Akhir</p>
                                  <mark class="bg-primary text-white"><?php echo $data['tgl_akhir']; ?></mark><br><br>


                                  
                            </div>
                          </div>
                        </div>
          </div>
          <div class="row" id="html">

                <div class="col-md-8 grid-margin stretch-card">
                  <?php
                  $gettuntas = mysqli_query($conn, 
                  "SELECT tb_ketuntasanproyek.status as tuntas, tb_ketuntasanproyek.file, tb_ketuntasanproyek.id_ketuntasanproyek FROM tb_proyekstep
                  JOIN tb_ketuntasanproyek ON tb_ketuntasanproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                  JOIN tb_kelompok ON tb_kelompok.id_kelompok=tb_ketuntasanproyek.id_kelompok
                  JOIN tb_proyek ON tb_kelompok.id_proyek=tb_proyek.id_proyek
                  WHERE tb_kelompok.id_kelompok='".$_GET['id_kelompok']."' AND tb_proyekstep.id_proyekstep='".$_GET['id_proyekstep']."'");
                  if ($data = mysqli_fetch_array($gettuntas)){
                  ?>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-title mb-0">Unggah Hasil Pengerjaan</p><br>
                        <form class="forms-sample" class="pt-3" method="POST" action="cekupproyek.php?id_ketuntasanproyek=<?php echo $data['id_ketuntasanproyek']; ?> & id_kelompok=<?php echo $_GET['id_kelompok']; ?>" enctype="multipart/form-data">
                          <?php
                          
                          
                            if($data['tuntas']=='Selesai'){
                              if(substr($data['file'],-3)=='pdf'){
                                echo "<iframe style='height:350px; width: 100%;' class='embed-responsive-item' src='../../dokumen/hasil_proyek/".$data['file']."' allowfullscreen></iframe>";
                              }
                              else if(substr($data['file'],-3)=='zip' || substr($data['file'],-3)=='rar'){
                                echo "<a href='../../dokumen/hasil_proyek/".$data["file"]."' download ><button type='button' class='btn btn-outline-success btn-icon-text'>
                              <i class='ti-download btn-icon-prepend'></i>                                                    
                              ".$data['file']."</button></a>";
                              }
                              

                              $getnilai = mysqli_query($conn, 
                              "SELECT tb_nilaistep.nilai FROM tb_nilaistep
                              JOIN tb_ketuntasanproyek ON tb_ketuntasanproyek.id_ketuntasanproyek=tb_nilaistep.id_ketuntasanproyek
                              JOIN tb_proyekstep ON tb_proyekstep.id_proyekstep=tb_ketuntasanproyek.id_proyekstep
                              JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                              JOIN tb_kelompok ON tb_kelompok.id_proyek=tb_proyek.id_proyek
                              WHERE tb_proyekstep.id_proyekstep='PST0001' AND tb_ketuntasanproyek.id_kelompok='".$_GET['id_kelompok']."' AND tb_kelompok.id_kelompok='".$_GET['id_kelompok']."'");
                              $nilainya = mysqli_fetch_array($getnilai);
                              if($nilainya['nilai']!=0){
                                echo "<br><br><p class='font-weight-bold'>Nilai Anda</p>
                                <mark class='bg-primary text-white'>".$nilainya['nilai']."</mark>";
    
                              }else{
                                $getstatus = mysqli_query($conn, 
                                "SELECT id_siswa FROM tb_ketua WHERE id_kelompok='".$_GET['id_kelompok']."'");
                                $statusnya = mysqli_fetch_array($getstatus);
                                if($statusnya['id_siswa']==$id_siswa){
                                  echo "<div class='form-group'>
                                  <label class='col-form-label'>Edit Dokumen/File</label><div class='col-sm-12'>
                                  <input type='file' name='panduan' required='' /><br><br>
                                  </div>
                                  </div>";
                                  echo "<button type='submit' name='btn_upload' class='btn btn-primary mr-2'>Unggah Hasil</button>";
                                }  
                              }

                                                       

                            
                              
                            }
                            else{
                              $getstatus = mysqli_query($conn, 
                              "SELECT id_siswa FROM tb_ketua WHERE id_kelompok='".$_GET['id_kelompok']."'");
                              $statusnya = mysqli_fetch_array($getstatus);
                              if($statusnya['id_siswa']==$id_siswa){
                                echo "<div class='form-group'>
                            <label class='col-form-label'>Dokumen/File Hasil</label><div class='col-sm-12'>
                            <input type='file' name='panduan' required='' /><br><br>
                            </div>
                            </div>";
                            echo "<button type='submit' name='btn_upload' class='btn btn-primary mr-2'>Unggah Hasil</button>";
                              }else{
                                echo "<p>Ketua Belum Mengunggah Hasil Pengerjaan</p>";
                              }
                              
                            }
                          }
                          ?>
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 stretch-card grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <p class="card-title mb-0">Komentar</p><br>
                          
                            <form class="forms-sample" class="pt-3" method="POST" action="cekkomenpro.php?id_proyekstep=<?php echo $_GET["id_proyekstep"]; ?>& id_kelompok=<?php echo $_GET['id_kelompok'];?>" enctype="multipart/form-data">                
                              <div class="form-group">
                                <textarea class="form-control" name="komentar" rows="3" placeholder="Masukkan Komentar/Pertanyaan"></textarea>
                              </div>
                              <button type="submit" name="btn_komen" class="btn btn-primary mr-2">Kirim</button>
                            </form>  
                          
                          <br><br>
                          <p class="card-title mb-0">Riwayat Komentar</p><br>
                          
                          <?php
                            $get = "SELECT tb_akun.foto, tb_komentarproyek.id_komentarproyek, tb_komentarproyek.tanggal as tgl_komen, tb_siswa.nama_siswa, tb_proyekstep.nama_step, tb_komentarproyek.isi_komentarproyek
                            FROM tb_komentarproyek
                            JOIN tb_siswa ON tb_komentarproyek.id_siswa=tb_siswa.id_siswa
                            JOIN tb_proyekstep ON tb_komentarproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                            JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                            LEFT JOIN tb_balasanproyek ON tb_balasanproyek.id_komentarproyek=tb_komentarproyek.id_komentarproyek
                            JOIN tb_akun ON tb_akun.id_akun=tb_siswa.id_akun
                            WHERE tb_proyekstep.id_proyekstep='".$_GET["id_proyekstep"]."' AND tb_siswa.id_siswa='".$id_siswa."' AND tb_balasanproyek.id_balasanproyek IS NULL";
                            $eks = mysqli_query($conn, $get);
                            $hasil = mysqli_num_rows($eks);

                              if($hasil>0){
                                while($data = mysqli_fetch_array($eks)){
                                  echo "<ul class='icon-data-list'>";
                                  echo "<li>";
                                  echo "<div class='d-flex'>";
                                  echo "<img src='../../images/pengguna/".$data['foto']."' alt='user'>";
                                  echo "<div>";
                                  echo "<p class='text-info mb-1'>".$data['nama_siswa']."</p>";
                                  echo "<small class='text-muted'>".date('d M Y',(strtotime($data["tgl_komen"])))."</small><br>";
                                  echo "<p class='mb-0'>".$data['isi_komentarproyek']."</p>";
                                  echo "<p style='font-style:italic;' class='card-description'>Belum ada balasan</p>";
                                  
                                  echo "</div>";
                                  echo "</div>";
                                  echo "</li>";
                                  echo "</ul>";
                                  }}
                                                         
                            ?>                        
                          

                          <ul class="icon-data-list">
                            <?php
                            $get = "SELECT *
                            FROM tb_komentarproyek
                            JOIN tb_siswa ON tb_komentarproyek.id_siswa=tb_siswa.id_siswa
                            JOIN tb_akun ON tb_siswa.id_akun=tb_akun.id_akun
                            JOIN tb_proyekstep ON tb_komentarproyek.id_proyekstep=tb_proyekstep.id_proyekstep
                            JOIN tb_proyek ON tb_proyekstep.id_proyek=tb_proyek.id_proyek
                            LEFT JOIN tb_balasanproyek ON tb_balasanproyek.id_komentarproyek=tb_komentarproyek.id_komentarproyek
                            JOIN tb_guru ON tb_guru.id_guru=tb_balasanproyek.id_guru
                            WHERE tb_proyekstep.id_proyekstep='".$_GET["id_proyekstep"]."' AND tb_siswa.id_siswa='".$id_siswa."'
                            AND tb_balasanproyek.id_balasanproyek IS NOT NULL";
                            $eks = mysqli_query($conn, $get);
                            $hasil = mysqli_num_rows($eks);

                              if($hasil>0){
                                while($data = mysqli_fetch_array($eks)){
                                  echo "<li>";
                                  echo "<div class='d-flex'>";
                                  echo "<img src='../../images/pengguna/".$data['foto']."' alt='user'>";
                                  echo "<div>";
                                  echo "<p class='text-info mb-1'>".$data['nama_guru']."</p>";
                                  echo "<small class='text-muted'>".date('d M Y',(strtotime($data["tanggal"])))."</small><br>";
                                  echo "<p class='mb-0'>".$data['isi_komentarproyek']."</p>";
                                  echo "<p class='font-weight-bold'>Balasan: ".$data['isi_balasanproyek']."</p>";
                                  }}
                                  
                                  echo "</div>";
                                  echo "</div>";
                                  echo "</li>";
                                                         
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
        } else echo "Data tidak ditemukan";
?>

</html>

