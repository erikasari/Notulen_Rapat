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
</head>

<body onload="window.print();">
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<table width="100%">
					<tr>
						<td align="left"><img src="<?php echo base_url('assets/dist/img/'); ?>logo_pemkot_kediri.png" style="width : 200px ; height : 200px;"></td>
						<td align="center"><b>
								<font face="Times New Roman" size="6">
									PEMERINTAH KOTA KEDIRI <br> DINAS KOMUNIKASI DAN INFORMATIKA</font>
							</b><br>
							<font face="Arial" size="4">Jl. Jend. Basuki Rakhmad No. 15 Kediri 64123 Jawa Timur<br>Telp. ( 0354 ) 682955 Fax. ( 0354 ) 686813</font>
						</td>
					</tr>
				</table>
				<hr class=mb-0 color="black">
				<hr class=mt-1 color="black">

				<p align="center"><b>
						<font face="Times New Roman" size="5"> NOTULEN RAPAT </font>
					</b></p>

				<p><?php echo $rapat['hasil_rapat']; ?></p>
				<p style="height:15px;"></p>
				<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6 text-center">
						<?php echo format_indo(date('Y/m/d')); ?><br>
						Pembuat Notulen,<br>
						<p style="height:45px;"></p>
						<?php echo $rapat['pembuat_notulen']; ?> / <?php echo $rapat['jabatan_notulen']; ?><br>
						Divisi : <?php echo $rapat['divisi_notulen']; ?><br>
						<?php echo $rapat['nik_notulen']; ?><br>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
			<div class="card-footer">
				<span style="font-size:12px;">Created by <?php echo $rapat['pembuat_notulen']; ?> / <?php echo $rapat['nik_notulen']; ?></span>
			</div>
			<!-- /.card-footer-->
		</div>
		<!-- /.card -->
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