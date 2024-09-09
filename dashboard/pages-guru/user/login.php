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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/logo_scope_mini.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/logo_scope.png" alt="logo">
              </div>
              <h4>Halo! Selamat Datang, Guru!</h4>
              <h6 class="font-weight-light">Masuk ke Akun untuk Melanjutkan</h6>
              <form class="pt-3" method="post" action="ceklogin.php">
                <div class="form-group">
                  <input type="name" class="form-control form-control-lg" name="uname" id="uname" placeholder="Nama Pengguna">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="pw" id="pw" placeholder="Kata Sandi">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="btn_login">Masuk</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum Memiliki Akun? <a href="register.php" class="text-primary">Buat</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->

  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo "Gagal Masuk! Nama Pengguna dan Kata Sandi salah!";
    }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil Keluar";
    }else if($_GET['pesan'] == "belum_login"){
      echo "Anda harus Masuk untuk mengakses halaman siswa";
    }
  }
?>

  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
