<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- My Style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/my_style.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/galery.css">
	<!-- Ionicons -->
	<!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="<?php echo base_url('assets/'); ?>css/font.css" rel="stylesheet">
	<!-- highchart -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<!-- <script src="<?php echo base_url('assets/highcart/'); ?>highcharts.js"></script>
	<script src="<?php echo base_url('assets/highcart/'); ?>exporting.js"></script>
	<script src="<?php echo base_url('assets/highcart/'); ?>export-data.js"></script>
	<script src="<?php echo base_url('assets/highcart/'); ?>accessibility.js"></script> -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="#" class="nav-link"> <?php echo date('d F Y H:i:s'); ?>
					</a>
				</li>
			</ul>
			<!-- SEARCH FORM -->
			<!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->
			<!-- Right navbar links -->

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						Level : <strong><?php echo $user['level']; ?></strong>
					</a>
				</li>
				<!-- <li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						Level : <strong><?php echo $peserta['level']; ?></strong>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.navbar -->