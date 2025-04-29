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
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
									<th class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($transaksi as $key => $data) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $data->no_order ?></h6>
													<!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $data->nama_pelanggan ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success"><?= $data->qty ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold">Rp. <?= number_format($data->grand_total, 0) ?></span>
										</td>
										<td class="align-middle text-center">
											<?php if ($data->status_order == 0 && $data->status_bayar == 0) { ?>
												<span class="badge badge-sm bg-gradient-primary">Menunggu Pembayaran</span>
											<?php } elseif ($data->status_order == 1 && $data->status_bayar == 1) { ?>
												<span class="badge badge-sm bg-gradient-warning">Menunggu Konfirmasi</span>
											<?php } elseif ($data->status_order == 2) { ?>
												<span class="badge badge-sm bg-gradient-warning">Pesanan Diproses</span>
											<?php } elseif ($data->status_order == 3) { ?>
												<span class="badge badge-sm bg-gradient-primary">Pesanan Dikirim / Dihidangkan</span>
											<?php } elseif ($data->status_order == 4) { ?>
												<span class="badge badge-sm bg-gradient-success">Selesai</span>
											<?php } ?>
										</td>
										<td class="align-middle">
											<a href="<?= base_url('detail-transaksi/' . $data->id_pesanan) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Detail Pesanan">
												Detail
											</a>
											<?php if ($data->status_order == 1 && $data->status_bayar == 1) { ?>
												<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#cek<?= $data->id_pesanan ?>" data-original-title="Pembayaran">
													Cek Pembayaran
												</button>
												<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfir<?= $data->id_pesanan ?>" data-original-title="Konfirmasi">
													Konfirmasi
												</button>
											<?php } elseif ($data->status_order == 2) { ?>
												<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#proses<?= $data->id_pesanan ?>" data-original-title="Proses">
													Kirim / Hidangkan
												</button>
											<?php } ?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- Modal cek bayar -->
					<?php foreach ($transaksi as $key => $cek) { ?>
						<div class="modal fade" id="cek<?= $cek->id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Data Pembayaran</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Bukti Pembayaran <?= $cek->no_order ?>???</p>
										<br>
										<img src="<?= base_url('assets/images/pembayaran/' . $cek->bukti_bayar) ?>" width="350px">
										<br>
										<p>Tanggal Pembaaran : <?= $cek->tgl_bayar ?></p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Modal konfirmasi -->
					<?php foreach ($transaksi as $key => $konfir) { ?>
						<div class="modal fade" id="konfir<?= $konfir->id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Data Pembayaran</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<form action="<?= base_url('backend/transaksi/konfirmasi/' . $konfir->id_pesanan) ?>" method="POST">
										<div class="modal-body">
											<p>Pesanan Akan Diproses</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Konfirmasi</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- Modal proses -->
					<?php foreach ($transaksi as $key => $proses) { ?>
						<div class="modal fade" id="proses<?= $proses->id_pesanan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Data Pembayaran</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<form action="<?= base_url('backend/transaksi/kirim/' . $proses->id_pesanan) ?>" method="POST">
										<div class="modal-body">
											<p>Pesanan Akan Dikirim/Dihidangkan</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Kirim / Hidangkan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
