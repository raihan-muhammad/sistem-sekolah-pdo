<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$fk_siswa = $_POST['fk_siswa'];
$lama_prakerin = $_POST['lama_prakerin'];
$fk_perusahaan = $_POST['fk_perusahaan'];
$alasan_pengembalian = $_POST['alasan_pengembalian'];
$evaluasi = $_POST['evaluasi'];

$query = $conn->prepare("INSERT INTO tb_pengembalian(fk_siswa, lama_prakerin, fk_perusahaan, alasan_pengembalian, evaluasi, created, modified) VALUES('$fk_siswa', '$lama_prakerin', '$fk_perusahaan', '$alasan_pengembalian', '$evaluasi', NOW(), NOW())");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
}
?>