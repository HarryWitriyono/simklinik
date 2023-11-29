<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIMRS Muhammadiyah - V. 2023</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3 bg-success text-white">
  <h2>Data Rekam Medik</h2>
  <p>Isi data rekam medik pasien :</p>
  <form method="post" action="simpanrm.php" class="text-black">
  <div class="form-floating mt-2 mb-2">
    <input type="text" class="form-control" placeholder="Nama Pasien :" id="nama" name="nama">
    <label>Nama Pasien :</label>
  </div>
  <div class="form-floating mt-2 mb-2">
    <input type="date" class="form-control" placeholder="Tanggal Lahir Pasien :" id="tgllahir" name="tgllahir">
    <label>Tanggal Lahir Pasien :</label>
  </div>
  <div class="form-floating mt-2 mb-2">
    <input type="password" class="form-control" placeholder="Password :" id="pswd" name="pswd">
    <label>Password :</label>
  </div>
  <div class="form-floating mt-2 mb-2">
    <textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Alamat:"></textarea>
    <label for="alamat">Alamat:</label>
  </div>
  <button type="submit" class="btn btn-primary" name="bSimpan">Simpan</button>
</form>
</div>

</body>
</html>
