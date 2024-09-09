<?php
session_start();

$_SESSION['id_akun'] = '';
$_SESSION['username'] = '';
$_SESSION['password'] = '';
$_SESSION['status'] = '';
$_SESSION['foto'] = '';
$_SESSION['id_guru'] = '';
$_SESSION['nama_guru'] = '';
$_SESSION['nip'] = '';

unset($_SESSION['id_akun']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['status']);
unset($_SESSION['foto']);
unset($_SESSION['id_guru']);
unset($_SESSION['nama_guru']);
unset($_SESSION['nip']);

session_unset();
session_destroy();
header('Location:../../../index.php');

?>