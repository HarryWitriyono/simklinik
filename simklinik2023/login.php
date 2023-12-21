<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="assets/js/web.webmanifest">
  <link rel="apple-touch-icon" href="assets/img/icon.png">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <style>
  img.avatar {
  width: 20%;
  border-radius: 50%;
}
  </style>
</head>
<body>
<div class="container mt-3">
<img src="assets/img/img_avatar2.png" alt="Avatar" class="avatar">
<h2>Login Form SIM Klinik V.2023</h2>
  <form method="post">

    <div class="input-group mb-3">
      <span class="input-group-text">Username</span>
      <input class="form-control" type="text" placeholder="Enter Username" id="uname" name="uname" required>
    </div> 
    <div class="input-group mb-3">
      <span class="input-group-text">Password</span>
      <input class="form-control" type="password" placeholder="Enter Password" name="psw" required>
    </div>
	<button type="submit" class="btn btn-primary" name='bLogin'>Login</button>
  </form>
<?php 
if ((isset($_POST['bLogin'])) and (isset($_POST['uname'])) and (!empty($_POST['uname']))) {
	$Username=filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['psw'],FILTER_SANITIZE_STRING);
	include('koneksi.db.php');
	$sql="select * from petugas where Username='".$Username."' and Password='".$Password."'";
	$q=mysqli_query($koneksi,$sql);
	$r=mysqli_fetch_array($q);
	if (empty($r)) {
    $sql="select * from dokter where Username='".$Username."' and Password='".$Password."'";
    $q=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_array($q);
    if (empty($r)) {
      echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
      <strong>Cari Kasir</strong> Kasir Tidak Ditemukan ! Kode Kasir tidak boleh kosong. </div>';
		  exit();
    }
	} else {
		if (!isset($_SESSION)) session_start();
		$_SESSION['_login']=$r['KodePetugas'];
    $_SESSION['_level']=$r['Level'];
		echo '<script>window.location.replace("index.php");</script>';
	}
} 
?>
</div>
</body>
</html>