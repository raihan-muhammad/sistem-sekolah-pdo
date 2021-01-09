<?php
include 'koneksi.php';
$id = $_GET['id'];
$query2 = $conn->prepare("SELECT pm.*, pr.*  FROM tb_pembimbing pm INNER JOIN tb_perusahaan pr ON pm.fk_perusahaan = pr.id_perusahaan WHERE pm.id_pembimbing = '$id'");
$query2->execute();
$row2 = $query2->fetch(PDO::FETCH_ASSOC);
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
							<h1>Detail Pembimbing</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="detail-pembimbing?id=<?php echo $id;?>">Detail Pembimbing</a></li>
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
													<input type="number" class="form-control" name="nip" id="nip" placeholder="NIP" required="" autocomplete="off" value="<?php echo $row2['nip'];?>">
													<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
													<input type="hidden" name="nipLama" id="nipLama" value="<?php echo $row2['nip'];?>">
													<input type="hidden" name="perusahaanLama" id="perusahaanLama" value="<?php echo $row2['fk_perusahaan'];?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="nama_pembimbing">Nama</label>
													<input type="text" class="form-control" name="nama_pembimbing" id="nama_pembimbing" placeholder="Nama" required="" autocomplete="off" value="<?php echo $row2['nama_pembimbing'];?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="fk_perusahaan">Perusahaan</label>
													<select class="form-control select2bs4" name="fk_perusahaan" id="fk_perusahaan" required="">
														<option value="<?php echo $row2['fk_perusahaan'];?>"><?php echo $row2['nama_perusahaan'];?></option>
														<?php
														$perusahaanid = $row2['fk_perusahaan'];
														$kueri = $conn->prepare("SELECT * FROM tb_perusahaan WHERE id_perusahaan != '$perusahaanid' ORDER BY nama_perusahaan ASC");
														while($tampil = $kueri->fetch(PDO::FETCH_ASSOC)) {
															?>
															<option value="<?php echo $tampil['id_perusahaan'];?>"><?php echo $tampil['nama_perusahaan'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="telepon">Telepon</label>
													<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Telepon" required="" autocomplete="off" value="<?php echo $row2['telepon'];?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="alamat">Alamat</label>
													<textarea class="form-control" name="alamat" id="alamat" required="" placeholder="Tuliskan Alamat" rows="4"><?php echo $row2['alamat'];?></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<a href="pembimbing" class="btn btn-danger">Kembali</a>
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
					url: "proses/update-pembimbing.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							window.location.href='pembimbing'
						}else if(dataresponse.status == "2") {
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
							});
							Toast.fire({
								icon: 'error',
								title: '&nbsp;Perusahaan sudah dipakai oleh pembimbing'
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
								title: '&nbsp;Gagal mengubah data'
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