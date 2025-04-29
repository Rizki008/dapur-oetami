<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
	<h1 class="text-center text-white display-6">Checkout</h1>
	<ol class="breadcrumb justify-content-center mb-0">
		<li class="breadcrumb-item"><a href="#">Home</a></li>
		<li class="breadcrumb-item"><a href="#">Pages</a></li>
		<li class="breadcrumb-item active text-white">Checkout</li>
	</ol>
</div>
<!-- Single Page Header End -->


<!-- Checkout Page Start -->
<div class="container-fluid py-5">
	<div class="container py-5">
		<h1 class="mb-4">Detail Pembelian</h1>
		<form action="<?= base_url('checkout') ?>" method="POST">
			<div class="row g-5">
				<div class="col-md-12 col-lg-6 col-xl-7">
					<?php

					$i = 1;
					$j = 1;
					$subtotal = 0;
					$total = 0;
					// $tot_berat = 0;
					// $berat = 0;
					foreach ($chart['cart'] as $key => $items) {
						$id_rinci = random_string('alnum', 5);
						$no_order = date('Ymd') . strtoupper(random_string('alnum', 8));
						echo form_hidden('id_rinci' . $j++, $id_rinci);
						$subtotal = $items->qty_keranjang * $items->harga;
						$total += $subtotal;
						// $berat = $items->qty_keranjang * $items->berat;
						// $tot_berat = $tot_berat + $berat;
					}

					?>
					<h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
					<input type="text" name="no_order" value="<?= $no_order ?>">
					<!-- <input type="text" name="estimasi"> -->
					<!-- <input type="text" name="ongkir"> -->
					<!-- <input type="text" name="berat" value="<?= $tot_berat ?>"> -->
					<input type="text" name="grand_total" value="<?= $total ?>">
					<!-- <input type="text" name="total_bayar"> -->

					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="form-item w-100">
								<label class="form-label my-3">Nama<sup>*</sup></label>
								<input type="text" value="<?= $this->session->userdata('nama_pelanggan') ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-12 col-lg-6">
							<div class="form-item w-100">
								<label class="form-label my-3">No Hp<sup>*</sup></label>
								<input type="text" name="no_hp" class="form-control">
							</div>
						</div>
					</div>
					<div class="form-item">
						<label class="form-label my-3">Kota<sup>*</sup></label>
						<input type="text" name="kota" class="form-control">
					</div>
					<div class="form-item">
						<label class="form-label my-3">Detail alamat <sup>*</sup></label>
						<input type="text" name="alamat" class="form-control" placeholder="Detail Alamat">
					</div>
				</div>
				<div class="col-md-12 col-lg-6 col-xl-5">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Menu</th>
									<th scope="col">Nama Menu</th>
									<th scope="col">Harga</th>
									<th scope="col">Quantity</th>
									<th scope="col">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $total = 0;
								foreach ($chart['cart'] as $key => $item) {
									$total += $item->qty_keranjang * $item->harga;
								?>
									<tr>
										<th scope="row">
											<div class="d-flex align-items-center mt-2">
												<img src="<?= base_url('assets/images/produk/' . $item->gambar) ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
											</div>
										</th>
										<td class="py-5"><?= $item->nama_menu ?></td>
										<td class="py-5">Rp. <?= number_format($item->harga, 0) ?></td>
										<td class="py-5"><?= $item->qty_keranjang ?></td>
										<td class="py-5">Rp. <?= number_format($item->harga * $item->qty_keranjang, 0) ?></td>
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
							</tbody>
						</table>
					</div>
					<div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
						<div class="col-12">
							<div class="form-check text-start my-3">
								<input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1" name="status_pesanan" value="Takeawey">
								<label class="form-check-label" for="Transfer-1">TakeAway</label>
							</div>
							<!-- <p class="text-start text-dark">Jika anda takeAway, maka silahkan upload bukti pembayaran pada system!!!</p> -->
						</div>
					</div>
					<div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
						<div class="col-12">
							<div class="form-check text-start my-3">
								<input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="status_pesanan" value="Ditempat">
								<label class="form-check-label" for="Delivery-1">Makan Ditempat</label>
							</div>
						</div>
					</div>
					<div class="row g-4 text-center align-items-center justify-content-center pt-4">
						<button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Order Pesanan</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- Checkout Page End -->
