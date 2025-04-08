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
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
							Tambah Kategori
						</button>
					</div>
					<div class="table-responsive p-0">

						<table class="table align-items-center mb-0">
							<thead>
								<tr>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
									<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
									<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
									<th class="text-secondary opacity-7"></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($kategori as $key => $data) { ?>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<?= $no++ ?>
											</div>
										</td>
										<td>
											<p class="text-xs font-weight-bold mb-0"><?= $data->nama_kategori ?></p>
										</td>
										<td class="align-middle text-center text-sm">
											<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $data->id_kategori ?>">
												Ubah Kategori
											</button>
											<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $data->id_kategori ?>">
												Delete Kategori
											</button>
										</td>

									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- Modal add -->
					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori Makanan</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form action="<?= base_url('backend/kategori/add') ?>" method="POST">
									<div class="modal-body">
										<div class="input-group input-group-outline mb-3">
											<label class="form-label">Nama Kategori</label>
											<input type="text" class="form-control" name="nama_kategori">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- modal add -->
					<!-- Modal update -->
					<?php foreach ($kategori as $key => $update) { ?>
						<div class="modal fade" id="edit<?= $update->id_kategori ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kategori Makanan</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<form action="<?= base_url('backend/kategori/update/' . $update->id_kategori) ?>" method="POST">
										<div class="modal-body">
											<div class="input-group input-group-outline mb-3">
												<label class="form-label">Nama Kategori</label>
												<input type="text" class="form-control" name="nama_kategori" value="<?= $update->nama_kategori ?>">
											</div>
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
					<!-- Modal delete -->
					<?php foreach ($kategori as $key => $delete) { ?>
						<div class="modal fade" id="delete<?= $delete->id_kategori ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Kategori Makanan</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<form action="<?= base_url('backend/kategori/delete/' . $delete->id_kategori) ?>" method="POST">
										<div class="modal-body">
											<p>Apakah anda yakin akan hapus kategori <?= $delete->nama_kategori ?>???</p>
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