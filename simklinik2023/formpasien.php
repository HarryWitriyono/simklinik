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
<h2>Form Pasien Baru</h2>
<form method="post">
  <div class="form-group row">
    <label for="NomorRekamMedik " class="col-4 col-form-label">Nomor Rekam Medik</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-barcode"></i>
          </div>
        </div> 
        <input id="NomorRekamMedik" name="NomorRekamMedik" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaPasien" class="col-4 col-form-label">Nama Pasien</label> 
    <div class="col-8">
      <input id="NamaPasien" name="NamaPasien" placeholder="Ketik Nama Pasien" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="NomorIdentitas" class="col-4 col-form-label">Nomor Identitas</label> 
    <div class="col-8">
      <input id="NomorIdentitas" name="NomorIdentitas" placeholder="Ketik Nomor Identitas / KTP / SIM " type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="JenisKelamin" class="col-4 col-form-label">Jenis Kelamin</label> 
    <div class="col-8">
      <select id="JenisKelamin" name="JenisKelamin" class="custom-select">
        <option value="Perempuan">Perempuan</option>
        <option value="Laki-laki">Laki-laki</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="GolonganDarah" class="col-4 col-form-label">Golongan Darah</label> 
    <div class="col-8">
      <select id="GolonganDarah" name="GolonganDarah" class="custom-select">
        <option value="O">O</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="AB">AB</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="Agama" class="col-4 col-form-label">Agama</label> 
    <div class="col-8">
      <select id="Agama" name="Agama" class="custom-select">
        <option value="Islam">Islam</option>
        <option value="Katolik">Katolik</option>
        <option value="Kristen">Kristen</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="TempatLahir" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="TempatLahir" name="TempatLahir" placeholder="Tempat Lahir" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="TanggalLahir" class="col-4 col-form-label">TanggalLahir</label> 
    <div class="col-8">
      <input id="TanggalLahir" name="TanggalLahir" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="NoTelepon" class="col-4 col-form-label">No.Telepon</label> 
    <div class="col-8">
      <input id="NoTelepon" name="NoTelepon" placeholder="Nomor Telepon" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="Alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="Alamat" name="Alamat" cols="40" rows="2" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="StatusNikah" class="col-4 col-form-label">Status Nikah</label> 
    <div class="col-8">
      <select id="StatusNikah" name="StatusNikah" class="custom-select">
        <option value="Belum Nikah">Belum Nikah</option>
        <option value="Nikah">Nikah</option>
        <option value="Janda">Janda</option>
        <option value="Duda">Duda</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="Pekerjaan" class="col-4 col-form-label">Pekerjaan</label> 
    <div class="col-8">
      <input id="Pekerjaan" name="Pekerjaan" placeholder="Pekerjaan" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="NamaKerabat" class="col-4 col-form-label">NamaKerabat</label> 
    <div class="col-8">
      <input id="NamaKerabat" name="NamaKerabat" placeholder="Nama Kerabat" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="StatusKerabat" class="col-4 col-form-label">StatusKerabat</label> 
    <div class="col-8">
      <select id="StatusKerabat" name="StatusKerabat" class="custom-select">
        <option value="Ayah">Ayah</option>
        <option value="Ibu">Ibu</option>
        <option value="Suami">Suami</option>
        <option value="Istri">Istri</option>
        <option value="Anak">Anak</option>
        <option value="Saudara">Saudara</option>
        <option value="Lain-Lain">Lain-Lain</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="NoTeleponKerabat" class="col-4 col-form-label">No.Telepon Kerabat</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-phone-square"></i>
          </div>
        </div> 
        <input id="NoTeleponKerabat" name="NoTeleponKerabat" type="text" class="form-control">
      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Simpan Pasien Baru</button>
    </div>
  </div>
</form>
<?php if (isset($_POST['submit'])) {
  $NomorRekamMedik=filter_var($_POST['NomorRekamMedik'],FILTER_SANITIZE_STRING);
  $NamaPasien=filter_var($_POST['NamaPasien'],FILTER_SANITIZE_STRING);
  $NomorIdentitas=filter_var($_POST['NomorIdentitas'],FILTER_SANITIZE_STRING);
  $JenisKelamin=filter_var($_POST['JenisKelamin'],FILTER_SANITIZE_STRING);
  $GolonganDarah=filter_var($_POST['GolonganDarah'],FILTER_SANITIZE_STRING);
  $Agama=filter_var($_POST['Agama'],FILTER_SANITIZE_STRING);
  $TempatLahir=filter_var($_POST['TempatLahir'],FILTER_SANITIZE_STRING);
  $TanggalLahir=filter_var($_POST['TanggalLahir'],FILTER_SANITIZE_STRING);
  $NoTelepon=filter_var($_POST['NoTelepon'],FILTER_SANITIZE_STRING);
  $Alamat=filter_var($_POST['Alamat'],FILTER_SANITIZE_STRING);
  $StatusNikah=filter_var($_POST['StatusNikah'],FILTER_SANITIZE_STRING);
  $Pekerjaan=filter_var($_POST['Pekerjaan'],FILTER_SANITIZE_STRING);
  $NamaKerabat=filter_var($_POST['NamaKerabat'],FILTER_SANITIZE_STRING);
  $StatusKerabat=filter_var($_POST['StatusKerabat'],FILTER_SANITIZE_STRING);
  $NoTeleponKerabat=filter_var($_POST['NoTeleponKerabat'],FILTER_SANITIZE_STRING);
  include('koneksi.db.php');
  $sql="INSERT INTO `pasien`(`NomorRekamMedik`, `NamaPasien`, `NomorIdentitas`, `JenisKelamin`, `GolonganDarah`, `Agama`, `TempatLahir`, `TanggalLahir`, `NoTelepon`, `Alamat`, `StatusNikah`, `Pekerjaan`, `NamaKerabat`, `StatusKerabat`, `NoTeleponKerabat`, `TanggalRekam`, `KodePetugas`) VALUES ('".$NomorRekamMedik."','".$NamaPasien."','".$NomorIdentitas."','".$JenisKelamin."','".$GolonganDarah."','".$Agama."','".$TempatLahir."','".$TanggalLahir."','".$NoTelepon."','".$Alamat."','".$StatusNikah."','".$Pekerjaan."','".$NamaKerabat."','".$StatusKerabat."','".$NoTeleponKerabat."',now(),'".$_SESSION['_login']."')";
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