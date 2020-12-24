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

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- <h4 class="m-0 text-dark"><?php echo $title; ?></h4> -->
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
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <b>Mengirim Hasil Rapat</b>
                            </div>
                            <div class="panel-body">
                                <?php echo form_open('email/send', ['method' => 'post', 'enctype' => 'multipart/form-data']) ?>
                                <div style="margin-bottom: 10px;">
                                    <label>Kepada</label><br />
                                    <input type="email" name="email_penerima" placeholder="Email Penerima" style="margin-top: 5px;width: 100%" />
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <label>Subjek</label><br />
                                    <input type="text" name="subjek" placeholder="Subjek" style="margin-top: 5px;width: 100%" />
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <label>Pesan</label><br />
                                    <textarea name="pesan" placeholder="Pesan" rows="8" style="margin-top: 5px;width: 100%"></textarea>
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label>Attachment</label><br />
                                    <input type="file" name="attachment" style="margin-top: 5px;width: 100%" />
                                </div>
                                <hr />
                                <button type="submit" class=" btn btn-primary"><i class="fas fa-paper-plane"></i> Send</button>
                                <?php echo form_close() ?>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    </div>
    </div>
    </section>
    </div>
</body>

</html>