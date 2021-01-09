<?php
include 'koneksi.php';
$id = $_GET['id'];
$query2 = $conn->prepare("SELECT si.*, gw.*, pr.* FROM tb_siswa si INNER JOIN tb_guruwali gw ON si.fk_guruwali = gw.id_guruwali INNER JOIN tb_perusahaan pr ON si.fk_perusahaan = pr.id_perusahaan WHERE si.id_siswa = '$id'");
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
							<h1>Detail Siswa</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="detail-siswa?id=<?php echo $id;?>">Detail Siswa</a></li>
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
													<label for="nis">NIS</label>
													<input type="number" class="form-control" name="nis" id="nis" placeholder="NIS" required="" autocomplete="off" value="<?php echo $row2['nis'];?>">
													<input type="hidden" name="id" id="id" value="<?php echo $id;?>">
													<input type="hidden" name="nisLama" id="nisLama" value="<?php echo $row2['nis'];?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="nama_siswa">Nama</label>
													<input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama" required="" autocomplete="off" value="<?php echo $row2['nama_siswa'];?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="fk_guruwali">Guru Wali</label>
													<select class="form-control select2bs4" name="fk_guruwali" id="fk_guruwali" required="">
														<option value="<?php echo $row2['fk_guruwali'];?>"><?php echo $row2['nama_guruwali'];?></option>
														<?php
														$guruwaliid = $row2['fk_guruwali'];
														$kueri = $conn->prepare("SELECT * FROM tb_guruwali WHERE id_guruwali != '$guruwaliid' ORDER BY nama_guruwali ASC");
														$kueri->execute();
														while($tampil = $kueri->fetch(PDO::FETCH_ASSOC)) {
															?>
															<option value="<?php echo $tampil['id_guruwali'];?>"><?php echo $tampil['nama_guruwali'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="fk_perusahaan">Perusahaan</label>
													<select class="form-control select2bs4" name="fk_perusahaan" id="fk_perusahaan" required="">
														<option value="<?php echo $row2['fk_perusahaan'];?>"><?php echo $row2['nama_perusahaan'];?></option>
														<?php
														$perusahaanid = $row2['fk_perusahaan'];
														$kueri = $conn->prepare("SELECT * FROM tb_perusahaan WHERE id_perusahaan != '$perusahaanid' ORDER BY nama_perusahaan ASC");
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
											<div class="col-md-4">
												<div class="form-group">
													<label for="kelas">Kelas</label>
													<input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" required="" autocomplete="off" value="<?php echo $row2['kelas'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="jenis_kelamin">Jenis Kelamin</label>
													<select class="form-control select2bs4" name="jenis_kelamin" id="jenis_kelamin" required="">
														<option value="Laki - Laki" <?php if($row2['jenis_kelamin'] == "Laki - Laki") {echo "selected=''";} ?>>Laki - Laki</option>
														<option value="Perempuan" <?php if($row2['jenis_kelamin'] == "Perempuan") {echo "selected=''";} ?>>Perempuan</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="jurusan">Jurusan</label>
													<input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Jurusan" required="" autocomplete="off" value="<?php echo $row2['jurusan'];?>">
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
												<a href="siswa" class="btn btn-danger">Kembali</a>
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
					url: "proses/update-siswa.php",
					data: data,
					success: function(response) {
						var dataresponse = JSON.parse(response);
						console.log(dataresponse);
						if(dataresponse.status == "1") {
							window.location.href='siswa'
						}else if(dataresponse.status == "2") {
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000
							});
							Toast.fire({
								icon: 'error',
								title: '&nbsp;NIS sudah digunakan'
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