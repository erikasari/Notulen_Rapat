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
	  						<a href="javascript:history.back()" class="btn btn-default btn-sm">Kembali</a>
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
	  					<!-- Main content -->
	  					<div class="invoice p-3 mb-3">
	  						<!-- title row -->
	  						<div class="row">
	  							<div class="col-12">
	  								<h4>
	  									<i class="fas fa-users"></i> <?php echo $rapat['jenis_rapat']; ?>
	  									<small class="float-right">Tanggal : <?php echo format_indo($rapat['tgl_rapat']); ?></small>
	  								</h4>
	  							</div>
	  							<!-- /.col -->
	  						</div>
	  						<!-- info row -->
	  						<div class="row invoice-info">
	  							<div class="col-sm-4 invoice-col">
	  								<strong>No Rapat : <?php echo $rapat['kode_rapat']; ?></strong>
	  								<address>
	  									<?php echo $rapat['nama_rapat']; ?><br>
	  									Pengisi : <?php echo $rapat['pengisi_rapat']; ?><br>
	  								</address>
	  							</div>
	  							<!-- /.col -->
	  							<div class="col-sm-4 invoice-col">
	  								<strong>Waktu Acara</strong>
	  								<address>
	  									Mulai : <?php echo $rapat['jam_mulai']; ?> WIB<br>
	  									Selesai : <?php echo $rapat['jam_selesai']; ?> WIB<br>
	  								</address>
	  							</div>
	  							<!-- /.col -->
	  							<div class="col-sm-4 invoice-col">
	  								<b>Satus Acara</b><br>
	  								<?php if ($rapat['status_rapat'] == 1) : ?>
	  									Belum Terlaksana<br>
	  								<?php else : ?>
	  									Selesai
	  								<?php endif; ?>
	  							</div>
	  							<!-- /.col -->
	  						</div>
	  						<!-- /.row -->
	  						<button type="button" class="btn btn-primary btn-sm mb-2 mt-2" data-toggle="modal" data-target="#add-user">
	  							Tambah Peserta
	  						</button>
	  						<!-- Table row -->
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
	  											<th>Aksi</th>
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
	  												<td><a href="<?php echo base_url('admin/batal/' . $lu['id_peserta']); ?>" class="tombol-batal btn btn-info btn-block btn-sm"><i class="far fa-times-circle"></i> Batal</a></td>
	  											</tr>
	  										<?php endforeach; ?>
	  									</tbody>
	  								</table>
	  							</div>
	  							<!-- /.col -->
	  						</div>
	  						<div class="row no-print">
	  							<div class="col-12">
	  								<!-- <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
	  								<!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
	  									Payment
	  								</button>
	  								<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
	  									<i class="fas fa-download"></i> Generate PDF
	  								</button> -->
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
	  				<h4 class="modal-title">Tambah Peserta Rapat</h4>
	  			</div>
	  			<div class="modal-body">
	  				<div class="box-body">
	  					<form action="<?php echo base_url('admin/view/' . $rapat['id_rapat']); ?>" method="post" id="form_id">
	  						<div class="form-group">
	  							<label>Nama Rapat</label>
	  							<input type="hidden" name="rapat_id" value="<?php echo $rapat['id_rapat']; ?>">
	  							<input type="hidden" name="rapat_kode" value="<?php echo $rapat['kode_rapat']; ?>">
	  							<input type="text" class="form-control form-control-sm" value="<?php echo $rapat['nama_rapat']; ?>" readonly>
	  						</div>
	  						<div class="form-group">
	  							<label>Nama Peserta</label>
	  							<input type="text" class="form-control form-control-sm" name="nama_peserta" required>
	  						</div>
	  						<div class="form-group">
	  							<label>No HP</label>
	  							<input type="text" class="form-control form-control-sm" name="no_hp" required>
	  						</div>
	  						<div class="form-group">
	  							<label>Divisi / Departemen</label>
	  							<input type="text" class="form-control form-control-sm" name="divisi" required>
	  						</div>
	  						<div class="form-group">
	  							<label>Jabatan</label>
	  							<input type="text" class="form-control form-control-sm" name="jabatan" required>
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
	  							<input type="text" class="form-control form-control-sm" name="kode_rapat" id="kode_rapat" required>
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