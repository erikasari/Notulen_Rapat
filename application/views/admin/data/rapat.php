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
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user">
								Tambah Rapat
							</button>
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
										<th>Status</th>
										<th>Action</th>
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
												<?php if ($lu['status_rapat'] == 1) : ?>
													<td>Belum Mulai</td>
												<?php else : ?>
													<td><button class="badge badge-danger" style="font-size:14px;">Selesai</button></td>
												<?php endif; ?>
												<td><button type="button" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $lu['id_rapat']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-edit"></i> Edit</button></td>
												<td><a href="<?php echo base_url('admin/view/' . $lu['id_rapat']); ?>" class="btn btn-secondary btn-block btn-sm"><i class="fas fa-users"></i> Peserta</a></td>
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
<div class="modal fade" id="add-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Rapat</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/rapat'); ?>" method="post" id="form_id">
						<div class="form-group">
							<label>Jenis Rapat</label>
							<select class="form-control form-control-sm" name="jenis_id" required>
								<?php foreach ($list_jenis as $l) : ?>
									<option value="<?php echo $l['id_jenis']; ?>"><?php echo $l['jenis_rapat']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Kode Rapat</label>
							<input type="text" class="form-control form-control-sm" name="kode_rapat" required>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tgl Rapat</label>
									<input type="date" class="form-control form-control-sm" name="tgl_rapat" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Mulai</label>
									<input type="time" class="form-control form-control-sm" name="jam_mulai" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Selesai</label>
									<input type="time" class="form-control form-control-sm" name="jam_selesai" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Nama Rapat</label>
							<input type="text" class="form-control form-control-sm" name="nama_rapat" required>
						</div>
						<div class="form-group">
							<label>Pengisi Rapat</label>
							<input type="text" class="form-control form-control-sm" name="pengisi_rapat" required>
						</div>
						<div class="form-group">
							<label>Tema Rapat</label>
							<textarea class="form-control" rows="3" name="tema_rapat" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary mr-2">Simpan Data</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</div>
</div>

<div class="modal fade" id="edit-user">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Rapat</h4>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<form action="<?php echo base_url('admin/edit_rapat'); ?>" method="post" id="form_id">
						<div class="form-group">
							<input type="hidden" name="id_rapat" id="id_rapat">
							<label>Jenis Rapat</label>
							<select class="form-control form-control-sm" name="jenis_id" id="jenis_id" required>
								<?php foreach ($list_jenis as $l) : ?>
									<option value="<?php echo $l['id_jenis']; ?>"><?php echo $l['jenis_rapat']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Kode Rapat</label>
							<input type="text" class="form-control form-control-sm" name="kode_rapat" id="kode_rapat" readonly>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Tgl Rapat</label>
									<input type="date" class="form-control form-control-sm" name="tgl_rapat" id="tgl_rapat" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Mulai</label>
									<input type="time" class="form-control form-control-sm" name="jam_mulai" id="jam_mulai" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Jam Selesai</label>
									<input type="time" class="form-control form-control-sm" name="jam_selesai" id="jam_selesai" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Nama Rapat</label>
							<input type="text" class="form-control form-control-sm" name="nama_rapat" id="nama_rapat" required>
						</div>
						<div class="form-group">
							<label>Pengisi Rapat</label>
							<input type="text" class="form-control form-control-sm" name="pengisi_rapat" id="pengisi_rapat" required>
						</div>
						<div class="form-group">
							<label>Tema Rapat</label>
							<textarea class="form-control" rows="3" name="tema_rapat" id="tema_rapat" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
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
			url: '<?php echo base_url('admin/get_rapat'); ?>',
			data: {
				id_rapat: id_rapat
			},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				$('#jenis_id').val(data.jenis_id);
				$('#kode_rapat').val(data.kode_rapat);
				$('#tgl_rapat').val(data.tgl_rapat);
				$('#jam_mulai').val(data.jam_mulai);
				$('#jam_selesai').val(data.jam_selesai);
				$('#nama_rapat').val(data.nama_rapat);
				$('#pengisi_rapat').val(data.pengisi_rapat);
				$('#tema_rapat').val(data.tema_rapat);
				$('#id_rapat').val(data.id_rapat);
			}
		});
	});
</script>
