<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Ebukumenu</title>
	<link rel="icon" href="assets/img/fast-food.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap');
        * {
            padding:0;
            margin:0;
        }
        body {
            font-family: 'Nunito Sans', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #F9F1F0;
        }

        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(90deg, #0099ff, #66ccff);
            animation: moveBackground 30s linear infinite;
            z-index: -1;
        }

        @keyframes moveBackground {
            0% { background-position: 100% 0; }
            100% { background-position: 0 0; }
        }

        .container {
            position: relative;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .triangle {
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
        }

        /* Blue Triangle */
        .blue {
            border-width: 0 100px 173.2px 100px;
            border-color: transparent transparent #0099ff transparent;
            top: 30%;
            left: 20%;
        }

        /* Light Blue Triangle */
        .light-blue {
            border-width: 0 70px 121.3px 70px;
            border-color: transparent transparent #66ccff transparent;
            top: 50%;
            left: 60%;
        }

        /* Grey Triangle */
        .grey {
            border-width: 0 50px 86.6px 50px;
            border-color: transparent transparent #ccc transparent;
            top: 70%;
            left: 40%;
        }

        /* Add more triangle styles with different colors and sizes */

        a {
            color: inherit;
            text-decoration: none;
        }

        .card-login {
            background-color: #fff;
            width: 400px;
            border: none;
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-login h3 {
            margin-bottom: 7px;
            text-align: center;
            font-weight: bold;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group .form-control {
            padding-right: 40px;
        }

        .form-group i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px 0;
            cursor: pointer;
            font-size: 1rem;
        }

        .notification {
            text-align: center;
            margin-bottom: 10px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<?php
    // Mulai sesi
    session_start();

    // Jika pengguna sudah masuk (session uid sudah ada), arahkan ke halaman admin
    if(isset($_SESSION['uid'])){
        header('location:admin/index.php');
        exit; // Pastikan untuk menghentikan eksekusi skrip setelah redireksi
    }

    // cek jika tombol login di tekan
    if(isset($_POST['login'])){
        include 'database.php';
        // cek data login
        $query_select = 'select * from users
        where username = "'.mysqli_real_escape_string($conn, $_POST['user']).'"
        and password = "'.mysqli_real_escape_string($conn, md5($_POST['pass'])).'" ';
        $run_query_select = mysqli_query($conn, $query_select);
        $d = mysqli_fetch_object($run_query_select);
        if($d){
            // buat session
            $_SESSION['uid']    = $d->iduser;
            $_SESSION['uname']    = $d->namalengkap;
            header('location:admin/index.php');
            exit; // Pastikan untuk menghentikan eksekusi skrip setelah redireksi
        }else{
        }
    }
?>


<div class="background"></div>


<!-- login -->
<div class="container">
    <div class="card-login">
        <div class="card-body">
			<h3> Login Website</h3> <h3> Admin Buka Resto</h3>
			<img src="assets/img/menu.png" style="display: block; margin: 0 auto; width: 90px; height: 90px; ">
			<div class="notification">
                <?php
                    if(isset($_POST['login']) && !$d){
                        echo '<div class="alert alert-danger" role="alert">Username atau password salah</div>';
                    }
                ?>
            </div>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="user" placeholder="Username" class="form-control">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" placeholder="Password" class="form-control" id="password">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button><br>
                <div class="text-center">
                    <label style="text-align:center;" >Login Admin</label>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>
</body>
</html>
