<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
	<h1 class="text-center text-white display-6"><?= $title ?></h1>
	<ol class="breadcrumb justify-content-center mb-0">
		<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
		<li class="breadcrumb-item"><a href="#">Pages</a></li>
		<li class="breadcrumb-item active text-white"><?= $title ?></li>
	</ol>
</div>
<!-- Single Page Header End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
	<div class="container py-5">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">No Order</th>
						<th scope="col">Nama Menu</th>
						<!-- <th scope="col">Harga</th> -->
						<th scope="col">Quantity</th>
						<th scope="col">Total</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($pesanan as $key => $pesan) { ?>
						<tr>
							<th scope="row">
								<div class="d-flex align-items-center">
									<p class="mb-0 mt-4"><?= $no++ ?></p>
								</div>
							</th>
							<th>
								<p class="mb-0 mt-4"><?= $pesan->no_order ?></p>
							</th>
							<td>
								<p class="mb-0 mt-4"><?= $pesan->nama_menu ?></p>
							</td>
							<!-- <td>
								<p class="mb-0 mt-4">Rp. <?= number_format($pesan->harga, 0) ?></p>
							</td> -->
							<td>
								<p class="mb-0 mt-4"><?= $pesan->qty ?></p>
							</td>
							<td>
								<p class="mb-0 mt-4">Rp. <?= number_format($pesan->harga, 0) ?></p>
							</td>
							<td>
								<?php if ($pesan->status_pesanan == 'Takeawey') { ?>
									<?php if ($pesan->status_bayar == 0) { ?>
										<p class="mb-0 mt-4 text-primary">Belum melakuka pembayaran</p>
									<?php } elseif ($pesan->status_order == 1 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Menunggu Konfirmasi Pesanan</p>
									<?php } elseif ($pesan->status_order == 2 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Pesanan Sedang Diproses</p>
									<?php } elseif ($pesan->status_order == 3 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Pesanan Sedang Dikirim</p>
									<?php } elseif ($pesan->status_order == 4 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Pesanan Selesai</p>
									<?php } ?>
								<?php } else { ?>
									<?php if ($pesan->status_bayar == 0) { ?>
										<p class="mb-0 mt-4 text-primary">Belum melakuka pembayaran</p>
									<?php } elseif ($pesan->status_order == 1 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Menunggu Konfirmasi Pesanan</p>
									<?php } elseif ($pesan->status_order == 2 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Pesanan Sedang Diproses</p>
									<?php } elseif ($pesan->status_order == 3 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Pesanan Segera Dihidangkan</p>
									<?php } elseif ($pesan->status_order == 4 && $pesan->status_bayar == 1) { ?>
										<p class="mb-0 mt-4 text-primary">Pesanan Selesai</p>
									<?php } ?>
								<?php } ?>
							</td>
							<td>
								<?php if ($pesan->status_bayar == 0) { ?>
									<a href="<?= base_url('pembayaran/' . $pesan->id_pesanan) ?>" class="btn btn-md rounded-circle bg-light border mt-4">
										<i class="fa fa-dollar-sign text-warning"></i>
									</a>
								<?php } elseif ($pesan->status_order == 1 || $pesan->status_order == 2 || $pesan->status_order == 4 && $pesan->status_bayar == 1) { ?>
									<a href="<?= base_url('detail/' . $pesan->id_pesanan) ?>" class="btn btn-md rounded-circle bg-light border mt-4">
										<i class="fa fa-pencil-alt text-warning"></i>
									</a>
								<?php } elseif ($pesan->status_order == 3) { ?>
									<a href="<?= base_url('detail/' . $pesan->id_pesanan) ?>" class="btn btn-md rounded-circle bg-light border mt-4">
										<i class="fa fa-pencil-alt text-warning"></i>
									</a>
									<a href="<?= base_url('backend/transaksi/selesai/' . $pesan->id_pesanan) ?>" class="btn btn-md rounded-circle bg-light border mt-4">
										<i class="fa fa-pager text-success"></i>
									</a>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Cart Page End -->
