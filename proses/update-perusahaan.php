<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$nama_perusahaan = $_POST['nama_perusahaan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

$query = $conn->prepare("UPDATE tb_perusahaan SET nama_perusahaan = '$nama_perusahaan', alamat = '$alamat', telepon = '$telepon', modified = NOW() WHERE id_perusahaan = '$id'");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
}
?>