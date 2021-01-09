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
							<h1>Tambah Penempatan</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="tambah-penempatan">Tambah Penempatan</a></li>
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
													<label for="fk_siswa">Siswa</label>
													<select class="form-control select2bs4" name="fk_siswa" id="fk_siswa" required="">
														<option value="">Pilih Siswa</option>
														<?php
														$kueri = $conn->prepare("SELECT * FROM tb_siswa ORDER BY nama_siswa ASC");
														$kueri->execute();
														while($tampil = $kueri->fetch(PDO::FETCH_ASSOC)) {
															?>
															<option value="<?php echo $tampil['id_siswa'];?>"><?php echo $tampil['nama_siswa'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
													<input type="date" class="form-control" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" placeholder="Tanggal Pelaksanaan" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="fk_pembimbing">Pembimbing</label>
													<select class="form-control select2bs4" name="fk_pembimbing" id="fk_pembimbing" required="">
														<option value="">Pilih Pembimbing</option>
														<?php
														$kueri = $conn->prepare("SELECT * FROM tb_pembimbing ORDER BY nama_pembimbing ASC");
														$kueri->execute();
														while($tampil = $kueri->fetch(PDO::FETCH_ASSOC)) {
															?>
															<option value="<?php echo $tampil['id_pembimbing'];?>"><?php echo $tampil['nama_pembimbing'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<a href="penempatan" class="btn btn-danger">Kembali</a>
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
					url: "proses/add-penempatan.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							window.location.href='penempatan'
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