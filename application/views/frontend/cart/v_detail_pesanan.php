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
		<h1 class="mb-4">Detail Pesanan</h1>
		<div class="row g-5">
			<div class="col-md-12 col-lg-12 col-xl-12">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Menu</th>
								<th scope="col">Nama Menu</th>
								<th scope="col">Harga</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col">Kritik Dan Saran</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0;
							foreach ($detail_pesanan as $key => $item) {
								$total += $item->qty * $item->harga;
							?>
								<tr>
									<th scope="row">
										<div class="d-flex align-items-center mt-2">
											<img src="<?= base_url('assets/images/produk/' . $item->gambar) ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
										</div>
									</th>
									<td class="py-5"><?= $item->nama_menu ?></td>
									<td class="py-5">Rp. <?= number_format($item->harga, 0) ?></td>
									<td class="py-5"><?= $item->qty ?></td>
									<td class="py-5">Rp. <?= number_format($item->harga * $item->qty, 0) ?></td>
									<?php if ($item->status_order == 4 && $item->status == 1) { ?>
										<form action="<?= base_url('frontend/keranjang/kritik/' . $item->id_kritik) ?>" method="post">
											<td class="py-5"> <input type="text" name="kritik" class="form-control"></td>
											<td class="py-5"> <button type="submit" class="btn border-secondary  w-100 text-primary">Submit</button></td>
										</form>
									<?php } elseif ($item->status_order == 4 && $item->status == 2) { ?>
										<td class="py-5"><?= $item->kritik ?></td>
									<?php } ?>
								</tr>
							<?php } ?>
							<tr>
								<th scope="row">
								</th>
								<td class="py-5">
									<p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
								</td>
								<td class="py-5"></td>
								<td class="py-5"></td>
								<td class="py-5">
									<div class="py-3 border-bottom border-top">
										<p class="mb-0 text-dark">Rp. <?= number_format($total, 0) ?></p>
									</div>
								</td>
							</tr>
							<tr>
								<th scope="row">
								</th>
								<td class="py-5">
									<p class="mb-0 text-dark text-uppercase py-3">STATUS</p>
								</td>
								<td class="py-5"></td>
								<td class="py-5"></td>
								<td class="py-5">
									<div class="py-3 border-bottom border-top">
										<p class="mb-0 text-dark"><?= $item->status_pesanan ?></p>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="row g-4 text-center align-items-center justify-content-center pt-4">
					<a href="<?= base_url('pesanan') ?>" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">KEMBALI</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Checkout Page End -->
