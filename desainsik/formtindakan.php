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
<div class="container"><form>
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
</div>
</body>
</html>