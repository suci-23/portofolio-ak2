<!-- function -->

<?php

function callName()
{
  echo "Nama SAya SUCAY <br>";
}

function callNameLagi()
{
  return "Nama Saya Sucay";
}

callName();
echo callNameLagi(); //kalau functionnya return


function perkalian()
{
  $n1 = 10;
  $n2 = 5;
  $hasil = $n1 * $n2;
  return $hasil;
}

echo "<br> Hasil Perkalian: " . perkalian(); //kalau functionnya return


?>