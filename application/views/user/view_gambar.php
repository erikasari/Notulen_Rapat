<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
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
					<div class="timeline-item mt-2">
						<span class="time"><i class="fas fa-clock"></i> <?php echo format_indo($rapat['tgl_rapat']); ?></span>
						<h3 class="timeline-header mt-2 mb-2"><a href="<?php echo base_url('user/view/' . $rapat['id_rapat']); ?>"><?php echo $rapat['nama_rapat']; ?>, <?php echo format_indo($rapat['tgl_rapat']); ?></a></h3>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-primary btn-sm mb-2 mt-2" data-toggle="modal" data-target="#upload">
									<i class="fas fa-upload"></i> Unggah Foto
								</button>
							</div>
							<div class="col-md-12">
								<?php foreach ($gambar_satuan as $gs) : ?>
									<div class="Portfolio mb-5"><a href="#"><img class="card-img" src="<?php echo base_url('assets/images/' . $gs['gambar']); ?>" alt=""></a>
										<div class="desc"><?php echo $gs['gambar']; ?>
										</div>
										<span style="margin-left:45px;"> <a href="<?php echo base_url('user/del_gambar/' . $gs['id_foto']); ?>" class="tombol-hapus badge badge-danger mt-1" style="font-size:14px;">Hapus</a></span>
									</div>
								<?php endforeach; ?>
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


<div class="modal fade" id="upload">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Unggah Foto <?php echo $rapat['nama_rapat']; ?></h5>
			</div>
			<div class="modal-body">
				<div class="box-body">
					<div class="alert alert-warning font-weight-bolder text-muted" role="alert">
						* Tekan tombol <b>Ctrl + Klik </b> File yg dipilih (Banyak File).<br>
						* File gambar harus format JPG, JPEG, GIF.<br>
						* Ukuran File tidak lebih dari 1 MB.<br>
					</div>
					<?php echo form_open_multipart('user/upload_gbr'); ?>
					<input type="hidden" name="rapat_id_gbr" value="<?php echo $rapat['id_rapat']; ?>">
					<input type="hidden" name="rapat_kode_gbr" value="<?php echo $rapat['kode_rapat']; ?>">
					<div class="form-group">
						<label>Gambar</label>
						<input type="file" name='files[]' multiple="" required>
					</div>
					<button type="submit" class="btn btn-primary mr-2">Unggah Foto</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
