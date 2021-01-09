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
							<h1>Laporan Penempatan</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="cetak-penempatan">Laporan Penempatan</a></li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title">
									<i class="fas fa-print"></i>
									Laporan Penempatan
								</h3>
							</div>
							<div class="card-body">
								<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Perbulan</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Pertanggal</a>
									</li>
								</ul>
								<div class="tab-content" id="custom-content-below-tabContent">
									<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
										<br>
										<form action="laporan-penempatan" method="POST" target="_blank">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<select class="form-control select2bs4" name="bulan" id="bulan" required="" style="width: 100%;">
															<option value="">Pilih Bulan</option>
															<option value="01">Januari</option>
															<option value="02">Februari</option>
															<option value="03">Maret</option>
															<option value="04">April</option>
															<option value="05">Mei</option>
															<option value="06">Juni</option>
															<option value="07">Juli</option>
															<option value="08">Agustus</option>
															<option value="09">September</option>
															<option value="10">Oktober</option>
															<option value="11">November</option>
															<option value="12">Desember</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<select class="form-control select2bs4" name="tahun" id="tahun" required="" style="width: 100%;">
															<option value="">Pilih Tahun</option>
															<?php
															$mulai = date('Y') - 50;
															for($i = $mulai; $i < $mulai + 100; $i++){ ?>
																<option value="<?php echo $i;?>"><?php echo $i;?></option>
															<?php } ?>
														</select>
														<input type="hidden" name="level" id="level" value="0">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button type="submit" class="btn btn-primary btn-block">Cetak</button>
												</div>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
										<br>
										<form action="laporan-penempatan" method="POST" target="_blank">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="from">Dari Tanggal</label>
														<input type="date" name="from" id="from" required="" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="to">Sampai Tanggal</label>
														<input type="date" name="to" id="to" required="" class="form-control">
														<input type="hidden" name="level" id="level" value="1">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<button type="submit" class="btn btn-primary btn-block">Cetak</button>
												</div>
											</div>
										</form>
									</div>
								</div>
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
	<?php include 'menu/script.php';?>
	<script>
		$(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>
	<script type="text/javascript">
		$(function () {
			$('.select2').select2()
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})

		})
	</script>
</body>
</html>