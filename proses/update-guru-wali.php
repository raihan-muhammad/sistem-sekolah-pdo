<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$nip = $_POST['nip'];
$nama_guruwali = $_POST['nama_guruwali'];
$alamat = $_POST['alamat'];
$perwalian = $_POST['perwalian'];
$telepon = $_POST['telepon'];

$query = $conn->prepare("UPDATE tb_guruwali SET nip = '$nip', nama_guruwali = '$nama_guruwali', alamat = '$alamat', perwalian = '$perwalian', telepon = '$telepon', modified = NOW() WHERE id_guruwali = '$id'");
$query->execute();
if($query) {
	echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
}
?>