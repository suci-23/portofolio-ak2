<?php
$buah = ["Naga", "Mangga", "Alpukat", "Pear"];
print_r($buah);
echo "<br> <br>";

foreach ($buah as $b) {
  echo "Nama - Nama Buah: " . $b . "<br>";
}
echo "<br>";


//array asosiatif: key-nya menggunakan string
$kls_web = [
  'nama' => 'Sugus',
  'umur' => 25,
  'jurusan' => 'Junior Web Pro'
];

echo 'Nama Siswa: ' . $kls_web['nama'];
echo '<br>';
echo 'Berusia ' . $kls_web['umur'] . ' Tahun..... Dengan Jurusan ' . $kls_web['jurusan'];
echo '<br> <br>';

$siswa = [
  [
    'nama' => 'Aminah',
    'umur' => 30,
    'jurusan' => 'Teknik Sipil',
  ],
  [
    'nama' => 'Noah',
    'umur' => 17,
    'jurusan' => 'Ekonomi Bisnis',
  ],
  [
    'nama' => 'Borneo',
    'umur' => 27,
    'jurusan' => 'Statistika',
  ]
];
print_r($siswa);
echo $siswa[1]['nama'];
echo '<br> <br>';

foreach ($siswa as $index => $sw) {
  echo 'No.' . $index . "<br>";
  echo 'Nama: ' . $sw['nama'] . '<br>';
  echo 'Umur: ' . $sw['umur'] . '<br>';
  echo 'Jurusan: ' . $sw['jurusan'] . '<br><br>';
};
