<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- My Style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/my_style.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/galery.css">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="<?php echo base_url('assets/'); ?>css/font.css" rel="stylesheet">
	<!-- highchart -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<!-- <script src="<?php echo base_url('assets/highcart/'); ?>highcharts.js"></script>
	<script src="<?php echo base_url('assets/highcart/'); ?>exporting.js"></script>
	<script src="<?php echo base_url('assets/highcart/'); ?>export-data.js"></script>
	<script src="<?php echo base_url('assets/highcart/'); ?>accessibility.js"></script> -->

</head>

<body onload="window.print();">
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="invoice p-3 mb-3">
						<div class="row">
							<div class="col-12">
								<h4>
									
									<?php echo $rapat['jenis_rapat']; ?>
									<small class="float-right">Tanggal : <?php echo format_indo($rapat['tgl_rapat']); ?></small>
								</h4>
							</div>
						</div>
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<strong>No Rapat : <?php echo $rapat['kode_rapat']; ?></strong>
								<address>
									<?php echo $rapat['nama_rapat']; ?><br>
									Pengisi : <?php echo $rapat['pengisi_rapat']; ?><br>
								</address>
							</div>

							<div class="col-sm-4 invoice-col">
								<strong>Waktu Acara</strong>
								<address>
									Mulai : <?php echo $rapat['jam_mulai']; ?> WIB<br>
									Selesai : <?php echo $rapat['jam_selesai']; ?> WIB<br>
								</address>
							</div>
							<div class="col-sm-4 invoice-col">
								<!-- <b>Satus Acara</b><br>
								<?php if ($rapat['status_rapat'] == 1) : ?>
									Belum Terlaksana<br>
								<?php else : ?>
									Selesai
								<?php endif; ?> -->
							</div>
						</div>
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped" id="table-id">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Peserta</th>
											<th>No HP</th>
											<th>Divisi</th>
											<th>Jabatan</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($list_peserta as $lu) : ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $lu['nama_peserta']; ?></td>
												<td><?php echo $lu['no_hp']; ?></td>
												<td><?php echo $lu['divisi']; ?></td>
												<td><?php echo $lu['jabatan']; ?></td>
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

	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="<?php echo base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.world.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->

	<!-- Tempusdominus Bootstrap 4 -->
	<!-- <script src="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
	<!-- Summernote -->
	<script src="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


	<!-- SweetAlert2 -->
	<script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
	<script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<!-- <script src="<?php echo base_url('assets/'); ?>dist/js/pages/dashboard.js"></script> -->
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="<?= base_url('assets/'); ?>datatables/dataTables.buttons.min.js"></script>
	<script src="<?= base_url('assets/'); ?>datatables/buttons.flash.min.js"></script>
	<script src="<?= base_url('assets/'); ?>datatables/jszip.min.js"></script>
	<!-- <script src="<?= base_url('assets/'); ?>datatables/pdfmake.min.js"></script> -->
	<script src="<?= base_url('assets/'); ?>datatables/vfs_fonts.js"></script>
	<script src="<?= base_url('assets/'); ?>datatables/buttons.html5.min.js"></script>
	<script src="<?= base_url('assets/'); ?>datatables/buttons.print.min.js"></script>

</body>

</html>
