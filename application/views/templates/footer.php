<footer class="main-footer">
	Created by : <b><a href="http://adoniasite.my.id" target="_blank">Kelompok PKL</a> @ <?php echo date('Y'); ?></b>
	<div class="float-right d-none d-sm-inline-block">


	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<script>
	$(function() {
		// Summernote
		$('.textarea').summernote({
			height: 250,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
				['fontname', ['fontname']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph', 'height']],
				['table', ['table']],
				['insert', ['link']],
				['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
			]
		})
	})
</script>
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

<script>
	$(function() {
		$("#table-id").DataTable();
		$("#table-table").DataTable({
			dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});
		$("#dataTable-id").DataTable();
		$("#datatable-id").DataTable();
		$('#id-table').DataTable();
	});
</script>
<script>
	$('.tombol-hapus').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			title: 'Konfirmasi Hapus Data',
			text: 'Data akan dihapus permanen',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});
</script>

<script>
	$('.tombol-batal').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			title: 'Konfirmasi Pembatalan',
			text: 'Peserta akan dibatalkan mengikuti rapat',
			type: 'danger',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'OK'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});
</script>

<script>
	$('#tombol-logout').on('click', function(e) {
		e.preventDefault();
		const href = $(this).attr('href');
		Swal.fire({
			title: 'Konfirmasi Logout',
			text: 'Klik keluar untuk mengakhiri session',
			type: 'danger',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Keluar'
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});
</script>




</body>

</html>