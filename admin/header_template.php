<?php
	session_start();
	if(!isset($_SESSION['uid'])){
		header('location:../login.php');
	}

	include '../database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel - Ebukumenu</title>
	<link rel="icon" href="assets/img/fast-food.png" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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

		/* navbar */
		.navbar {
			padding: 0.5rem 1rem;
			background-color: #67595E;
			color: #fff;
			position: fixed;
			width: 100%;
			top:0;
			left:0;
			z-index: 99;
			display: flex;
		}
		.navbar h1 {
			margin-left: 15px;
			font-size: 20px;
			line-height: 21px;
		}

		/*  sidebar */
		.sidebar {
			position: fixed;
			width: 250px;
			top:0;
			bottom:0;
			background-color: #fff;
			padding-top: 40px;
			transition: all .5s;
			z-index: 98;
		}
		.sidebar-hide {
			left:-250px;
		}
		.sidebar-show {
			left:0;
		}
		.sidebar-body {
			padding:15px;
		}
		.sidebar-body h2 {
			margin-bottom: 8px;
		}
		.sidebar-body ul {
			list-style: none;
		}
		.sidebar-body ul li a {
			width: 100%;
			display: inline-block;
			padding: 7px 15px;
			box-sizing: border-box;
		}
		.sidebar-body ul li a:hover {
			background-color: #A49393;
			color: #fff;
		}
		.sidebar-body ul li:not(:last-child) {
			border-bottom:1px solid #ccc;
		}

		/* content */
		.content {
			padding: 60px 0;
		}
		.container {
			width: 960px;
			margin-left: auto;
			margin-right: auto;
		}
		.page-title {
			margin-bottom: 10px;
		}
		.card {
			border:1px solid #ccc;
			background-color: #fff;
			padding:15px;
			border-radius: 5px;
		}
		.table {
			width:100%;
			border-collapse: collapse;
			margin-top: 8px;
		}
		.table thead th,
		.table tbody td {
			border:1px solid;
			padding:3px;
		}
		.btn {
			border: 1px solid;
			padding:3px 8px;
			display: inline-block;
			background-color: #67595E ;
			color: #fff;
			border-radius: 3px;
		}
		.input-group {
			margin-bottom: 8px;
		}
		.input-group label {
			display: block;
			margin-bottom: 5px;
		}
		.input-control {
			width: 100%;
			box-sizing: border-box;
			padding:0.5rem;
			font-size: 1rem;
		}
		.btn-submit {
			border: 1px solid #67595E;
			padding:8px 20px;
			display: inline-block;
			background-color: #67595E ;
			color: #fff;
			border-radius: 3px;
			font-size:1rem;
			cursor: pointer;
		}
		.btn-back {
			border: 1px solid;
			padding:8px 20px;
			display: inline-block;
			border-radius: 3px;
			font-size:1rem;
			cursor: pointer;
		}
	</style>
</head>
<body>

	<!-- navbar -->
	<div class="navbar">
		<a href="#" id="btnBars">
			<i class="fa fa-bars"></i>
		</a>
		<a href="index.php"><h1>Restoran QR code</h1></a>
		<a href="logout.php" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin keluar?')"> 
			<i class="fas fa-power-off"></i> KELUAR 
		</a>			
	</div>

	<!-- sidebar -->
	<div class="sidebar sidebar-hide">
		<div class="sidebar-body">
			
			<h2>Navigasi</h2>
			<ul>
				<li><a href="index.php">Beranda</a></li>
				<li><a href="users.php">Users</a></li>
				<li><a href="produk.php">Produk</a></li>
				<li><a href="qrcode.php">QR Code</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>

		</div>
	</div>