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
  <h2>Simpan Kasir Baru</h2>
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
  <strong>Simpan Kasir Baru</strong> 
<?php 
if ((isset($_POST['NamaKasir'])) and (!empty($_POST['NamaKasir']))) {
	$NamaKasir=filter_var($_POST['NamaKasir'],FILTER_SANITIZE_STRING);
	$Password=filter_var($_POST['Password'],FILTER_SANITIZE_STRING);
	include('koneksi.db.php');
	$sql="insert into kasir (NamaKasir,Password) values (
	'".$NamaKasir."',
	'".$Password."'
	)";
	if (mysqli_query($koneksi,$sql)) {
		echo 'Rekord kasir sudah disimpan !';
	} else {
		echo 'Rekord kasir gagal disimpan !';
	}
} else {
	echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
  <strong>Cari Kasir</strong> Kasir Tidak Ditemukan ! Kode Kasir tidak boleh kosong. </div>';
}//end if isset KodeKasir
?>
 </div>
 <a href="formkasir.php" class="btn btn-success">Form Kasir</a>
 <a href="carikasir.php" class="btn btn-info">Cari Kasir</a>
</div>

</body>
</html>