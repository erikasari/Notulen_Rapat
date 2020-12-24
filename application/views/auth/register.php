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

<body>
    <div class="container" style="width:80%;">
        <div id="loginbox" style="margin-top:160px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title font-weight-bolder text-center" style="font-weight:700;">HALAMAN REGISTER</div>
                    <!-- <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div> -->
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url('auth/index'); ?>" method="post">
                        <!-- Nama Asli -->
                        <?php echo form_error('nama asli', '<small class="text-danger pl-1">', '</small>'); ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="register-username" type="text" class="form-control" name="username" value="<?php echo set_value('nama_asli'); ?>" placeholder="Nama asli">
                        </div>
                        <!-- Nama Samar -->
                        <?php echo form_error('nama samar', '<small class="text-danger pl-1">', '</small>'); ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                            <input id="register-namasamar" type="text" class="form-control" name="namasamar" value="<?php echo set_value('nama_samar'); ?>" placeholder="Nama Samaran">
                        </div>

                        <!-- Email -->
                        <?php echo form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="register-username" type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Alamat Email">
                        </div>
                        <!-- No telepon -->
                        <?php echo form_error('no hp', '<small class="text-danger pl-1">', '</small>'); ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input id="register-notlp" type="text" class="form-control" name="notlp" value="<?php echo set_value('no_tlp'); ?>" placeholder="No.telepon">
                        </div>
                        <!-- Password -->
                        <?php echo form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="register-password" type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <!-- Confirm pass -->
                        <!-- Password -->
                        <?php echo form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="register-password2" type="password" class="form-control" name="password2" placeholder="Password">
                        </div>
                        <!-- <div class="input-group">
							<div class="checkbox">
								<label>
									<input id="login-remember" type="checkbox" name="remember" class="text-black" value="1"> Remember me
								</label>
							</div>
						</div> -->
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> -->
                            </div>
                        </div>
                        <hr>

                    </form>



                </div>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
</body>

</html>