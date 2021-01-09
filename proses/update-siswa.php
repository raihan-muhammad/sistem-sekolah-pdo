<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$nis = $_POST['nis'];
$nama_siswa = $_POST['nama_siswa']; 
$fk_guruwali = $_POST['fk_guruwali'];
$fk_perusahaan = $_POST['fk_perusahaan'];
$kelas = $_POST['kelas'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$nisLama = $_POST['nisLama'];

if($nis == $nisLama) {
	$query = $conn->prepare("UPDATE tb_siswa SET nis = '$nis', nama_siswa = '$nama_siswa', fk_guruwali = '$fk_guruwali', fk_perusahaan = '$fk_perusahaan', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', alamat = '$alamat', modified = NOW() WHERE id_siswa = '$id'");
	$query->execute();
	if($query) {
		echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
	}
}else {
	$query = $conn->prepare("SELECT * FROM tb_siswa WHERE nis = '$nis'");
	$query->execute();
	$cek = $query->fetchColumn();
	if($cek > 0) {
		echo json_encode(['message'=>'duplicate data', 'status'=>'2']);
	}else {
		$query = mysqli_query($conn, "UPDATE tb_siswa SET nis = '$nis', nama_siswa = '$nama_siswa', fk_guruwali = '$fk_guruwali', fk_perusahaan = '$fk_perusahaan', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan', alamat = '$alamat', modified = NOW() WHERE id_siswa = '$id'");
		if($query) {
			echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
		}else {
			echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
		}
	}
}
?>