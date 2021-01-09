<?php
// session_start();
// $host = 'localhost';
// $username = 'root';
// $password = '';
// $database = 'db_tasalsa';

// $conn = mysqli_connect($host, $username, $password, $database);

try {
  session_start();
  // buat koneksi dengan database
  $conn = new PDO('mysql:host=localhost;dbname=db_tasalsa', "root", "");
  
  // set error mode
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

} catch (PDOException $e) {
  // tampilkan pesan kesalahan jika koneksi gagal
  print "Koneksi atau query bermasalah: " . $e->getMessage() . "<br/>";
  die();
}
?>