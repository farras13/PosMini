<?php if (validation_errors()) { ?>
	<div class="alert alert-warning">
		<?php echo validation_errors(); ?>
	</div>
<?php } ?>
<section class="py-4">
	<div class="container px-5">
		<h1>Master Produk</h1>
		<h6>Informasi mengenai data produk yang ada di majoo</h6>
		<hr>
		<form class="row g-3" action="<?= base_url('admin/addProduk') ?>" method="POST" enctype="multipart/form-data">
			<div class="input-group">
				<span class="input-group-text" id="basic-addon1">Nama</span>
				<input type="text" name="nama" class="form-control" placeholder="Nama Product" aria-label="Nama" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
				<span class="input-group-text">Harga</span>
				<span class="input-group-text">Rp.</span>
				<input type="number" name="harga" min="0" class="form-control" placeholder="8000" aria-label="Harga" aria-describedby="Harga">
			</div>
			<div class="input-group">
				<select class="form-select js-example-basic-single" name="kategori" id="inputGroupSelect01">
					<?php foreach ($kategori as $d) : ?>
						<option value="<?= $d->id ?>"><?= $d->kategori ?></option>
					<?php endforeach; ?>
				</select>
				<label class="input-group-text" for="inputGroupSelect01">Kategori</label>
			</div>
			<div class="input-group" style="flex-direction: column;">
				<span class="input-group-text">Deskripsi</span>
				<textarea class="form-control" id="summernote" name="deskripsi" aria-label="Deskripsi"></textarea>
			</div>
			<div class="input-group mb-3">
				<label class="input-group-text" for="inputGroupFile01">Upload</label>
				<input type="file" name="gambar" class="form-control" id="inputGroupFile02">
			</div>
			<div class="col-12 px-2">
				<div class="d-grid gap-2 col-5 float-end">
					<button class="btn btn-primary" id="dataUpload" type="submit">Submit</button>
				</div>
				<div class="d-grid gap-2 col-5 ">
					<a class="btn btn-danger" href="<?= base_url('Admin') ?>">Cancel</a>
				</div>
			</div>
		</form>
	</div>
</section>
