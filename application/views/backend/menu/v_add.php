<div class="container-fluid py-4">
	<div class="row">
		<div class="col-12">
			<div class="card z-index-0 fadeIn3 fadeInBottom">
				<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
					<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
						<h6 class="text-white text-capitalize ps-3"><?= $title ?></h6>
					</div>
				</div>
				<div class="card-body">
					<?php
					//notifikasi form kosong
					echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

					//notifikasi gagal upload gambar
					if (isset($error_upload)) {
						echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
					} ?>
					<form action="<?= base_url('backend/menu/add') ?>" role="form" class="text-start" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						<div class="input-group input-group-outline my-3">
							<label class="form-label">Nama Menu</label>
							<input type="text" name="nama_menu" class="form-control">
						</div>
						<div class="input-group input-group-outline mb-3">
							<!-- <label class="form-label">Kategori</label> -->
							<select name="id_kategori" id="id_kategori" class="form-control">
								<option>---Pilih Kategori Menu---</option>
								<?php foreach ($kategori as $key => $value) { ?>
									<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="input-group input-group-outline mb-3">
							<label class="form-label">Harga</label>
							<input type="number" name="harga" class="form-control">
						</div>
						<div class="input-group input-group-outline mb-3">
							<!-- <label class="form-label">Gambar</label> -->
							<input type="file" name="gambar" class="form-control" required>
						</div>
						<div class="input-group input-group-outline mb-3">
							<label class="form-label">Deskripsi</label>
							<textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10" required></textarea>
						</div>
						<div class="text-center">
							<button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Simpan</button>
							<a href="<?= base_url('backend/menu') ?>" class="btn bg-gradient-primary w-100 my-4 mb-2">Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>