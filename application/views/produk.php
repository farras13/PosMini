<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Majoo!</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-black">
		<div class="container-fluid">
			<div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Majoo Teknologi Indonesia</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<section class="pt-4">
		<div class="container-fluid mx-1">
			<p><b>
					<h1>Produk</h1>
				</b></p>
			<!-- Page Features-->
			<div class="row row-cols-1 row-cols-md-4 g-2 bor">
				<?php foreach($produk as $p): ?>
				<div class="col">
					<div class="card h-100 border-dark">
						<img onclick="window.open(this.src)" src="<?= base_url('assets/uploads/').$p->gambar ?>" class="card-img-top" alt="<?= $p->gambar ?>">
						<div class="card-body">
							<div class="card-title mb-4 mt-2">
								<center>
									<h5><?= $p->nama ?></h5>
									<h4><small>Rp</small><b> <?= number_format($p->harga,0,"","."); ?></h4></b>
								</center>
							</div>
							<p class="card-text"> <?= $p->deskripsi ?></p>
						</div>
						<center><button class="btn btn-outline-dark shadow mb-4 mt-2">Beli</button></center>
					</div>
				</div>
				<?php endforeach; ?>			
			</div>
		</div>
	</section>
	<footer class="py-3 bg-light">
		<hr>
		<div class="container">
			<p class="m-0 text-center">2019 &copy; Majoo Teknologi Indonesia</p>
		</div>
	</footer>
	<!-- Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
