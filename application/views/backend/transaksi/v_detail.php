<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card my-4">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
					</div>
				</div>
				<div class="card-body px-0 pb-2">
					<!-- <br>
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<a href="<?= base_url('add-menu') ?>" class="btn btn-primary">Tambah Menu</a>
					</div> -->
					<div class="table-responsive p-0">

						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Order</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
									<!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Menu</th> -->
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Pesanan</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($detail as $key => $data) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img src="<?= base_url('assets/images/produk/' . $data->gambar) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $data->nama_pelanggan ?></p>
											<!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success"><?= $data->qty ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($data->harga * $data->qty, 0) ?></span>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<br>
				<a href="<?= base_url('transaksi') ?>" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</div>
