<?php
include '../koneksi.php';
$id = $_POST['id'];
$query = "DELETE FROM tb_guruwali WHERE id_guruwali = '$id'";
$hasil = $conn->exec($query); 
if($hasil) {
	echo json_encode(['message'=>'successfully deleted data', 'status'=>'1']);
}else {
	echo json_encode(['message'=>'failed to delete data', 'status'=>'0']);
}