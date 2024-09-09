<?php
    session_start();
    include "../../../koneksi.php";

    $username = $_POST['uname'];
    $password = $_POST['pw'];

    $data = mysqli_query($conn, 
            "SELECT * 
            FROM tb_akun JOIN tb_guru
            ON tb_akun.id_akun=tb_guru.id_akun
            WHERE tb_akun.username='$username' AND tb_akun.password='$password'");
    $cek = mysqli_fetch_array($data);

    if($cek['username'] == $username AND $cek['password'] == $password){
                $_SESSION['id_akun'] = $cek['id_akun'];
                $_SESSION['id_guru'] = $cek['id_guru'];
                $_SESSION['nama_guru'] = $cek['nama_guru'];
                $_SESSION['username'] = $cek['username'];
                $_SESSION['password'] = $cek['password'];
                $_SESSION['nip'] = $cek['nip'];
                $_SESSION['foto'] = $cek['foto'];
                $_SESSION['status'] = $cek['status'];
                header("location:../../dashboard-guru.php");
            
    }else{
        echo "<script>alert('Nama Pengguna atau Kata Sandi tidak tepat !!!');</script>";
        echo "<script>location='login.php';</script>";
    }
?>