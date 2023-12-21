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
<h2>Form Pendaftaran Kunjungan Baru</h2>
<form method="post" action="hasilcekrmpendaftaran.php" target="framehasil">
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nomor Rekam Medik</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-barcode"></i>
          </div>
        </div> 
        <input id="NomorRekamMedik" name="NomorRekamMedik" placeholder="Scan / Ketik nomor RM Pasien" type="text" class="form-control" autofocus="true" required>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Keluhan" class="col-4 col-form-label">Keluhan</label> 
    <div class="col-8">
      <textarea id="Keluhan" name="Keluhan" cols="40" rows="5" class="form-control" required="required"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <label for="KodeDokter" class="col-4 col-form-label">Dokter Tujuan</label> 
    <div class="col-8">
      <select id="KodeDokter" name="KodeDokter" class="custom-select" required>
        <option value="">Pilih dokternya</option>
        <?php include('koneksi.db.php');
        $sql="select * from dokter";
        $q=mysqli_query($koneksi,$sql);
        $r=mysqli_fetch_array($q);
        do {
        ?>
        <option value="<?php echo $r['KodeDokter'];?>"><?php echo $r['NamaDokter'];?></option>
        <?php }while($r=mysqli_fetch_array($q)); 
        ?>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Daftarkan</button>
    </div>
  </div>
</form>
</div>
<div class="container">
<iframe src="" width="100%" height="400px" name="framehasil"></iframe>
</div>
</body>
</html>