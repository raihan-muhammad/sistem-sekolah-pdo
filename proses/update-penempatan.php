<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$fk_siswa = $_POST['fk_siswa'];
$tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
$fk_pembimbing = $_POST['fk_pembimbing'];

$query = $conn->prepare("UPDATE tb_penempatan SET fk_siswa = '$fk_siswa', tanggal_pelaksanaan = '$tanggal_pelaksanaan', fk_pembimbing = '$fk_pembimbing', modified = NOW() WHERE id_penempatan =:id");
$query->execute(array("id" => $id));
if($query) {
	echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
}
?>