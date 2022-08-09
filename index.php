<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="icon"  href="img/icon.png">
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>ESMS: An Electronic Service Management System</title>
	<script src="https://kit.fontawesome.com/76235dc605.js" crossorigin="anonymous"></script>
</head>
<body>

	<!--navbar-->
	<nav class="navbar navbar-expand-sm navbar-light shadow bg-light pl-5 fixed-top">
		<a href="index.php" class="navbar-brand ">ESMS</a>
		<span class="pr-5">Electronics service management system</span>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
			<span class="navbar-toggler-icon pr-5"></span>
		</button>

		<div class="collapse navbar-collapse text-right pl-5" id="myMenu">
			<ul class="navbar-nav text-right" id="navtext">
				<li class="nav-item p-2"><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item p-2"><a href="Technician/techlogin.php" class="nav-link">Technician</a></li>
				<li class="nav-item p-2"><a href="admin/adminlogin.php" class="nav-link">Admin Page</a></li>
				<li class="nav-item p-2"><a href="#" class="nav-link">Service</a></li>
				
				<li class="nav-item p-2"><a href="contact.php" class="nav-link">Contact</a></li>
				<li class="nav-item p-2"><a href="login.php" class="nav-link btn btn-info pr-3 pl-3 text-light">Login</a></li>
			</ul>
		
	</nav>

	<!--section1-->

	<div class="sec1 container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<h1 class="header">Welcome TO ESMS</h1>
				<p>Customer's Happines is our Aim</p>
			</div>

			<div class="col-lg-6" id="acc">
				<?php
					include('registration.php');
				?>
			</div>
		</div>
		
	</div>

	<!--section 2-->
	<div class="container mt-4 p-2">
		<div class="jumbotron">
			<h1 class="text-center text-indigo">ESMS Services</h1>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</p>
		</div>
		
	</div>

	<!--section 3-->

	<div class="container">
		<h1 class="text-center mb-4">Our Services</h1>
		<div class="row mt-4 pt-3">
		<div class="col-sm-4 text-center services1">
			<i class="fas fa-sliders-h"></i>
			<h4>Maintenance</h4>
		</div>

		<div class="col-sm-4 text-center services2">
			<i class="fas fa-laptop-medical"></i>
			<h4>Electronics services</h4>
		</div>

		<div class="col-sm-4 text-center services3">
			<i class="fas fa-tools"></i>
			<h4>Repair Tools</h4>
		</div>
	</div>
</div>


<!--section 4-->


<div class="jumbotron mt-4">
	<div class="container">
		<h3 class="text-center">Customer Satisfaction</h3>
		<div class="row mt-4 pt-3">
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body text-center">
						<img src="img/sarker.jpg">
						<h4>Shourav Sarker</h4>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card">
					<div class="card-body text-center">
						
						<img src="img/motlab.jpg">
						<h4>Abdul Mottaleb</h4>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
					</div>
				</div>
			</div>


			<div class="col-lg-3">
				<div class="card">
					<div class="card-body text-center">
						<img src="img/hridoy.jpg" alt="hridoy">
						<h4>L.Majid</h4>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="card">
					<div class="card-body text-center">
						<img src="img/rafi.jpg" alt="hridoy">
						<h4>Rafi Shariar</h4>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
					</div>
				</div>
			</div>

		
		</div>
	</div>
	
</div>

	<?php
	include('footer.php')?>
	
</body>
</html>