<!-- var system: var yg dibuat oleh php 
 $_POST, $_GET, $_SESSION, $_SERVER, $_FILES, $_REQUEST
 -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variable System | Superglobal Var</title>
</head>

<body>
  <!-- $data = ["nama" => "Cay"] -->
  <form action="" method="get">
    <div class="form-group">
      <label for="">Nama: </label>
      <input type="text" name="nama" placeholder="masukkan nama anda">
    </div>
    <br>
    <div class="form-group">
      <label for="">Nilai: </label>
      <input type="number" name="nilai" placeholder="masukkan nilai anda">
    </div>
    <div class="form-group">
      <button type="submit">Kirim</button>
    </div>
    <br>
  </form>

  <?php

  if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
    $nilai = $_GET['nilai'];
    $grade = '';
    $status = '';

    if ($nilai >= 90) {
      $grade = 'A';
    } elseif ($nilai >= 80) {
      $grade = 'B';
    } elseif ($nilai >= 70) {
      $grade = 'C';
    } elseif ($nilai >= 60) {
      $grade = 'D';
    } else {
      $grade = 'E';
    }

    if ($nilai > 70) {
      $status = 'Lulus';
    } else {
      $status = 'Tidak Lulus';
    }
  }

  echo 'Nama Siswa: ' . $nama . '<br>';
  echo 'Nilai: ' . $nilai . '<br>';
  echo 'Grade: ' . $grade . '<br>';
  echo 'Status: ' . $status;

  //shorthand / ternairy
  // $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
  // echo '<br>Selamat Siang ' . $nama;




  ?>



</body>

</html>