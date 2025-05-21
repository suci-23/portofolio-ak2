<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_porto_2';

$config = mysqli_connect($hostname, $username, $password, $database);

if (!$config) {
  echo 'koneksi gagal.';
}
