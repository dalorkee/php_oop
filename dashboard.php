<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
	<style>
		.container-fluid {
			margin: 0;
			padding: 0;
		}
		.header {
			width: 100%;
			padding: 10px 0;
			background-color: #5289B5;
			border-bottom: 1px solid #0088FF;
		}
		.main-nav {
			width: 16%;
			padding: 40px 0 0 10px;
			background-color: #f4f4f4;
			min-height: calc(100vh - 136px);
			float: left;
		}
		.content {
			width: 84%;
			float: left;
			padding: 10px 20px;
			/* background-color: #abc; */
		}
		.content:after {
			content: "";
			display: block;
			clear: both;
		}
		.footer {
			position: fixed;
			height: 60px;
			bottom: 0;
			width: 100%;
			background-color: #0088FF;
		}
		.footer-text {
			display: table;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
		}
		.bg1 {
			background-color: #5289B5;
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg1">
		<a class="navbar-brand" href="#">
			<img src="small-moph-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			MyApps
		</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
	</div>
	<div class="main-nav">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link active" href="index.php"><i class="fas fa-home"></i> หน้าแรก</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> แดชบอร์ด</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="manage_user.php"><i class="fas fa-users"></i> จัดการผู้ใช้งาน</a>
			</li>
		</ul>
	</div>
	<div class="content">
		dashboard
	</div>
	<footer class="footer">
		<div class="footer-text pt-2">
			<p>Copyright (c) 2021 myapps.com All rights reserved</p>
		</div>
	</footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>