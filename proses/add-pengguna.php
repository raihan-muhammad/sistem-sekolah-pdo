<?php
include '../koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$nama  = $_POST['nama'];
$level = $_POST['level'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$gambar = $_FILES['gambar']['name'];
$jenisGambar = $_FILES['gambar']['type'];

if ($jenisGambar == "image/png" || $jenisGambar == "image/jpg" || $jenisGambar == "image/jpeg" || $jenisGambar == "image/gif"){
	$query = $conn->prepare("INSERT INTO tb_pengguna(nama, level, email, username, password, gambar, created, modified) VALUES('$nama', '$level', '$email', '$username', '$password', '$gambar', NOW(), NOW())");
	$query->execute();
	if($query) {
		move_uploaded_file($_FILES['gambar']['tmp_name'],"../assets/images/akun/".$_FILES['gambar']['name']);
		echo json_encode(['message'=>'successfully saved data', 'status'=>'1']);
	}else {
		echo json_encode(['message'=>'failed to save data', 'status'=>'0']);
	}
}else {
	echo json_encode(['message'=>'invalid type image', 'status'=>'2']);
}
?>