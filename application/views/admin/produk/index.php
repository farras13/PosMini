<section class="py-4">
	<div class="container-fluid px-4">
		<a href="<?= base_url('admin/createProduk') ?>" class="btn btn-primary float-end mt-4"><i class="fa fa-plus"></i></a>
		<h1>Master Produk</h1>
		<h6>Informasi mengenai data produk yang ada di majoo</h6>
		<hr>
		<table class="table table-responsive-md table-hover" style="vertical-align: middle; text-align: center;" id="myTable">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama</th>
					<th scope="col">Kategori</th>
					<th scope="col">Harga</th>
					<th scope="col">Deskripsi</th>
					<th scope="col">Gambar</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=1; foreach($produk as $p): ?>
				<tr>
					<th scope="row"><?= $n++; ?></th>
					<td><?= $p->nama ?></td>
					<td><?= $p->kategori ?></td>
					<td>Rp. <?= number_format($p->harga,0,"","."); ?></td>
					<td><?= $p->deskripsi ?></td>					
					<td><img class="img-fluid rounded" src="<?= base_url('assets/uploads/').$p->gambar ?>" width="150px" onclick="window.open(this.src)" alt=""></td>
					<td>
						<a class="btn btn-warning" href="<?= base_url('admin/editProduk/').$p->id ?>"> <b><i class="fa fa-pencil"></i> Edit </b></a>
						<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')" href="<?= base_url('admin/deleteProduk/').$p->id ?>" ><b> <i class="fa fa-trash"></i> Delete </b></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</section>
