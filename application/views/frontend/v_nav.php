<!-- Navbar start -->
<div class="container-fluid fixed-top">
	<div class="container topbar bg-primary d-none d-lg-block">
		<div class="d-flex justify-content-between">
			<div class="top-info ps-2">
				<small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, Kuningan, Indonesia</a></small>
				<small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">dapur-oetami@gmail.com</a></small>
			</div>
			<div class="top-link pe-2">
				<?php if ($this->session->userdata('email') == "" || $this->session->userdata('username') == "") { ?>
					<a href="<?= base_url('login') ?>" class="text-white"><small class="text-white mx-2">Login</small></a>
				<?php } else { ?>
					<a href="<?= base_url('logout') ?>" class="text-white"><small class="text-white mx-2"><?= $this->session->userdata('nama_pelanggan'); ?></small>/</a>
					<a href="<?= base_url('logout') ?>" class="text-white"><small class="text-white mx-2">Logout</small>/</a>
				<?php } ?>

			</div>
		</div>
	</div>
	<div class="container px-0">
		<nav class="navbar navbar-light bg-white navbar-expand-xl">
			<a href="<?= base_url('') ?>" class="navbar-brand">
				<h1 class="text-primary display-6">Dapur Oetami</h1>
			</a>
			<button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
				<span class="fa fa-bars text-primary"></span>
			</button>
			<div class="collapse navbar-collapse bg-white" id="navbarCollapse">
				<div class="navbar-nav mx-auto">
					<a href="<?= base_url('') ?>" class="nav-item nav-link active">Beranda</a>
					<a href="shop.html" class="nav-item nav-link">Menu</a>
					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
						<div class="dropdown-menu m-0 bg-secondary rounded-0">
							<a href="<?= base_url('chart') ?>" class="dropdown-item">Keranjang</a>
							<a href="<?= base_url('pesanan') ?>" class="dropdown-item">Pesanan</a>
						</div>
					</div>
					<div class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
						<div class="dropdown-menu m-0 bg-secondary rounded-0">
							<a href="<?= base_url('chart') ?>" class="dropdown-item">Keranjang</a>
							<a href="<?= base_url('pesanan') ?>" class="dropdown-item">Pesanan</a>
						</div>
					</div>
				</div>
				<div class="d-flex m-3 me-0">
					<button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
					<?php if ($this->session->userdata('id_pelanggan') != '') {
						if ($chart['jml']->jml != 0) {
					?>
							<a href="<?= base_url('chart') ?>" class="position-relative me-4 my-auto">
								<i class="fa fa-shopping-bag fa-2x"></i>
								<span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?= $chart['jml']->jml ?></span>
							</a>
					<?php
						}
					} ?>
					<?php if ($this->session->userdata('email') == "") { ?>
						<a href="<?= base_url('login') ?>" class="my-auto">
							<i class="fas fa-user fa-2x"></i>
						</a>
					<?php } else { ?>

						<a href="<?= base_url('logout') ?>" class="my-auto">
							<i class="fas fa-user fa-2x"></i>
						</a>
					<?php } ?>
				</div>
			</div>
		</nav>
	</div>
</div>
<!-- Navbar End -->


<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content rounded-0">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body d-flex align-items-center">
				<div class="input-group w-75 mx-auto d-flex">
					<input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
					<span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Search End -->
