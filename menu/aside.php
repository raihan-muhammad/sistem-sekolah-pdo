<a href="" class="brand-link">
	<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
	style="opacity: .8">
	<span class="brand-text font-weight-light">Salsa</span>
</a>
<div class="sidebar">
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
			<img src="assets/images/akun/<?php echo $row['gambar'];?>" class="img-circle elevation-2" alt="User Image">
		</div>
		<div class="info">
			<a href="" class="d-block"><?php echo $_SESSION['username'];?></a>
		</div>
	</div>
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item has-treeview menu-open">
				<a href="#" class="nav-link active">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>
						Halaman Utama
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="beranda" class="nav-link active">
							<i class="far fa-circle nav-icon"></i>
							<p>Beranda</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-header">DATA</li>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-edit"></i>
					<p>
						Master
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="guru-wali" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Guru Wali</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pembimbing" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Pembimbing</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pengguna" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Pengguna</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="perusahaan" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Perusahaan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="siswa" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Siswa</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-chart-pie"></i>
					<p>
						Transaksi
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="penempatan" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Penempatan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pengembalian" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Pengembalian</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-print"></i>
					<p>
						Laporan
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="laporan-guru-wali" class="nav-link" target="_blank">
							<i class="far fa-circle nav-icon"></i>
							<p>Guru Wali</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="laporan-pembimbing" class="nav-link" target="_blank">
							<i class="far fa-circle nav-icon"></i>
							<p>Pembimbing</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="cetak-penempatan" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Penempatan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="cetak-pengembalian" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Pengembalian</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="laporan-perusahaan" class="nav-link" target="_blank">
							<i class="far fa-circle nav-icon"></i>
							<p>Perusahaan</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="laporan-siswa" class="nav-link" target="_blank">
							<i class="far fa-circle nav-icon"></i>
							<p>Siswa</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="proses/logout.php" class="nav-link">
					<i class="nav-icon far fa-circle text-danger"></i>
					<p class="text">Keluar</p>
				</a>
			</li>
		</ul>
	</nav>
</div>