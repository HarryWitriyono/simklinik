<?php if (!isset($_SESSION)) session_start(); 
if (empty($_SESSION['_login'])) {
  header('location:index.php');
  exit();
}
?>
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
<body onload="KodeTindakan.focus()">
<div class="container">
<h2>Form Tindakan Baru</h2>
<form method="post">
  <div class="form-group row">
    <label for="KodeTindakan" class="col-4 col-form-label">KodeTindakan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-barcode"></i>
          </div>
        </div> 
        <input id="KodeTindakan" name="KodeTindakan" placeholder="Ketik kode tindakan" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaTindakan" class="col-4 col-form-label">Nama Tindakan</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-500px"></i>
          </div>
        </div> 
        <input id="NamaTindakan" name="NamaTindakan" placeholder="Ketik nama tindakan" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Harga" class="col-4 col-form-label">Harga</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-money"></i>
          </div>
        </div> 
        <input id="Harga" name="Harga" placeholder="Ketik harga" type="text" class="form-control" required="required">
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan Tindakan Baru</button>
    </div>
  </div>
</form>
<?php
if (isset($_POST['submit'])) {
  $KodeTindakan=filter_var($_POST['KodeTindakan'],FILTER_SANITIZE_STRING);
  $NamaTindakan=filter_var($_POST['NamaTindakan'],FILTER_SANITIZE_STRING);
  $Harga=filter_var($_POST['Harga'],FILTER_SANITIZE_STRING);
  include('koneksi.db.php');
  $sql="INSERT INTO `tindakan`(`KodeTindakan`, `NamaTindakan`, `Harga`) VALUES ('".$KodeTindakan."','".$NamaTindakan."','".$Harga."')";
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