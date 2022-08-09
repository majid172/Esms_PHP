<?php include('../dbconnect.php');
session_start();
if($_SESSION['is_login'])
{
	$t_email=$_SESSION['email'];

}
else{
	echo "<script>location.href='techlogin.php'</script>";
}
/*$sql= "SELECT u_name, u_email FROM useraccount WHERE u_email=$u_email";
$result=$conn->query($sql);
if ($result->num_rows==1) {
	// code...
	$row=$result->fetch_assoc();
	$u_name=$row['user'];
}*/
if(isset($_REQUEST['update']))
{
		$t_name=$_REQUEST['u_name'];
		$sql="UPDATE technician SET t_name='$u_name' where t_email='$u_email'";
		$result=$conn->query($sql);
		if($result==true)
		{
			$msg='<div class="alert alert-success mt-2">Successfully Updated</div>';
		}
		else{
			$msg='<div class="alert alert-warning mt-2">Unsuccessfully Updated</div>';
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
	<title>Technician Profile</title>
	<link rel="icon" type="text/css" href="img/prfle.png">

	<style type="text/css">
		.sidebar{
			height: 320px;
		}
		.card{
			transition: 2s;
		}
		.card:hover{
			transform: translateY(20px);
		}
		.update{
			left: 30%;
			margin-top: 80px;
			margin-bottom: 30px;
			padding-bottom: 30px;
		}
		.updatebox{
			border-radius: 20px;
		}
	
	</style>

</head>
<body>
		<?php include ('techheader.php');?>
		 
			<div class="col-sm-8 mt-5 pl-5">
				<h1 class="text-center text-secondary mt-3"><i class="fas fa-charging-station pr-2 text-success"></i>Electronics Service Management System</h1>

				<div class="row container mt-5">
<!--
					<div class="col-sm-4 ">
						<div class="card shadow">
							<div class="card-body" data-spy="scroll" data-target=".card">
								<h5 class="text-center text-success">Recently Uploaded</h5>
								
								<?php 
								$sql= "SELECT description FROM submitorder LIMIT 3";
								$res =$conn->query($sql);
								if($res->num_rows>0)
								{
									while($row=$res->fetch_assoc())
									{
										
											echo "<ul><li>".$row["description"]. "</li></ul>";


									}
								}
								else{
									echo "Null Result";
								}
								?>
							</div>
						</div>
					</div>
							-->
	<!--						
					<div class="col-sm-4">
						<div class="card shadow">
							<div class="card-body">
								<h5 class="text-center text-success"> Status Overview</h5>
								<p class="text-center">Phasellus viverra rutrum orci, eu semper lectus laoreet eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.</p>
							</div>
						</div>
					</div>
							-->
	<!--
					<div class="col-sm-4">
						<div class="card shadow">
							<div class="card-body ">
								<h5 class="text-center text-success"> About me</h5>
								<p class="text-center">Phasellus viverra rutrum orci, eu semper lectus laoreet eget. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus.</p>
							</div>
						</div>
					</div>
							-->

		<div class="container mt-5 text-center mb-4" style="width:700px">
			<h6 class="text-center text-light p-2 bg-secondary">ASSIGNED WORK FOR YOU</h6>
			<table class="table table-hover table-strip t border table-border">
				<thead>
					<tr class="text-center bg-success text-light">
						<th>Customer Name</th>
						<th>TYPE</th>
						<th>DESCRIPTION</th>
						<th>Address</th>
						<th>CITY</th>
						<th>PHONE</th>
						<th>DATE</th>
					</tr>

				</thead>


			<?php
			$e=$_SESSION['email'];

			$sql="SELECT * FROM assignwork where technician='$e'";
			$res=$conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc())
				{
					echo "<tr><td>".$row["name"]."</td> <td>".$row["type"]."</td><td>".$row["description"]."</td> <td>".$row["address"]."</td><td>".$row["city"]."</td> <td>".$row["phone"]."</td> <td>".$row["daate"]."</td><td>

						</td></tr>";
			

			}

		 	echo "</table>";
	}
	else{
		echo "Null Result";
	}
?>
</div>

				</div>
			</div>
		</div>
							
	
	<div class="update col-md-5  ">
		<div class="updatebox border border-success mt-5 p-4">
			<h3 class="text-center text-secondary">User Name Update Form</h3>
			
			<form class="form-group mt-3">
				<label for="email">Email</label>
				<input type="email" name="u_email" class="form-control" readonly value="<?php echo $t_email; ?>">

				<label for="name">Name</label>
				<input type="text" name="u_name" class="form-control" required >

				<button type="submit" name="update" class="form-control btn btn-success mt-3">Update Name</button>
				<?php if (isset($msg)) {
					// code...
					echo $msg;
				}?>
			</form>
		</div>
	</div>

	<?php include('../footer.php')?>

	<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
			-->
</body>
</html>