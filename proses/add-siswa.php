<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa']; 
$fk_guruwali = $_POST['fk_guruwali'];
$fk_perusahaan = $_POST['fk_perusahaan'];
$kelas = $_POST['kelas'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];

$query = $conn->prepare("SELECT * FROM tb_siswa WHERE nis = '$nis'");
$query->execute();

$cek = $query->fetchColumn();

if($cek > 0) {
	echo json_encode(['message'=>'duplicate data', 'status'=>'2']);
}else {
	$query = $conn->prepare("INSERT INTO tb_siswa(nis, nama_siswa, fk_guruwali, fk_perusahaan, kelas, jenis_kelamin, jurusan, alamat, created, modified) VALUES('$nis', '$nama_siswa', '$fk_guruwali', '$fk_perusahaan', '$kelas', '$jenis_kelamin', '$jurusan', '$alamat', NOW(), NOW())");
	$query->execute();
	if($query) {
		echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
	}
}
?>