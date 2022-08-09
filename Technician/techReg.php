<?php
	include('../dbconnect.php');

	if(isset($_REQUEST['submit'])){

		$sql="SELECT t_email FROM technician WHERE t_email='".$_REQUEST['email']."'";
		$res=$conn->query($sql);
		if ($res->num_rows == 1) {
			
			$msg='<div class="alert alert-danger mt-2" role="alert">Already registerd</div>';
		}
		
		else{
		$t_name=$_REQUEST['user'];
		$t_email=$_REQUEST['email'];
		$t_pass=$_REQUEST['pass'];

		$sql="INSERT into technician(t_name,t_email,t_pass) VALUES('$t_name','$t_email','$t_pass')";

		if($conn->query($sql)==TRUE){
			$msg = '<div class="alert alert-success mt-2" role="alert">Successfully Created</div>';
		}
		else{
			$msg = '<div class="alert alert-danger mt-2" role="alert">Unable to create</div>';
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/76235dc605.js" crossorigin="anonymous"></script>
	<title>Admin Login</title>
	<link rel="icon" type="text/css" href="img/login.png">
	<style type="text/css">
		*{
			background: #ADD8E6
;
		}
		.form-group{
			width: 45%;
			left:30%;
			border-radius: 20px;
		}

	</style>
</head>
<body>

	<div class="container-fluid">

			<form class="form-group border border-danger col-md-5 mt-5 p-4" method="POST" >
				<h4 class="text-center text-black"><i class="fas fa-sign-in-alt pr-3"></i>Technician Registration Form</h4>
				<div class="formbox mt-4">
				<?php 
					if(isset($msg))
					{
						echo $msg;
					}
					?>
					
				<label for="user" class="mt-3"><i class="far fa-user pr-2"></i>User</label>
				<input type="user" name="user" class="form-control" required>

				<label for="email" class="mt-3"><i class="far fa-envelope pr-2"></i>Email</label>
				<input type="email" name="email" class="form-control" required>

				
				<label for="pass" class="mt-3"><i class="fas fa-key pr-2"></i>Password</label>
				<input type="password" name="pass" class="form-control" required>

				<button class="form-control btn btn-danger mt-2" name="submit">Create account</button>


				<div class="row">
						<div class="col-lg-6">
						<a href="techlogin.php" class="btn btn-outline-success form-control mt-3 pt-2">Log in</a>
						</div>

						<div class="col-lg-6">
							<a href="../index.php" class="btn btn-outline-danger form-control mt-3 pt-2">Home</a>
						</div>

					</div>
					
					
				</div>	
				
			</form>
		
	</div>


		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>