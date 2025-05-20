<!-- if: percabangan dan logika utk menjalankan kode bedasarkan kondisi yang dicari 
 = memberi nilai
 == membandingkan nilai
 == membandingkan tp dgn tipe datanya
 !: tidak
 empty: kosong
 isset: tdk kosong
 >: lebih besar, <: lebih kecil-->

<?php

$nama = 'Sucay';
echo 'nama di data: ' . $nama . ' bukan?? ';

if ($nama == 'Sucay') {
  echo "yak,tul!";
} else {
  echo "salah";
}


echo '<br>di data $nama kosong ga? : ';
if (empty($nama)) {
  echo 'kosong!';
} else {
  echo 'ora.';
}

$suhu = 35;
echo '<br><br>Suhu Badan: ' . $suhu . ' C';
if ($suhu > 37) {
  echo "<br>Ente Sakit??";
} elseif ($suhu >= 35) {
  echo '<br>HIPORTEMIA YA...!?';
} else {
  echo '<br>Alhamdulillah sehat...';
}

echo '<br><br>';
// operator logika
// AND, &&, OR, ||, !

$username = 'admin';
$password = 'admin';

if ($username == 'admin' && $password == 'admin') {
  echo 'Login Berhasil';
} else {
  echo 'Login Gagal';
}

?>