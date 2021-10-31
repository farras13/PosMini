<section class="mi my-4 mx-5">
	<div class="container">
		<a href="" class="btn btn-primary float-end mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i></a>
		<h1>Kategori Produk</h1>
		<h6>Informasi mengenai kategori produk</h6>
		<hr>
		<table class="table table-hover table-responsive-md" id="myTable">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Kategori</th>
					<th scope="col">action</th>
				</tr>
			</thead>
			<tbody>
				<?php $n = 1;
				foreach ($kategori as $k) : ?>
					<tr>
						<th scope="row"><?= $n ?></th>
						<td><?= $k->kategori ?></td>
						<td>
							<a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $k->id ?>"> <b><i class="fa fa-pencil"></i> Edit </b></a>
							<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('admin/deleteKategori/'). $k->id ?>"><b> <i class="fa fa-trash"></i> Delete </b></a>

						</td>
					</tr>
				<?php $n++;
				endforeach; ?>
			</tbody>
		</table>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<form action="<?= base_url('admin/addKategori') ?>" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Kategori</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row g-2">
						<div class="col-md-12">
							<div class="form-floating">
								<input type="text" class="form-control" id="floatingInputGrid" placeholder="Kategori" name="kategori">
								<label for="floatingInputGrid">Kategori</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $n = 1;
foreach ($kategori as $kt) : ?>
	<div class="modal fade" id="exampleModal<?= $kt->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<form action="<?= base_url('admin/updateKategori/') . $kt->id ?>" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Kategori</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="row g-2">
							<div class="col-md-12">
								<div class="form-floating">
									<input type="text" class="form-control" name="kategori" id="floatingInputGrid" value="<?= $kt->kategori ?>">
									<label for="floatingInputGrid">Kategori</label>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $n++;
endforeach; ?>
