<?php
$siswa = [
  [
    'nama' => 'Aminah',
    'umur' => 30,
    'jurusan' => 'Teknik Sipil',
    'status' => '1'
  ],
  [
    'nama' => 'Noah',
    'umur' => 17,
    'jurusan' => 'Ekonomi Bisnis',
    'status' => '1'
  ],
  [
    'nama' => 'Borneo',
    'umur' => 27,
    'jurusan' => 'Statistika',
    'status' => '0'
  ]
];

function ubahstatus($status)
{
  switch ($status) {
    case '1':
      return 'Aktif';
      break;

    default:
      return 'Tidak Aktif';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data User</title>
</head>

<body>
  <h1>Data Siswa</h1>
  <table border="1" width="100%">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Umur</th>
        <th>Jurusan</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($siswa as $index => $sw) { ?>
        <tr>
          <td><?php echo $sw['nama'] ?></td>
          <td><?php echo $sw['umur'] ?></td>
          <td><?php echo $sw['jurusan'] ?></td>
          <td>
            <?php
            echo ubahstatus($sw['status']);
            ?>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>