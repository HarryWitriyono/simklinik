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
<h2>Form Dokter Baru</h2>
<form method="post">
  <div class="form-group row">
    <label for="KodeDokter " class="col-4 col-form-label">Kode Dokter</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="KodeDokter" name="KodeDokter" placeholder="Kode Dokter " type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaDokter" class="col-4 col-form-label">NamaDokter</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">👨‍⚕️</div>
        </div> 
        <input id="NamaDokter" name="NamaDokter" placeholder="Ketik Nama Dokter" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Sex" class="col-4 col-form-label">Sex</label> 
    <div class="col-8">
      <select id="Sex" name="Sex" class="custom-select" required="required">
        <option value="Perempuan">Perempuan</option>
        <option value="Laki-Laki">Laki-Laki</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="TempatLahir" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="TempatLahir" name="TempatLahir" placeholder="Ketik Tempat Lahir" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="TanggalLahir" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input id="TanggalLahir" name="TanggalLahir" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="Alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="Alamat" name="Alamat" cols="40" rows="2" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="NoTelepon" class="col-4 col-form-label">NoTelepon</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-phone-square"></i>
          </div>
        </div> 
        <input id="NoTelepon" name="NoTelepon" placeholder="+6281xxxx" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="SIP" class="col-4 col-form-label">SIP</label> 
    <div class="col-8">
      <input id="SIP" name="SIP" placeholder="Ketik Nomor Surat Ijin Praktek" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Spesialisasi" class="col-4 col-form-label">Spesialisasi</label> 
    <div class="col-8">
      <input id="Spesialisasi" name="Spesialisasi" placeholder="Spesialisasi" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="BagiHsil" class="col-4 col-form-label">Bagi Hasil</label> 
    <div class="col-8">
      <input id="BagiHsil" name="BagiHsil" placeholder="Ketik besar bagi hasil yang diinginkan per pasien" type="text" class="form-control">
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
        <input id="Password" name="Password" placeholder="Password" type="password" required="required" class="form-control">
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
<?php if (isset($_POST['submit'])) {
  $KodeDokter=filter_var($_POST['KodeDokter'],FILTER_SANITIZE_STRING);
  $NamaDokter=filter_var($_POST['NamaDokter'],FILTER_SANITIZE_STRING);
  $Sex=filter_var($_POST['Sex'],FILTER_SANITIZE_STRING);
  $TempatLahir=filter_var($_POST['TempatLahir'],FILTER_SANITIZE_STRING);
  $TanggalLahir=filter_var($_POST['TanggalLahir'],FILTER_SANITIZE_STRING);
  $NoTelepon=filter_var($_POST['NoTelepon'],FILTER_SANITIZE_STRING);
  $Alamat=filter_var($_POST['Alamat'],FILTER_SANITIZE_STRING);
  $SIP=filter_var($_POST['SIP'],FILTER_SANITIZE_STRING);
  $Spesialisasi=filter_var($_POST['Spesialisasi'],FILTER_SANITIZE_STRING);
  $BagiHsil=filter_var($_POST['BagiHsil'],FILTER_SANITIZE_STRING);
  $Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
  include('koneksi.db.php');
  $sql="INSERT INTO `dokter`(`KodeDokter`, `NamaDokter`, `Sex`, `TempatLahir`, `TanggalLahir`, `Alamat`, `NoTelepon`, `SIP`, `Spesialisasi`, `BagiHsil`, `Password`) VALUES ('".$KodeDokter."','".$NamaDokter."','".$Sex."','".$TempatLahir."','".$TanggalLahir."','".$Alamat."','".$NoTelepon."','".$SIP."','".$Spesialisasi."','".$BagiHsil."','".$Password."')";
  $q=mysqli_query($koneksi,$sql);
  if ($q) {
    echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Success!</strong> Rekord sukses disimpan !.
  </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Gagal!</strong> Gagal simpan rekord.
  </div>';
  }
}
?>
</div>
</body>
</html>