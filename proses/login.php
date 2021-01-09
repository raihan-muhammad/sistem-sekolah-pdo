<?php
include ('../koneksi.php');

// $username = mysqli_escape_string($conn,$_POST['username']);
// $password = mysqli_escape_string($conn,$_POST['password']);

// $query = mysqli_query($conn, "SELECT * FROM tb_pengguna WHERE BINARY username = '$username' AND BINARY password = '$password'");
// $cek = mysqli_num_rows($query);
// if($cek > 0) {
// 	$row = mysqli_fetch_array($query);
// 	$_SESSION['id_pengguna'] = $row['id_pengguna'];
// 	$_SESSION['username'] = $row['username'];
// 	$_SESSION['nama'] = $row['nama'];
// 	$_SESSION['level'] = $row['level'];
// 	echo json_encode(['message'=>'login success', 'status'=>'1']);
// }else {
// 	echo json_encode(['message'=>'login error', 'status'=>'0']);
// }

$msg = ""; 
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "SELECT * from `tb_pengguna` where binary `username`=:username and `password`=:password";
      $stmt = $conn->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
				$_SESSION['id_pengguna'] = $row['id_pengguna'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['nama'] = $row['nama'];
				$_SESSION['level'] = $row['level'];
				echo json_encode(['message'=>'login success', 'status'=>'1']);
      } else {
				echo json_encode(['message'=>'login error', 'status'=>'0']);
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } else {
    $msg = "Both fields are required!";
  }
?>