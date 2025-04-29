<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
	<h1 class="text-center text-white display-6"><?= $title ?></h1>
	<ol class="breadcrumb justify-content-center mb-0">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item"><a href="#">Pages</a></li>
		<li class="breadcrumb-item active text-white"><?= $title ?></li>
	</ol>
</div>
<!-- Single Page Header End -->


<!-- Checkout Page Start -->
<div class="container-fluid py-5">
	<div class="container py-5">
		<h1 class="mb-4"><?= $title ?></h1>
		<form action="<?= base_url('pembayaran/' . $pembayaran->id_pesanan) ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
			<div class="row g-5">
				<div class="col-md-12 col-lg-6 col-xl-7">
					<h4 class="font-weight-semi-bold mb-4">Billing Address</h4>

					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="form-item w-100">
								<label class="form-label my-3">Nama<sup>*</sup></label>
								<input type="text" value="<?= $this->session->userdata('nama_pelanggan') ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="form-item w-100">
								<label class="form-label my-3">Total Bayar<sup>*</sup></label>
								<input type="text" name="total_bayar" value="<?= $pembayaran->grand_total ?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-item">
						<label class="form-label my-3">Bukti Bayar<sup>*</sup></label>
						<input type="file" name="bukti_bayar" class="form-control">
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="form-item w-100">
								<div class="row g-4 text-center align-items-center justify-content-center pt-4">
									<button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Bayar</button>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="form-item w-100">
								<div class="row g-4 text-center align-items-center justify-content-center pt-4">
									<a href="<?= base_url('pesanan') ?>" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-warning">Kembali</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Checkout Page End -->
