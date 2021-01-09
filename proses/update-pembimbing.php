<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$nipLama = $_POST['nipLama'];
$perusahaanLama = $_POST['perusahaanLama'];
$nama_pembimbing = $_POST['nama_pembimbing'];
$nip = $_POST['nip'];
$fk_perusahaan = $_POST['fk_perusahaan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

if($nip == $nipLama && $fk_perusahaan == $perusahaanLama) {
	$query = $conn->prepare("UPDATE tb_pembimbing SET nip = '$nip', nama_pembimbing = '$nama_pembimbing', alamat = '$alamat', fk_perusahaan = '$fk_perusahaan', telepon = '$telepon', modified = NOW() WHERE id_pembimbing = '$id'");
	$query->execute();
	if($query) {
		echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
	}
}else {
	$query = $conn->prepare("SELECT * FROM tb_pembimbing WHERE nip = '$nip' AND fk_perusahaan = '$fk_perusahaan'");
	$query->execute();
	$cek = $query->fetchColumn();
	if($cek > 0) {
		echo json_encode(['message'=>'duplicate data', 'status'=>'2']);
	}else {
		$query = $conn->prepare("UPDATE tb_pembimbing SET nip = '$nip', nama_pembimbing = '$nama_pembimbing', alamat = '$alamat', fk_perusahaan = '$fk_perusahaan', telepon = '$telepon', modified = NOW() WHERE id_pembimbing = '$id'");
		$query->execute();
		if($query) {
			echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
		}else {
			echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
		}
	}
}
?>