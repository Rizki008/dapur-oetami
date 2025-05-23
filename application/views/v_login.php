<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/backend/') ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?= base_url('assets/backend/') ?>assets/img/favicon.png">
	<title>
		<?= $title ?>
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url('assets/backend/') ?>assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="<?= base_url('assets/backend/') ?>assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="<?= base_url('assets/backend/') ?>assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
	<main class="main-content  mt-0">
		<div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
			<span class="mask bg-gradient-dark opacity-6"></span>
			<div class="container my-auto">
				<div class="row">
					<div class="col-lg-4 col-md-8 col-12 mx-auto">
						<div class="card z-index-0 fadeIn3 fadeInBottom">
							<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
								<div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
									<h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
									<div class="row mt-3">
										<div class="col-2 text-center ms-auto">
											<a class="btn btn-link px-3" href="javascript:;">
												<i class="fa fa-facebook text-white text-lg"></i>
											</a>
										</div>
										<div class="col-2 text-center px-1">
											<a class="btn btn-link px-3" href="javascript:;">
												<i class="fa fa-github text-white text-lg"></i>
											</a>
										</div>
										<div class="col-2 text-center me-auto">
											<a class="btn btn-link px-3" href="javascript:;">
												<i class="fa fa-google text-white text-lg"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<form role="form" action="<?= base_url('login') ?>" method="POST" class="text-start">
									<div class="input-group input-group-outline my-3">
										<label class="form-label">Email / Username</label>
										<input type="text" name="username" class="form-control">
									</div>
									<div class="input-group input-group-outline mb-3">
										<label class="form-label">Password</label>
										<input type="password" name="password" class="form-control">
									</div>
									<div class="text-center">
										<button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
									</div>
									<p class="mt-4 text-sm text-center">
										Belum Punya Akun?
										<a href="<?= base_url('registrasi') ?>" class="text-primary text-gradient font-weight-bold">Sign up</a>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--   Core JS Files   -->
	<script src="<?= base_url('assets/backend/') ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url('assets/backend/') ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/backend/') ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="<?= base_url('assets/backend/') ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?= base_url('assets/backend/') ?>assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>