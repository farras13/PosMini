<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.rtl.min.css" />
	<!-- datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
	<!-- summernote -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
	<!-- toast -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<!-- icon font awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<title>Majoo!</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-black">
		<div class="container-fluid">
			<span class="navbar-brand mb-0 h1">Majoo Teknologi Indonesia</span>
			<div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">					
				</ul>
				<ul class=" navbar-nav mr-4 d-flex">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="<?= base_url('admin') ?>">Produk</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="<?= base_url('admin/kategori') ?>">Kategori</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="<?= base_url('Auth/logout') ?>"><i class="fa fa-user"></i> Logout </a> </li>
				</ul>
			</div>
		</div>
	</nav>
