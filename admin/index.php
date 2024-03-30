<?php
	require_once 'header_template.php';
?>

<br><br>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h1 class="display-4 text-center">Halo, <?= $_SESSION['uname'] ?>!</h1>
      <p class="lead text-center">Selamat datang di halaman admin sistem informasi Buka Resto Sederhana</p>
    </div>
  </div>
</div>

<hr>

<div class="content">
	<div class="container">	
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<img src="../assets/img/fast-food.png" class="card-img-top" alt="Food" style="display: block; margin: 0 auto; width: 128px; height: 128px; ">
					<div class="card-body">
						<h5 class="card-title">Menu Produk</h5>
						<p class="card-text">Tambah atau ubah daftar menu produk yang dijual</p>
						<a href="produk.php" class="btn btn-primary">Pergi ke halaman produk</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<img src="../assets/img/qr-code.png" class="card-img-top" alt="Category" style="display: block; margin: 0 auto; width: 128px; height: 128px; ">
					<div class="card-body">
						<h5 class="card-title">Menu QR</h5>
						<p class="card-text">Tambah atau ubah daftar QR Code</p>
						<a href="qrcode.php" class="btn btn-primary">Pergi ke halaman QR Code</a>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<img src="../assets/img/add-user.png" class="card-img-top" alt="User " style="display: block; margin: 0 auto; width: 128px; height: 128px; ">
					<div class="card-body">
						<h5 class="card-title">Menu User</h5>
						<p class="card-text">Tambah atau ubah daftar akun user</p>
						<a href="users.php" class="btn btn-primary">Pergi ke halaman user</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.card {
		margin-bottom: 20px;
	}
</style>
<script src="../node_modules/bootstrap"></script>
<?php require_once 'footer_template.php'; ?>
