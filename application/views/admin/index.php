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
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $user_bulan; ?></h3>
                            <p>User Baru</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <a class="small-box-footer text-sm"> - </i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $user_aktif; ?></h3>
                            <p>User Aktif</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <a class="small-box-footer text-sm"> - </i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $user_tak_aktif; ?></h3>
                            <p>User Tidak Aktif</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-times"></i>
                        </div>
                        <a class="small-box-footer text-sm"> - </i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $total_user; ?></h3>
                            <p>Total User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a class="small-box-footer text-sm"> - </i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                            <?php echo $this->session->flashdata('msg'); ?>
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger">
                                    <a class="close" data-dismiss="alert">x</a>
                                    <strong><?php echo strip_tags(validation_errors()); ?></strong>
                                </div>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class=" table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($list_user as $lu) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $lu['nama']; ?></td>
                                                <td><?php echo $lu['email']; ?></td>
                                                <td><?php echo $lu['level']; ?></td>
                                                <?php if ($lu['is_active'] == 1) : ?>
                                                    <td>Aktif</td>
                                                <?php else : ?>
                                                    <td><button class="badge badge-danger" style="font-size:14px;">Tidak Aktif</button></td>
                                                <?php endif; ?>
                                                <td><?php echo format_indo($lu['date_created']); ?></td>
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
    </section>
</div>

<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Profil</h5>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/edit_profile'); ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" value="<?php echo $user['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" value="<?php echo $user['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2 font-weight-bolder">Photo</div>
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
                    <form action="<?php echo base_url('admin/ubah_password'); ?>" method="post">
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