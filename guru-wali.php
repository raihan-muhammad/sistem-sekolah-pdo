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
							<h1 class="m-0 text-dark">Guru Wali</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item">Beranda</li>
								<li class="breadcrumb-item active"><a href="guru-wali">Guru Wali</a></li>
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
								<h3 class="card-title"><a href="tambah-guru-wali" class="btn btn-primary"><i class="fas fa-plus"></i></a></h3>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>NIP</th>
												<th>Nama</th>
												<th>Perwalian</th>
												<th>Telepon</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$query = $conn->prepare("SELECT * FROM tb_guruwali");
											$query->execute();
											while($row = $query->fetch(PDO::FETCH_ASSOC)) {
												?>
												<tr>
													<td><?php echo $no++;?></td>
													<td><?php echo $row['nip'];?></td>
													<td><?php echo $row['nama_guruwali'];?></td>
													<td><?php echo $row['perwalian'];?></td>
													<td><?php echo $row['telepon'];?></td>
													<td style="white-space: nowrap;">
														<a href="detail-guru-wali?id=<?php echo $row['id_guruwali'];?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
														<a href="#" class="btn btn-danger" id="delete-data" data-id="<?php echo $row['id_guruwali'];?>"><i class="fas fa-trash-alt"></i></a>
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
					url: "proses/delete-guru-wali.php",
					data: {'id':id},
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