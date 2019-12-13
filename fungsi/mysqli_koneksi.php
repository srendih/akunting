<?php
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$db = "accounting";
$pass = ""; // Password (Isi jika menggunakan password)
$connect = mysqli_connect($host, $user, $pass, $db); // Koneksi ke MySQL

if ($connect->connect_error) {
   // jika terjadi error, matikan proses dengan die() atau exit();
   die('Maaf koneksi gagal: '. $connect->connect_error);
}
?>