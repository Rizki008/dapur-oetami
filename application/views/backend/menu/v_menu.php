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
					<br>
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<a href="<?= base_url('backend/menu/add') ?>" class="btn btn-primary">Tambah Menu</a>
					</div>
					<div class="table-responsive p-0">

						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
									<!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Menu</th> -->
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
									<th class="text-secondary text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($produk as $key => $data) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img src="<?= base_url('assets/images/produk/' . $data->gambar) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm"><?= $data->nama_menu ?></h6>
													<!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
												</div>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $data->nama_kategori ?></p>
											<!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
										</td>
										<td class="align-middle text-center text-sm">
											<span class="badge badge-sm bg-gradient-success"><?= number_format($data->harga, 0) ?></span>
										</td>
										<td class="align-middle text-center">
											<span class="text-secondary text-xs font-weight-bold"><?= $data->deskripsi ?></span>
										</td>
										<td class="align-middle">
											<a href="<?= base_url('backend/menu/update/' . $data->id_menu) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit menu">
												Edit
											</a> |
											<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $data->id_menu ?>" data-original-title="Delete menu">
												Delete
											</button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- Modal delete -->
					<?php foreach ($produk as $key => $delete) { ?>
						<div class="modal fade" id="delete<?= $delete->id_menu ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Menu Makanan</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<form action="<?= base_url('backend/menu/delete/' . $delete->id_menu) ?>" method="POST">
										<div class="modal-body">
											<p>Apakah anda yakin akan hapus kategori <?= $delete->nama_menu ?>???</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php } ?>
					<!-- modal update -->
				</div>
			</div>
		</div>
	</div>