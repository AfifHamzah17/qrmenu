<?php
	require_once 'header_template.php';

	$query_select = 'select * from produk';
	$run_query_select = mysqli_query($conn, $query_select);


	// cek jika ada parameter delete
	if(isset($_GET['delete'])){

		$query_select_foto = 'select foto from produk where idproduk = "'.$_GET['delete'].'"';
		$run_query_select_foto = mysqli_query($conn, $query_select_foto);
		$d = mysqli_fetch_object($run_query_select_foto);

		if(file_exists('../uploads/products/' . $d->foto)){
			unlink('../uploads/products/' . $d->foto);
		}

		// proses delete data
		$query_delete = 'delete from produk where idproduk = "'.$_GET['delete'].'" ';
		$run_query_delete = mysqli_query($conn, $query_delete);

		// proses delete extra menu
		$query_delete_extra = 'delete from extra_menu where idproduk = "'.$_GET['delete'].'"';
		$run_query_delete_extra = mysqli_query($conn, $query_delete_extra);

		if($run_query_delete){
			echo "<script>window.location = 'produk.php'</script>";
		}else{
			echo "<script>alert('Data gagal dihapus')</script>";
		}

	}
	
?>

<div class="content">
	<div class="container">
		
		<h3 class="page-title">Produk</h3>

		<div class="card">
			<a href="produk_add.php" class="btn" title="Tambah data"><i class="fa fa-plus"></i></a>

			<table class="table">
				<thead>
					<tr>
						<th width="50">NO</th>
						<th>FOTO</th>
						<th>NAMA</th>
						<th>HARGA</th>
						<th>KATEGORI</th>
						<th>DESKRIPSI</th>
						<th width="100">AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php if(mysqli_num_rows($run_query_select) > 0){ ?>
					<?php $nomor = 1; ?>
					<?php while($row = mysqli_fetch_array($run_query_select)){ ?>
					<tr>
						<td align="center"><?= $nomor++ ?></td>
						<td><img src="../uploads/products/<?= $row['foto'] ?>" width="80"></td>
						<td><?= $row['namaproduk'] ?></td>
						<td><?= $row['hargaproduk'] ?></td>
						<td><?= $row['kategori'] ?></td>
						<td><?= $row['deskripsi'] ?></td>
						<td align="center">
							<a href="produk_edit.php?id=<?= $row['idproduk'] ?>" class="btn" title="Edit data"><i class="fa fa-edit"></i></a>
							<a href="?delete=<?= $row['idproduk'] ?>" class="btn" onclick="return confirm('Yakin ?')" title="Hapus data"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					<?php }}else{ ?>
					<tr>
						<td colspan="7">Tidak ada data</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>