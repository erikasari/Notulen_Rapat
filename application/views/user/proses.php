<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0 text-dark"><?php echo $title; ?></h4>
				</div><!-- /.col -->
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
			<!-- Default box -->
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<?php if (validation_errors()) { ?>
						<div class="alert alert-danger">
							<a class="close" data-dismiss="alert">x</a>
							<strong><?php echo strip_tags(validation_errors()); ?></strong>
						</div>
					<?php } ?>
					<!-- general form elements -->
					<div class="card card-primary card-outline">
						<div class="card-header">

						</div> <!-- /.card-body -->
						<div class="card-body">
							<div class="table-responsive">
								<table class=" table table-bordered table-hover" id="table-id" style="font-size:14px;">
									<thead>
										<th>#</th>
										<th>Jenis Rapat</th>
										<th>Tgl Rapat</th>
										<th>Nama Rapat</th>
										<th>Pengisi</th>
										<th>Mulai</th>
										<th>Selesai</th>
										<th>Notulen</th>
										<th>View</th>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										<?php foreach ($list_rapat as $lu) : ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $lu['jenis_rapat']; ?></td>
												<td><?php echo format_indo($lu['tgl_rapat']); ?></td>
												<td><?php echo $lu['nama_rapat']; ?></td>
												<td><?php echo $lu['pengisi_rapat']; ?></td>
												<td><?php echo $lu['jam_mulai']; ?></td>
												<td><?php echo $lu['jam_selesai']; ?></td>
												<?php if ($lu['id_notulen'] == NULL) : ?>
													<td><button type="button" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $lu['id_rapat']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-edit"></i> Notulen</button></td>
												<?php else : ?>
													<td><button type="button" class="btn btn-success btn-sm btn-block">Sudah Ada Data</button></td>
												<?php endif; ?>
												<td><a href="<?php echo base_url('user/view/' . $lu['id_rapat']); ?>" class="btn btn-secondary btn-block btn-sm"><i class="fas fa-users"></i> Peserta</a></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="edit-user">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Input Notulen</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('user/proses'); ?>" method="post" id="form_id">
						<input type="hidden" name="rapat_id_not" id="id_rapat">
						<input type="hidden" name="rapat_kode_not" id="kode_rapat">
						<div class="form-group">
							<label>Nama Rapat</label>
							<input type="text" class="form-control form-control-sm font-weight-bolder" name="tuj_rapat" id="nama_rapat" readonly>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label>Penulis Notulen</label>
									<input type="text" class="form-control form-control-sm" name="pembuat_notulen" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jabatan Notulen</label>
									<input type="text" class="form-control form-control-sm" name="jabatan_notulen" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Divisi Notulen</label>
									<input type="text" class="form-control form-control-sm" name="divisi_notulen" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>NIK Notulen</label>
									<input type="text" class="form-control form-control-sm" name="nik_notulen" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Hasil Rapat</label>
							<textarea class="textarea" name="hasil_rapat" rows="8" cols="100"></textarea>
						</div>

						<button type=" submit" class="btn btn-primary mr-2">Simpan Data</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('.tombol-edit').on('click', function() {
		const id_rapat = $(this).data('id');
		$.ajax({
			url: '<?php echo base_url('user/get_rapat'); ?>',
			data: {
				id_rapat: id_rapat
			},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#nama_rapat').val(data.nama_rapat);
				$('#kode_rapat').val(data.kode_rapat);
				$('#id_rapat').val(data.id_rapat);
			}
		});
	});
</script>
