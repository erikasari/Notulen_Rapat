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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <!-- <th>Register</th> -->
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($list_peserta as $ps) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $ps['nama']; ?></td>
                                                <td><?php echo $ps['email']; ?></td>
                                                <td><?php echo $ps['level']; ?></td>
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
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->


<div class="modal fade" id="edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/edit_peserta'); ?>" method="post" id="form_id">
                        <input type="hidden" name="id_peserta" id="id_peserta">
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control form-control-sm" name="level" id="level">.
                                <option value="">- Pilih Level -</option>
                                <option value="Admin">ADMINISTRATOR</option>
                                <option value="User">USER</option>
                                <option value="Peserta">PESERTA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control form-control-sm" name="nama" id="nama" value="<?php set_value('nama_peserta'); ?>" required>
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
        const id_user = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/get_user'); ?>',
            data: {
                id_user: id_user
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#level').val(data.level);
                $('#id_user').val(data.id_user);
            }
        });
    });
</script>