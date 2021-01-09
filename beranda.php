<?php include 'koneksi.php';?>
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
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Halaman Utama</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Halaman Utama</li>
								<li class="breadcrumb-item active"><a href="beranda">Beranda</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-6">
							<div class="small-box bg-info">
								<div class="inner">
									<?php
										// $kueri = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM tb_siswa");
										// $tampil = mysqli_fetch_array($kueri);
										$kueri = $conn->prepare("SELECT * FROM tb_siswa");
										$kueri->execute();
										$hasil = $kueri->fetchColumn();
									?>
									<h3><?php echo $hasil;?></h3>
									<p>Siswa</p>
								</div>
								<div class="icon">
									<i class="fas fa-users"></i>
								</div>
								<a href="siswa" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-success">
								<div class="inner">
									<?php
									$kueri = $conn->prepare("SELECT * FROM tb_guruwali");
									$kueri->execute();
									$tampil = $kueri->fetchColumn();
									?>
									<h3><?php echo $tampil;?></h3>
									<p>Guru Wali</p>
								</div>
								<div class="icon">
									<i class="fas fa-user-friends"></i>
								</div>
								<a href="guru-wali" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-warning">
								<div class="inner">
									<?php
									$kueri = $conn->prepare("SELECT * FROM tb_pembimbing");
									$kueri->execute();
									$tampil = $kueri->fetchColumn();
									?>
									<h3><?php echo $tampil;?></h3>
									<p>Pembimbing</p>
								</div>
								<div class="icon">
									<i class="fas fa-user"></i>
								</div>
								<a href="pembimbing" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<?php
										$kueri = $conn->prepare("SELECT * FROM tb_perusahaan");
									$kueri->execute();
									$tampil = $kueri->fetchColumn();
									?>
									<h3><?php echo $tampil;?></h3>
									<p>Perusahaan</p>
								</div>
								<div class="icon">
									<i class="fas fa-building"></i>
								</div>
								<a href="perusahaan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
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
</body>
</html>
