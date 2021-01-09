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
							<h1>Tambah Pengembalian</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="tambah-pengembalian">Tambah Pengembalian</a></li>
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
													<label for="lama_prakerin">Lama Prakerin</label>
													<input type="text" class="form-control" name="lama_prakerin" id="lama_prakerin" placeholder="Lama Prakerin" required="" autocomplete="off">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="fk_perusahaan">Perusahaan</label>
													<select class="form-control select2bs4" name="fk_perusahaan" id="fk_perusahaan" required="">
														<option value="">Pilih Perusahaan</option>
														<?php
														$kueri = $conn->prepare("SELECT * FROM tb_perusahaan ORDER BY nama_perusahaan ASC");
														$kueri->execute();
														while($tampil = $kueri->fetch(PDO::FETCH_ASSOC)) {
															?>
															<option value="<?php echo $tampil['id_perusahaan'];?>"><?php echo $tampil['nama_perusahaan'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="alasan_pengembalian">Alasan Pengembalian</label>
													<textarea class="form-control" name="alasan_pengembalian" id="alasan_pengembalian" required="" placeholder="Tuliskan Alasan Pengembalian" rows="4"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="evaluasi">Evaluasi</label>
													<textarea class="form-control" name="evaluasi" id="evaluasi" required="" placeholder="Tuliskan Evaluasi" rows="4"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<a href="pengembalian" class="btn btn-danger">Kembali</a>
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
					url: "proses/add-pengembalian.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							window.location.href='pengembalian'
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