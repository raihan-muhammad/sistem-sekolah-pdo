<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$fk_siswa = $_POST['fk_siswa'];
$tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
$fk_pembimbing = $_POST['fk_pembimbing'];

$query = $conn->prepare("INSERT INTO tb_penempatan(fk_siswa, tanggal_pelaksanaan, fk_pembimbing, created, modified) VALUES('$fk_siswa', '$tanggal_pelaksanaan', '$fk_pembimbing', NOW(), NOW())");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
}
?>