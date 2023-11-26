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
<form>
  <div class="form-group row">
    <label for="KodeObat " class="col-4 col-form-label">KodeObat</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-barcode"></i>
          </div>
        </div> 
        <input id="KodeObat " name="KodeObat " placeholder="Ketik / Scan Kode Obat " type="text" class="form-control" required="required">
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
</div>
</body>
</html>