<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('auth/'); ?>bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="<?php echo base_url('auth/'); ?>bootstrap.min.js"></script>
    <script src="<?php echo base_url('auth/'); ?>jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>
<style>
    body {
        background: url('<?php echo base_url("assets/dist/img/bg-login.png"); ?>') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .swal2-popup {
        font-size: 1.6rem !important;
    }
</style>

<>
    <div class="container" style="width:60%;">
        <div id="loginbox" style="margin-top:80px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">


            <div class="row">

                <div class="form-box">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            <div class="panel-title font-weight-bolder text-center" style="font-weight:700;">HALAMAN REGISTER</div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            </div>
                            <form action="<?php echo base_url(); ?>peserta/registration" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="fname">Nama Lengkap</label>
                                            <div>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Nama Lengkap" required="">
                                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label" for="nama">Nama Samaran</label>
                                            <div>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Samaran" required="">
                                                <span class="text-danger"><?php echo form_error('nama'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="telepon">Telepon</label>
                                    <div>
                                        <input type="text" class="form-control" id="telepon" name="telepon" placeholder="telepon" required="">
                                        <span class="text-danger"><?php echo form_error('telepon'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="pswd">Password</label>
                                    <div>
                                        <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required="">
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="cn-pswd">Confirm Password</label>
                                    <div>
                                        <input type="password" class="form-control" id="cn-pswd" name="confirmpswd" placeholder="Confirm Password" required="">
                                        <span class="text-danger"><?php echo form_error('confirmpswd'); ?></span>
                                    </div>
                                </div>
                                <div style="margin-top:10px" class="form-group">

                                    <div class="col-sm-12 controls">
                                        <button type="submit" class="btn btn-primary btn-block"> <span class="glyphicon glyphicon-log-in"></span> Register </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer text-center">
                            <a class="small" href=<?php echo base_url('auth/index'); ?>>Sudah Pumya Akum ? Silahkan Login </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
    </body>

</html>