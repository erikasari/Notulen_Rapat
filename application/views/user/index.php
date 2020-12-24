<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0 text-dark"><?php echo $title; ?></h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">

					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
			<?php echo $this->session->flashdata('msg'); ?>
			<?php if (validation_errors()) { ?>
				<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">x</a>
					<strong><?php echo strip_tags(validation_errors()); ?></strong>
				</div>
			<?php } ?>
			<div class="alert alert-secondary" role="alert">
				<div class="row">
					<div class="col-md-8">
						<h5>Selamat Datang, <strong><?php echo $user['nama']; ?></strong></h5>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-secondary btn-sm float-right ml-1" data-toggle="modal" data-target="#ubah-pass">Ubah Password</button>
						<button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#profile">Ubah Profil</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-primary">
								<div class="inner">
									<h3><?php echo $hari_ini; ?></h3>
									<p>Rapat Hari Ini</p>
								</div>
								<div class="icon">
									<i class="fas fa-chalkboard-teacher"></i>
								</div>
								<a class="small-box-footer text-sm"> - </i></a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-green">
								<div class="inner">
									<h3><?php echo $pending; ?></h3>
									<p>Rapat Pending</p>
								</div>
								<div class="icon">
									<i class="fas fa-user-clock"></i>
								</div>
								<a class="small-box-footer text-sm"> - </i></a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-yellow">
								<div class="inner">
									<h3><?php echo $proses; ?></h3>
									<p>Rapat Proses</p>
								</div>
								<div class="icon">
									<i class="fas fa-users-cog"></i>
								</div>
								<a class="small-box-footer text-sm"> - </i></a>
							</div>
						</div>
						<div class="col-lg-3 col-xs-6">
							<div class="small-box bg-red">
								<div class="inner">
									<h3><?php echo $selesai; ?></h3>
									<p>Rapat Selesai</p>
								</div>
								<div class="icon">
									<i class="fas fa-check-double"></i>
								</div>
								<a class="small-box-footer text-sm"> - </i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- CHART -->
			<div class="row">
				<div class="col-md-6">
					<div class="card card-primary card-outline">
						<div class="card-body">
							<div id="cart"></div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card card-primary card-outline">
						<div class="card-body">
							<div class="table-responsive">
								<table class=" table table-bordered table-hover" style="font-size:13px;">
									<thead>
										<th>Jenis Rapat</th>
										<th>Tgl Rapat</th>
										<th>Nama Rapat</th>
										<th>Pengisi</th>
										<th>Mulai</th>
									</thead>
									<tbody>
										<?php foreach ($list_rapat as $lu) : ?>
											<tr>
												<td><?php echo $lu['jenis_rapat']; ?></td>
												<td><?php echo format_indo($lu['tgl_rapat']); ?></td>
												<td><?php echo $lu['nama_rapat']; ?></td>
												<td><?php echo $lu['pengisi_rapat']; ?></td>
												<td><?php echo $lu['jam_mulai']; ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>

	</section>
</div>

<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
			</div>
			<div class="modal-body">
				<?php echo form_open_multipart('user/edit_profile'); ?>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" value="<?php echo $user['email']; ?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nama" value="<?php echo $user['nama']; ?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-2">Photo</div>
					<div class="col-sm-10">
						<div class="row">
							<div class="col-sm-3">
								<img src="<?php echo base_url('assets/dist/img/profile/') . $user['image']; ?>" class="img-thumbnail">
							</div>
							<div class="col-sm-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="image">
									<label class="custom-file-label" for="image">Pilih File</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan Perubahan </button>
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ubah-pass">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Password</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('user/ubah_password'); ?>" method="post">
						<div class="form-group">
							<label for="current_password">Password Lama</label>
							<input type="password" class="form-control" id="current_password" name="current_password" required>
						</div>
						<div class="form-group">
							<label for="new_password1">Password Baru</label>
							<input type="password" class="form-control" id="new_password1" name="new_password1" required>
						</div>
						<div class="form-group">
							<label for="new_password2">Ulang Password Baru</label>
							<input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Ketik ulang password baru" required>
						</div>
						<button type="submit" class="btn btn-primary mr-2">Simpan Perubahan </button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	Highcharts.chart('cart', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Data Rapat'
		},
		subtitle: {
			text: 'Tahun <?php echo date('Y'); ?>'
		},
		xAxis: {
			type: 'category',
			labels: {
				rotation: -45,
				style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total Pertemuan'
			}
		},
		legend: {
			enabled: false
		},
		tooltip: {
			pointFormat: 'Total Rapat tahun <?php echo date('Y'); ?>): <b>{point.y:.1f} Pertemuan</b>'
		},
		series: [{
			name: 'Population',
			data: [
				['Januari', <?php echo $januari; ?>],
				['Februari', <?php echo $februari; ?>],
				['Maret', <?php echo $maret; ?>],
				['April', <?php echo $april; ?>],
				['Mei', <?php echo $mei; ?>],
				['Juni', <?php echo $juni; ?>],
				['Juli', <?php echo $juli; ?>],
				['Agustus', <?php echo $agustus; ?>],
				['Spetember', <?php echo $september; ?>],
				['Oktober', <?php echo $oktober; ?>],
				['November', <?php echo $november; ?>],
				['Desember', <?php echo $desember; ?>]
			],
			dataLabels: {
				enabled: true,
				rotation: -90,
				color: '#FFFFFF',
				align: 'right',
				format: '{point.y:.1f}', // one decimal
				y: 10, // 10 pixels down from the top
				style: {
					fontSize: '13px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		}]
	});
</script>
