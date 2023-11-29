<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simpan Barang Baru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Simpan Barang Baru</h2>
  <div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Simpan Barang Baru</strong> 
<?php 
if ((isset($_POST['KodeBarang'])) and (!empty($_POST['KodeBarang']))) {
	$KodeBarang=filter_var($_POST['KodeBarang'],FILTER_SANITIZE_STRING);
	$NamaBarang=filter_var($_POST['NamaBarang'],FILTER_SANITIZE_STRING);
	$Jumlah=filter_var($_POST['Jumlah'],FILTER_SANITIZE_STRING);
	$Satuan=filter_var($_POST['Satuan'],FILTER_SANITIZE_STRING);
	$HargaSatuan=filter_var($_POST['HargaSatuan'],FILTER_SANITIZE_STRING);
	include('koneksi.db.php');
	$sql="update barang set NamaBarang='".$NamaBarang."',Jumlah='".$Jumlah."',Satuan='".$Satuan."',HargaSatuan='".$HargaSatuan."' WHERE KodeBarang='".$KodeBarang."'";
	if (mysqli_query($koneksi,$sql)) {
		echo 'Rekord barang sudah disimpan !';
	} else {
		echo 'Rekord barang gagal disimpan !';
	}
}
?>
 </div>
 <a href="formbarang.php" class="btn btn-success">Form Barang</a>
</div>

</body>
</html>