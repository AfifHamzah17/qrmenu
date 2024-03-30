<?php
	require_once 'header_template.php';
?>

<div class="content">
	<div class="container">
		
		<h3 class="page-title">Tambah QR Code</h3>

		<div class="card">
			
			<form action="" method="post">
				
				<div class="input-group">
					<label>URL</label>
					<input type="text" name="url" placeholder="URL" class="input-control" required>
				</div>

				<div class="input-group">
					<button type="button" onclick="window.location.href = 'qrcode.php'" class="btn-back">Kembali</button>
					<button type="submit" name="submit" class="btn-submit">Simpan</button>
				</div>

			</form>

			<?php

				if(isset($_POST['submit'])){

					// panggil library phpqrcode
					require_once '../vendor/phpqrcode/qrlib.php';

					$qrname = time() . '.png';

					// proses insert data
					$query_insert = 'insert into qrcode (url, qrname) value
					("'.$_POST['url'].'", "'.$qrname.'")';

					$run_query_insert = mysqli_query($conn, $query_insert);

					// generate qrcode
					QRcode::png($_POST['url'], '../uploads/qrcode/' . $qrname, 'H', 8);

					if($run_query_insert){
						echo 'simpan data berhasil';
					}else{
						echo 'simpan data gagal';
					}

				}


			?>

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>