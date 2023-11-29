<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simpan Kasir Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Simpan Koreksi Kasir</h2>
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Simpan Koreksi Kasir</strong> 
<?php 
if ((isset($_POST['IdKasir'])) and (!empty($_POST['IdKasir']))) {
	$IdKasir=filter_var($_POST['IdKasir'],FILTER_SANITIZE_STRING);
	$NamaKasir=filter_var($_POST['NamaKasir'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
	include('koneksi.db.php');
	$sql="update kasir set NamaKasir='".$NamaKasir."',Password='".$Password."' WHERE IdKasir='".$IdKasir."'";
	if (mysqli_query($koneksi,$sql)) {
		echo 'Rekord kasir sudah disimpan !';
	} else {
		echo 'Rekord kasir gagal disimpan !';
	}
}
?>
 </div>
 <a href="formkasir.php" class="btn btn-success">Form Kasir</a>
</div>

</body>
</html>