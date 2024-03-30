<?php
	require_once 'header_template.php';
?>

<div class="content">
	<div class="container">
		
		<h3 class="page-title">Tambah Produk</h3>

		<div class="card">
			
			<form action="" method="post" enctype="multipart/form-data">
				
				<div class="input-group">
					<label>Nama Produk</label>
					<input type="text" name="nama" placeholder="Nama produk" class="input-control" required>
				</div>

				<div class="input-group">
					<label>Harga</label>
					<input type="text" name="harga" placeholder="Harga" class="input-control" required>
				</div>

				<div class="input-group">
					<label>Deskripsi</label>
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
				</div>

				<div class="input-group">
					<label>Kategori</label>
					<select class="input-control" name="kategori">
						<option value="">Pilih</option>
						<option value="Makanan">Makanan</option>
						<option value="Minuman">Minuman</option>
					</select>
				</div>

				<div class="input-group">
					<label>Foto</label>
					<input type="file" name="foto" required>
				</div>

				<h3>Extra Menu</h3>

				<table class="table">
					<thead>
						<tr>
							<th>NAMA</th>
							<th>HARGA</th>
							<th width="100">HAPUS</th>
						</tr>
					</thead>
					<tbody id="extraMenuList"></tbody>
				</table>

				<div style="text-align:right;margin-top:10px;">
					<button type="button" class="btn-submit" id="btnAdd">Tambah Extra Menu</button>
				</div>

				<div class="input-group">
					<button type="button" onclick="window.location.href = 'produk.php'" class="btn-back">Kembali</button>
					<button type="submit" name="submit" class="btn-submit">Simpan</button>
				</div>

			</form>

			<?php

				if(isset($_POST['submit'])){

					// proses insert data produk


					// tampung data file yang akan diupload
					$name = $_FILES['foto']['name'];
					$tmp_name = $_FILES['foto']['tmp_name'];

					$typefile = pathinfo($name, PATHINFO_EXTENSION);
					$renamefile = time() . '.' . $typefile;


					// proses upload file
					move_uploaded_file($tmp_name, '../uploads/products/' . $renamefile);

					// proses insert
					$query_insert = 'insert into produk
					(namaproduk, hargaproduk, deskripsi, foto, kategori) value (
					"'.$_POST['nama'].'",
					"'.$_POST['harga'].'",
					"'.$_POST['deskripsi'].'",
					"'.$renamefile.'",
					"'.$_POST['kategori'].'"
					)';

					$run_query_insert = mysqli_query($conn, $query_insert);
					$idproduk = mysqli_insert_id($conn);

					if(!$run_query_insert){
						echo 'Data gagal disimpan ' . mysqli_error($conn);
						exit();
					}


					// proses insert data extra menu
					$sql = [];
					if(isset($_POST['extraname'])){

						for($i=0; $i < count($_POST['extraname']); $i++){

							$sql[] = '("'.$idproduk.'", "'.$_POST['extraname'][$i].'", "'.$_POST['extraharga'][$i].'")';

						}


						$query_insert_extra_menu = 'insert into extra_menu
						(idproduk, nama, harga) values ' . implode(",", $sql);

						$run_query_insert_extra_menu = mysqli_query($conn, $query_insert_extra_menu);


						if(!$run_query_insert_extra_menu){
							echo 'Data gagal disimpan ' . mysqli_error($conn);
							exit();
						}

					}

					

					echo 'Data berhasil disimpan';

				}


			?>

		</div>

	</div>
</div>

<script type="text/javascript">
	
	var btnAdd = document.getElementById("btnAdd")
	var extraMenuList = document.getElementById("extraMenuList")

	btnAdd.addEventListener("click", function(e){
		e.preventDefault()

		var listItem = document.createElement('tr');

		listItem.innerHTML = `
			<tr>
				<td><input type="text" name="extraname[]" class="input-control" required></td>
				<td><input type="text" name="extraharga[]" class="input-control" required></td>
				<td align="center"><button type="button" class="btn" onclick="removeRow(this)"><i class="fa fa-times"></i></button></td>
			</tr>
		`;

		extraMenuList.appendChild(listItem)
	})


	function removeRow(e){
		e.closest('tr').remove()
	}

</script>

<?php require_once 'footer_template.php'; ?>