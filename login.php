<?php include ('dbconnect.php');

session_start();
if(!isset($_SESSION['is_login'])){

	if(isset($_REQUEST['email']))
	{
		$u_email=mysqli_real_escape_string($conn,trim($_REQUEST['email']));
		$u_pass=mysqli_real_escape_string($conn,trim($_REQUEST['pass']));

		$sql="SELECT u_email, u_pass FROM useraccount WHERE u_email='".$u_email."' AND u_pass='".$u_pass."' limit 1";
		$result=$conn->query($sql);

		if($result->num_rows==1)
		{
			$_SESSION['is_login']=true;
			$_SESSION['email']=$u_email;
			echo "<script>location.href='userProfile.php';</script>";
			exit;
		}
		else{
			$msg='<div class="alert alert-warning mt-2">Enter Valid Email & Password</div>';
		}
	}
}
else{
	echo "<script>location.href='userProfile.php';</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/76235dc605.js" crossorigin="anonymous"></script>
	<title>User Login</title>
	<link rel="icon" type="text/css" href="img/login.png">
	<style type="text/css">
		*{
			background: #ececec;
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

			<form class="form-group border border-info col-md-5 mt-5 p-4" method="POST" >
				<h4 class="text-center text-info"><i class="fas fa-sign-in-alt pr-3"></i>Login Form</h4>
				<div class="formbox mt-4">
					<label for="email"><i class="fas fa-envelope pr-2"></i>Email</label>
					<input type="email" name="email" class="form-control">

					<label for="pass"><i class="fas fa-unlock-alt pr-2 pt-2"></i>Password</label>
					<input type="password" name="pass" class="form-control">

					<div class="row">
						<div class="col-lg-6">
							<button class="btn btn-outline-info form-control mt-3">Login</button>
						</div>

						<div class="col-lg-6">
							<a href="index.php" class="btn btn-outline-danger form-control mt-3 pt-2">Home</a>
						</div>
						
					</div>
					<?php 
					if(isset($msg))
					{
						echo $msg;
					}
					?>
					
				</div>	
				
			</form>
		
	</div>


		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>