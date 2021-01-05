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
                        <!-- /.card-body -->

                        <div class="row">
                            <div class="col">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class=" table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                            <thead>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                <?php foreach ($list_peserta as $ps) : ?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $ps['username']; ?></td>
                                                        <td><?php echo $ps['email']; ?></td>
                                                        <?php if ($ps['is_active'] == 1) : ?>
                                                            <td>Aktif</td>
                                                        <?php else : ?>
                                                            <td><button class="badge badge-danger" style="font-size:14px;">Tidak Aktif</button></td>
                                                        <?php endif; ?>

                                                        <td><button type="button" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $ps['id_peserta']; ?>" data-toggle="modal" data-target="#edit-peserta"><i class="fas fa-edit"></i> Edit</button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                        <thead>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($list_peserta as $ps) : ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $ps['username']; ?></td>
                                                    <td><?php echo $ps['email']; ?></td>
                                                    <td><?php echo $ps['telepon']; ?></td>
                                                    <td>

                                                        <a href="<?= base_url('admin/verifikasi/') . $ps['id_peserta']; ?>" class="btn btn-success btn-block btn-sm fa fa-check-square" aria-hidden="true"> Verifikasi</li></a>

                                                    </td>
                                                    <!-- <td><button type="button" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $ps['id_peserta']; ?>" data-toggle="modal" data-target="#edit-peserta"><i class="fas fa-edit"></i> Edit</button></td> -->
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
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


<div class="modal fade" id="edit-peserta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Peserta</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/edit_peserta'); ?>" method="post" id="form_id">
                        <input type="hidden" name="id_peserta" id="id_peserta">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="username" id="username" value="<?php set_value('username'); ?>" required>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" value="1" checked>
                                <label class="form-check-label">
                                    Aktif
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" value="0">
                                <label class="form-check-label">
                                    Tidak Aktif
                                </label>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
        const id_peserta = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/get_peserta'); ?>',
            data: {
                id_peserta: id_peserta
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#username').val(data.username);
                $('#id_peserta').val(data.id_peserta);
            }
        });
    });
</script>