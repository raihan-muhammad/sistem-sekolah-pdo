<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$nama  = $_POST['nama'];
$level = $_POST['level'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$gambar = $_FILES['gambar']['name'];
$jenisGambar = $_FILES['gambar']['type'];

if ($jenisGambar == "image/png" || $jenisGambar == "image/jpg" || $jenisGambar == "image/jpeg" || $jenisGambar == "image/gif"){
	$query = $conn->$prepare("UPDATE tb_pengguna SET nama = '$nama', level = '$level', email = '$email', username = '$username', password = '$password', gambar = '$gambar', modified = NOW() WHERE id_pengguna = '$id'");
	$query->execute();
	if($query) {
		move_uploaded_file($_FILES['gambar']['tmp_name'],"../assets/images/akun/".$_FILES['gambar']['name']);
		echo json_encode(['message'=>'successfully changed data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>'failed to change data', 'status'=>'0']);
	}
}else {
	echo json_encode(['message'=>'invalid type image', 'status'=>'2']);
}

?>