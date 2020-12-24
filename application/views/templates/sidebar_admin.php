<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<!-- <img src="<?php echo base_url('assets/'); ?>dist/img/adonia.png" alt="AdoniaLogo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
		<span class="brand-text font-weight-light font-weight-bolder ml-2"><i class="fas fa-handshake"></i> NOTULEN RAPAT</span>
	</a>
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url('assets/dist/img/profile/' . $user['image']); ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $user['nama']; ?></a>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="<?php echo base_url('admin/index'); ?>" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>Home</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo base_url('admin/man_user'); ?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Manajemen User</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo base_url('admin/mst_jenis'); ?>" class="nav-link">
						<i class="nav-icon fab fa-buffer"></i>
						<p>Master Jenis Rapat</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo base_url('admin/rapat'); ?>" class="nav-link">
						<i class="nav-icon fas fa-handshake"></i>
						<p>Data Rapat</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo base_url('admin/email'); ?>" class="nav-link">
						<i class="nav-icon fas fa-envelope"></i>
						<p>Kirim Email</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('auth/logout'); ?>" id="tombol-logout" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt text-danger"></i>
						<p class="text">Logout</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>