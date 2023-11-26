<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Informasi Klinik Versi 2023</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="assets/js/web.webmanifest">
  <link rel="apple-touch-icon" href="assets/img/icon.png">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
<body onload="KodePetugas.focus()">
<div class="container">
<form method="post">
  <div class="form-group row">
    <label for="KodePetugas " class="col-4 col-form-label">Kode Petugas</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="KodePetugas" name="KodePetugas" placeholder="Ketik Kode Petugas / Perawat" type="text" class="form-control" autofocus="true" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaPetugas" class="col-4 col-form-label">Nama Petugas</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card-o"></i>
          </div>
        </div> 
        <input id="NamaPetugas" name="NamaPetugas" placeholder="Ketik NamaPetugas" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="NomorTelepon" class="col-4 col-form-label">Nomor Telepon</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-phone"></i>
          </div>
        </div> 
        <input id="NomorTelepon" name="NomorTelepon" placeholder="+62 81xxxxxx" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Username" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-user-secret"></i>
          </div>
        </div> 
        <input id="Username" name="Username" placeholder="Ketik Username" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Password" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-key"></i>
          </div>
        </div> 
        <input id="Password" name="Password" placeholder="Ketik password" type="password" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Level" class="col-4 col-form-label">Level Petugas</label> 
    <div class="col-8">
      <select id="Level" name="Level" class="form-select" aria-describedby="LevelHelpBlock" required="required">
        <option value="Pendaftaran">Pendaftaran</option>
        <option value="Perawat">Perawat</option>
        <option value="Laboran">Laboran</option>
      </select> 
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan Petugas Baru</button>
      <button name="bCari" type="submit" class="btn btn-info" formnovalidate formaction="hasilcaripetugas.php">Cari Petugas</button>
    </div>
  </div>
</form>
<?php
if (isset($_POST['submit'])) {
  $KodePetugas=filter_var($_POST['KodePetugas'],FILTER_SANITIZE_STRING);
  $NamaPetugas=filter_var($_POST['NamaPetugas'],FILTER_SANITIZE_STRING);
  $NomorTelepon=filter_var($_POST['NomorTelepon'],FILTER_SANITIZE_STRING);
  $Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
  $Level=filter_var($_POST['Level'],FILTER_SANITIZE_STRING);
  $Username=filter_var($_POST['Username'],FILTER_SANITIZE_STRING);
  include('koneksi.db.php');
  $sql="INSERT INTO `petugas` (`KodePetugas`, `NamaPetugas`, `NomorTelepon`, `Username`, `Password`, `Level`) VALUES ('".$KodePetugas."', '".$NamaPetugas."', '".$NomorTelepon."', '".$Username."', '".$Password."', '".$Level."')";
  $q=mysqli_query($koneksi,$sql);
  if ($q) {
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Record Saved Success!</strong> Record sudah disimpan.
  </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Record Saved Failed!</strong> Record gagal disimpan.
  </div>';
  }
  mysqli_close($koneksi);
};
?>
</div>
</body>
</html>