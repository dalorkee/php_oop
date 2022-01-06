<!DOCTYPE html>
<html lang="th">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<style type="text/css">
		.container-fluid {
			margin: 0;
			padding: 0;
		}
		.header {
			width: 100%;
			/* height: 100px; */
			padding: 0;
			/* background-color: #5289b5; */
			border-bottom: 2px solid #bbbbbb;
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
			/* background-color: pink; */
			float: left;
			padding: 10px 20px;
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
			background-color: #0088ff;
		}
		.footer-text {
			display: table;
			text-align: center;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<!-- header -->
		<div class="header">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand" href="#">
					<img src="small-moph-logo.png" width="40" height="40" class="d-inline-block align-top">
					My Apps
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
							Dropdown
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
		</div>

		<!-- navigation -->
		<div class="main-nav">
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="index.php"><i class="fas fa-home"></i> หน้าแรก</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> แดชบอร์ด</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="manage_user.php"><i class="fas fa-users-cog"></i> จัดการผู้ใช้</a>
				</li>
			</ul>
		</div>

		<!-- contents -->
		<div class="content">
			<div class="row mb-4">
				<div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
					<div class="card">
						<div class="card-body">
							<canvas id="chart_by_sex" style="width:100%;max-width:400px"></canvas>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-xl-6 col-lg-6">
					<div class="card">
						<div class="card-body">
							<canvas id="top_10_506" style="width:100%;max-width:600px; height:460px;"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- footer -->
		<div class="footer pt-2">
			<p class="footer-text">Copyright 2021 myapps.org</p>
		</div>


	</div>
	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script>
	<?php
		$conn = new mysqli('localhost', 'root', 'megabyte', 'workshop');
		if ($conn) {
			$conn->set_charset("utf8");
		}

		$sql = "SELECT SEX, COUNT(*) as total_sex FROM 506main GROUP BY SEX;";
		$result = $conn->query($sql);
		$ds_by_sex = "";
		while ($row = $result->fetch_assoc()) {
			$ds_by_sex .= "'" . $row['total_sex'] . "',";
		}
	?>
	var xValues = ["ชาย", "หญิง"];
	var yValues = [<?php echo $ds_by_sex; ?>];
	var barColors = ["#b91d47", "#5b2c6f"];

	new Chart("chart_by_sex", {
		type: "doughnut",
		data: {
			labels: xValues,
			datasets: [{
				backgroundColor: barColors,
				data: yValues
			}]
		},
		options: {
			title: {
				display: true,
				text: "ข้อมูล 506 แบ่งประเภทตามเพศ"
			},
			plugins: {
     datalabels: {
       formatter: (value, ctx) => {
         let datasets = ctx.chart.data.datasets;
         if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
           let sum = datasets[0].data.reduce((a, b) => a + b, 0);
           let percentage = Math.round((value / sum) * 100) + '%';
           return percentage;
         } else {
           return percentage;
         }
       },
       color: '#fff',
     }
   }
		}
	});
</script>
<script>
		<?php


			$sql = "SELECT DISEASE, count(*) AS top_10_ds FROM 506main GROUP BY DISEASE ORDER BY count(*) DESC LIMIT 10";
			$result = $conn->query($sql);
			$ds_name = "";
			$ds_data = "";
			while ($row = $result->fetch_assoc()) {
				$ds_name .= "'" . $row['DISEASE'] . "',";
				$ds_data .= "'" . $row['top_10_ds'] . "',";
			}
		?>
		var xValues = [<?php echo $ds_name ?>];
		var yValues = [<?php echo $ds_data ?>];
		var barColors = ["red", "green","blue","orange","brown", "Salmon", "#d4ac0d", "#6c3483", "#117864", "#922b21"];

		new Chart("top_10_506", {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
			backgroundColor: barColors,
			data: yValues
			}]
		},
		options: {
			legend: {display: false},
			title: {
			display: true,
			text: "10 ลำดับ โรค 506 ปี 2564"
			}
		}
		});
</script>

</body>
</html>