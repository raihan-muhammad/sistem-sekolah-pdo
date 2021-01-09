<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'menu/head.php';?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<?php include 'menu/nav.php';?>
		</nav>
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<?php include 'menu/aside.php';?>
		</aside>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Tambah Pengguna</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="tambah-pengguna">Tambah Pengguna</a></li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card card-primary">
								<form role="form" action="#" method="POST" enctype="multipart/form-data" id="data-form">
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="nama">Nama</label>
													<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="level">Level</label>
													<select class="form-control select2bs4" name="level" id="level" required="">
														<option value="">Pilih Level</option>
														<option value="Admin">Admin</option>
														<option value="User">User</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="email">Email</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="username">Nama Pengguna</label>
													<input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" required="" autocomplete="off" minlength="2" maxlength="20">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="password">Kata Sandi</label>
													<input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" required="" autocomplete="off" minlength="2" maxlength="20">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="gambar">Gambar</label>
													<div class="custom-file">
														<input id="gambar" type="file" class="custom-file-input" name="gambar" required="" accept="image/*">
														<label class="custom-file-label" for="gambar">Choose file</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<a href="pengguna" class="btn btn-danger">Kembali</a>
												<button type="submit" class="btn btn-primary float-right">Simpan</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<footer class="main-footer">
			<?php include 'menu/footer.php';?>
		</footer>
		<aside class="control-sidebar control-sidebar-dark"></aside>
	</div>
	<?php include 'menu/script.php'; ?>
	<script type="text/javascript">
		$(document).ready(function () {
			bsCustomFileInput.init();
		});
	</script>
	<script type="text/javascript">
		$(function () {
			$('.textarea').summernote()
		})
	</script>
	<script type="text/javascript">
		$(function () {
			$('.select2').select2()
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})

		})
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#data-form").submit(function(e) {
				e.preventDefault();
				var data = new FormData(this);
				$.ajax({
					type: "POST",
					url: "proses/add-pengguna.php",
					data: data,
					processData: false,
					contentType: false,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							window.location.href='pengguna'
						}else if(dataresponse.status == "2") {
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
							});
							Toast.fire({
								icon: 'error',
								title: '&nbsp;Gambar tidak diperbolehkan'
							});
						}else {
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
							});
							Toast.fire({
								icon: 'error',
								title: '&nbsp;Gagal menambah data'
							});
						}
					}
				});
				return false;
			});
		});
	</script>
</body>
</html>