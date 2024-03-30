<?php
	require_once 'header_template.php';

	$query_select = 'select * from users where iduser = "'.$_GET['id'].'" ';
	$run_query_select = mysqli_query($conn, $query_select);
	$d = mysqli_fetch_object($run_query_select);

	if(!$d){
		header('location:index.php');
	}
?>

<div class="content">
	<div class="container">
		
		<h3 class="page-title">Edit User</h3>

		<div class="card">
			
			<form action="" method="post">
				
				<div class="input-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" placeholder="Nama lengkap" class="input-control" value="<?= $d->namalengkap ?>" required>
				</div>

				<div class="input-group">
					<label>Username</label>
					<input type="text" name="user" placeholder="Username" class="input-control" value="<?= $d->username ?>" required>
				</div>

				<div class="input-group">
					<label>Password</label>
					<input type="password" name="pass" placeholder="Password" class="input-control">
				</div>

				<div class="input-group">
					<button type="button" onclick="window.location.href = 'users.php'" class="btn-back">Kembali</button>
					<button type="submit" name="submit" class="btn-submit">Simpan</button>
				</div>

			</form>

			<?php

				if(isset($_POST['submit'])){

					$password = '';

					if($_POST['pass'] != ''){
						$password = md5($_POST['pass']);
					}else{
						$password = $d->password;
					}

					// proses update data
					$query_update = 'update users set
					namalengkap = "'.$_POST['nama'].'",
					username = "'.$_POST['user'].'",
					password = "'.$password.'"
					where iduser = "'.$_GET['id'].'" ';

					$run_query_update = mysqli_query($conn, $query_update);

					if($run_query_update){
						echo "<script>alert('Data berhasil diedit')</script>";
						echo "<script>window.location = 'users.php'</script>";
					}else{
						echo "Data gagal diedit " . mysqli_error($conn);
					}

				}


			?>

		</div>

	</div>
</div>

<?php require_once 'footer_template.php'; ?>