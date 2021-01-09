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
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Pengembalian</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="pengembalian">Pengembalian</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><a href="tambah-pengembalian" class="btn btn-primary"><i class="fas fa-plus"></i></a></h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Siswa</th>
												<th>Perusahaan</th>
												<th>Lama Prakerin</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$query = $conn->prepare("SELECT pn.*, si.*, pr.* FROM tb_pengembalian pn INNER JOIN tb_siswa si ON pn.fk_siswa = si.id_siswa INNER JOIN tb_perusahaan pr ON pn.fk_perusahaan = pr.id_perusahaan");
											$query->execute();
											while($row = $query->fetch(PDO::FETCH_ASSOC)) {
												?>
												<tr>
													<td><?php echo $no++;?></td>
													<td><?php echo $row['nama_siswa'];?></td>
													<td><?php echo $row['nama_perusahaan'];?></td>
													<td><?php echo $row['lama_prakerin'];?></td>
													<td style="white-space: nowrap;">
														<a href="detail-pengembalian?id=<?php echo $row['id_pengembalian'];?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
														<a href="#" class="btn btn-danger" id="delete-data" data-id="<?php echo $row['id_pengembalian'];?>"><i class="fas fa-trash-alt"></i></a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
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
		$(document).on('click','#delete-data', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			var result = confirm('Apakah Anda yakin ingin menghapus data ini?');
			if(result) {
				$.ajax({
					type: "POST",
					url: "proses/delete-pengembalian.php",
					data: {'id':id},
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
								title: '&nbsp;Gagal menghapus data'
							});
						}
					}
				});
			}
		});
	</script>
</body>
</html>