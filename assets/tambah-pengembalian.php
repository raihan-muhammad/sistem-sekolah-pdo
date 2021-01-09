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
							<h1>Tambah Guru Wali</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="tambah-guru-wali">Tambah Guru Wali</a></li>
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
											<div class="col-md-6">
												<div class="form-group">
													<label for="nip">NIP</label>
													<input type="number" class="form-control" name="nip" id="nip" placeholder="NIP" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="nama_guruwali">Nama</label>
													<input type="text" class="form-control" name="nama_guruwali" id="nama_guruwali" placeholder="Nama" required="" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="perwalian">Perwalian</label>
													<select class="form-control select2bs4" name="perwalian" id="perwalian" required="">
														<option value="">Pilih Perwalian</option>
														<option value="Tik">Tik</option>
														<option value="Teknik Mesin">Teknik Mesin</option>
														<option value="Elektro">Elektro</option>
														<option value="Otomotif">Otomotif</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="telepon">Telepon</label>
													<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon" required="" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="alamat">Alamat</label>
													<textarea class="form-control" name="alamat" id="alamat" required="" placeholder="Tuliskan Alamat" rows="4"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<a href="guru-wali" class="btn btn-danger">Kembali</a>
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
				var data = $(this).serialize();
				$.ajax({
					type: "POST",
					url: "proses/add-guru-wali.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							window.location.href='guru-wali'
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