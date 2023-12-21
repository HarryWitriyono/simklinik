<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Daftar Pasien</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Tabel Daftar Pasien</h2>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari berdasarkan nama.." title="Type in a name">
  <p>Daftar Pasien Urut Hingga Nomor Rekam Medik Terbaru :</p>            
  <table class="table table-striped table-bordered" id="myTable">
    <thead>
      <tr>
        <th>Nomor Rekam Medik</th>
        <th>Nama Pasien</th>
        <th>Nomor Identitas</th>
        <th>Tempat,Tgl. Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Golongan Darah</th>
        <th>Agama</th>
    </thead>
    <tbody>
      <?php include_once('koneksi.db.php');
      $sql="select * from pasien order by NomorRekamMedik Desc";
      $q=mysqli_query($koneksi,$sql);
      $r=mysqli_fetch_array($q);
      if (empty($r)) {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick=""></button>
        <strong>Tabel Kosong!</strong> Tidak ada daftar pasien, <a href="formpasien.php" target="frmmenu" class="btn btn-info">Silahkan isi daftar pasien terlebih dulu</a>.
      </div>';
        exit();
      }
      do {
      ?>
      <tr>
        <td><?php echo $r['NomorRekamMedik'];?></td>
        <td><?php echo $r['NamaPasien'];?></td>
        <td><?php echo $r['NomorIdentitas'];?></td>
        <td><?php echo $r['TempatLahir'].', '.date('d-m-Y',strtotime($r['TanggalLahir']));?></td>
        <td><?php echo $r['JenisKelamin'];?></td>
        <td><?php echo $r['GolonganDarah'];?></td>
        <td><?php echo $r['Agama'];?></td>
      </tr>
      <?php }while($r=mysqli_fetch_array($q));
      ?>
    </tbody>
  </table>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>
