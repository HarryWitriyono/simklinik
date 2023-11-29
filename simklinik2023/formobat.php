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
<body>
<div class="container">
<h2>Form Obat Baru</h2>
<form method="post">
  <div class="form-group row">
    <label for="KodeObat" class="col-4 col-form-label">KodeObat</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-barcode"></i>
          </div>
        </div> 
        <input id="KodeObat" name="KodeObat" placeholder="Ketik / Scan Kode Obat " type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaObat" class="col-4 col-form-label">NamaObat</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">💊</div>
        </div> 
        <input id="NamaObat" name="NamaObat" placeholder="Ketik Nama Obat" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="HargaModal" class="col-4 col-form-label">HargaModal</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-money"></i>
          </div>
        </div> 
        <input id="HargaModal" name="HargaModal" placeholder="Harga Modal" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="HargaJual" class="col-4 col-form-label">HargaJual</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">💸</div>
        </div> 
        <input id="HargaJual" name="HargaJual" placeholder="Harga Jual" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Stok" class="col-4 col-form-label">Stok</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">🛍️</div>
        </div> 
        <input id="Stok" name="Stok" placeholder="Jumlah Stok" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Keterangan" class="col-4 col-form-label">Keterangan</label> 
    <div class="col-8">
      <textarea id="Keterangan" name="Keterangan" cols="40" rows="5" class="form-control"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan Obat Baru</button>
    </div>
  </div>
</form>
<?php
if (isset($_POST['submit'])) {
  $KodeObat=filter_var($_POST['KodeObat'],FILTER_SANITIZE_STRING);
  $NamaObat=filter_var($_POST['NamaObat'],FILTER_SANITIZE_STRING);
  $HargaModal=filter_var($_POST['HargaModal'],FILTER_SANITIZE_STRING);
  $HargaJual=filter_var($_POST['HargaJual'],FILTER_SANITIZE_STRING);
  $Stok=filter_var($_POST['Stok'],FILTER_SANITIZE_STRING);
  $Keterangan=filter_var($_POST['Keterangan'],FILTER_SANITIZE_STRING);
  include('koneksi.db.php');
  $sql="INSERT INTO `obat`(`KodeObat`, `NamaObat`, `HargaModal`, `HargaJual`, `Stok`, `Keterangan`) VALUES ('".$KodeObat."','".$NamaObat."','".$HargaModal."','".$HargaJual."','".$Stok."','".$Keterangan."')";
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