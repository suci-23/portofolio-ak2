<?php
$nama = 'Salsabila Suci Gustiani';
$nilai = 70;
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

echo 'Nama Siswa: ' . $nama . '<br>';
echo 'Nilai: ' . $nilai . '<br>';
echo 'Grade: ' . $grade . '<br>';
echo 'Status: ' . $status;
