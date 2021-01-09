<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$nip = $_POST['nip'];
$nama_guruwali = $_POST['nama_guruwali'];
$alamat = $_POST['alamat'];
$perwalian = $_POST['perwalian'];
$telepon = $_POST['telepon'];

$query = "INSERT INTO tb_guruwali(nip, nama_guruwali, alamat, perwalian, telepon, created, modified) VALUES('$nip', '$nama_guruwali', '$alamat', '$perwalian', '$telepon', NOW(), NOW())";
$query = $conn->exec($query);
if($query) {
	echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
}
?>