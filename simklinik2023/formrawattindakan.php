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
<body onload="NomorRekamMedik.focus()">
<div class="container">
<h2>Form Rawat Tindakan Baru</h2>
<form method="post" action="hasilcektindakanpasien.php" target="frmhasil">
  <div class="form-group row">
    <label for="NomorRekamMedik" class="col-4 col-form-label">NomorRekamMedik</label> 
    <div class="col-8">
      <input id="NomorRekamMedik" name="NomorRekamMedik" type="text" required="required" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">🔍 Cek</button>
    </div>
  </div>
</form>
</div>
<div class="container">
<iframe name="frmhasil" width="100%" height="500px"></iframe>
</div>
</body>
</html>