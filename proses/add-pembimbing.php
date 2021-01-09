<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$nama_pembimbing = $_POST['nama_pembimbing'];
$nip = $_POST['nip'];
$fk_perusahaan = $_POST['fk_perusahaan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

$query = $conn->prepare("SELECT * FROM tb_pembimbing WHERE nip = '$nip' AND fk_perusahaan = '$fk_perusahaan'");
$query->execute();
$cek = $query->fetchColumn();

if($cek > 0) {
	echo json_encode(['message'=>'duplicate data', 'status'=>'2']);
}else {
	$query = $conn->prepare("INSERT INTO tb_pembimbing(nama_pembimbing, nip, fk_perusahaan, alamat, telepon, created, modified) VALUES('$nama_pembimbing', '$nip', '$fk_perusahaan', '$alamat', '$telepon', NOW(), NOW())");
	$hasil = $query->execute();
	if($hasil) {
		echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
	}
}
?>