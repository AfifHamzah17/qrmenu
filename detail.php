<?php
	include 'database.php';

	$query_select = 'select * from produk where idproduk = "'.$_GET['id'].'"';
	$run_query_select = mysqli_query($conn, $query_select);
	$d = mysqli_fetch_object($run_query_select);

	if(!$d){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail - Ebukumenu</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap');
		* {
			padding:0;
			margin:0;
		}
		body {
			font-family: 'Nunito Sans', sans-serif;
			background-color: #F9F1F0;
		}
		a {
			color: inherit;
			text-decoration: none;
		}

		/* detail content */
		.container {
			width: 540px;
			margin-left: auto;
			margin-right: auto;
		}
		.card-menu {
			background-color: #fff;
			position: relative;
			margin-bottom: 15px;
		}
		.card-menu .btn-back {
			border:1px solid #ccc;
			padding: 10px 15px;
			display: inline-block;
			border-radius: 50%;
			background-color: #fff;
			position: absolute;
			top: 10px;
			left: 10px;
		}
		.card-menu img {
			width: 100%;
		}
		.card-body {
			padding: 15px;
		}
		.card-body .menu-name {
			font-size: 18px;
		}
		.card-body .menu-description {
			font-size: 14px;
			color: #282828;
			margin-bottom:15px;
		}
		.card-body .menu-price {
			font-weight: bold;
		}
		.extra-menu {
			background-color: #fff;
			padding: 15px;
			margin-bottom: 25px;
		}
		.extra-menu h3 {
			margin-bottom: 8px;
		}
		.extra-menu ul {
			list-style: none;
		}
		.extra-menu ul li {
			padding: 5px 0;
			display: flex;
			justify-content: space-between;
		}
		.extra-menu ul li:not(:last-child) {
			border-bottom: 1px dashed;
		}

		@media (max-width: 768px){
			.container {
				width: 100%;
			}
		}
	</style>
</head>
<body>

	<!-- detail content -->
	<div class="container">
		<div class="card-menu">

			<a href="index.php" class="btn-back"><i class="fa fa-arrow-left"></i></a>

			<img src="uploads/products/<?= $d->foto ?>">

			<div class="card-body">
				<div class="menu-name"><?= $d->namaproduk ?></div>
				<div class="menu-description"><?= $d->deskripsi ?></div>
				<div class="menu-price">Rp<?= number_format($d->hargaproduk, 0, ',', '.') ?></div>
			</div>
		</div>

		<div class="extra-menu">
			
			<h3>Menu Tambahan</h3>
			<ul>
				<?php
				$query_select_extra_menu = 'select * from extra_menu where idproduk = "'.$_GET['id'].'"';
				$run_query_select_extra_menu = mysqli_query($conn, $query_select_extra_menu);

				while($row = mysqli_fetch_array($run_query_select_extra_menu)){
				?>
				<li><span><?= $row['nama'] ?></span> <span>+<?= number_format($row['harga'], 0, ',', '.') ?></span></li>
				<?php } ?>
			</ul>

		</div>
	</div>

</body>
</html>