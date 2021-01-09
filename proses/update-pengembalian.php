<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$fk_siswa = $_POST['fk_siswa'];
$lama_prakerin = $_POST['lama_prakerin'];
$fk_perusahaan = $_POST['fk_perusahaan'];
$alasan_pengembalian = $_POST['alasan_pengembalian'];
$evaluasi = $_POST['evaluasi'];

$query = $conn->prepare("UPDATE tb_pengembalian SET fk_siswa = '$fk_siswa', lama_prakerin = '$lama_prakerin', fk_perusahaan = '$fk_perusahaan', alasan_pengembalian = '$alasan_pengembalian', evaluasi = '$evaluasi', modified = NOW() WHERE id_pengembalian = '$id'");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
}
?>