<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Salsa</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="assets/plugins/jquery/jquery.min.js"></script>
<?php 
if(isset($_SESSION['id_pengguna'])) {
	$id_pengguna = $_SESSION['id_pengguna'];
	$query = $conn->prepare("SELECT * FROM tb_pengguna WHERE id_pengguna=:id_pengguna");
	$query->execute(array(':id_pengguna' => $id_pengguna));
	$row = $query->fetch(PDO::FETCH_ASSOC);
}else {
	header("Location: http://localhost/salsa/");
}
?>