<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$nama_perusahaan = $_POST['nama_perusahaan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

$query = $conn->prepare("INSERT INTO tb_perusahaan(nama_perusahaan, alamat, telepon, created, modified) VALUES('$nama_perusahaan', '$alamat', '$telepon', NOW(), NOW())");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
}
?>