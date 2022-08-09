<?php include('../dbconnect.php');
session_start();
if(isset($_REQUEST['del'])){
	$u_name=$_REQUEST['u_name'];
	$sql="DELETE FROM useraccount WHERE u_name='$u_name'";
	$del=$conn->query($sql);
	if($del==TRUE)
	{
		echo "<div class= 'alert alert-success'>Delete your Data from database</div>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="icon" type="text/css" href="">
	<script src="https://kit.fontawesome.com/76235dc605.js" crossorigin="anonymous"></script>
	<title>Admin Dashboard</title>
</head>
<body>
	<?php include('adminHeader.php'); ?>

		<div class="col-lg-10 mt-4">
			<h3 class="text-center text-secondary mt-3 pt-3">Admin Dashboard</h3>
			<div class="col-sm-3 mt-5 pt-3 pl-3">
			
<div class="container mt-5 text-center mb-4" style="width:700px">
          <h6 class="text-center text-light p-2 bg-secondary">ASSIGNED WORKS</h6>
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
						<th>TECHNICIAN</th>
						<th>ACTION</th>
																		
					</tr>

				</thead>


			<?php
			$e=$_SESSION['email'];

			$sql="SELECT * FROM assignwork";
			$res=$conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc())
				{
					echo "<tr><td>".$row["name"]."</td> <td>".$row["type"]."</td><td>".$row["description"]."</td> <td>".$row["address"]."</td><td>".$row["city"]."</td> <td>".$row["phone"]."</td> <td>".$row["daate"]."</td> <td>".$row["technician"]."</td><td>
					<a href='deletework.php?id=$row[id]' style='text-decoration:none' class='text-danger'><i class='far fa-trash-alt pr-2'></i>Remove</a>
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
		<div class="container mt-5 text-center mb-4" style="width:700px">
			<h6 class="text-center text-light p-2 bg-secondary">User List</h6>
			<table class="table table-hover table-strip t border table-border">
				<thead>
					<tr class="text-center bg-success text-light">
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>

				</thead>


			<?php

			$sql="SELECT * FROM useraccount";
			$res=$conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc())
				{
					echo "<tr><td>".$row["u_name"]."</td> <td>".$row["u_email"]."</td><td>
							<a href='delete.php?u_name=$row[u_name]' style='text-decoration:none' class='text-danger'><i class='far fa-trash-alt pr-2'></i>Remove</a>
						</td></tr>";
			

			}

		 	echo "</table>";
	}
	else{
		echo "Null Result";
	}
?>
</div>

<!----------------->

<div class="container mt-5 text-center mb-4" style="width:700px">
			<h6 class="text-center text-light p-2 bg-secondary">Technician List</h6>
			<table class="table table-hover table-strip t border table-border">
				<thead>
					<tr class="text-center bg-success text-light">
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>

				</thead>


			<?php

			$sql="SELECT * FROM technician";
			$res=$conn->query($sql);
			if($res->num_rows>0){
				while($row=$res->fetch_assoc())
				{
					echo "<tr><td>".$row["t_name"]."</td> <td>".$row["t_email"]."</td><td>
							<a href='delete.php?t_name=$row[t_name]' style='text-decoration:none' class='text-danger'><i class='far fa-trash-alt pr-2'></i>Remove</a>
						</td></tr>";
			

			}

		 	echo "</table>";
	}
	else{
		echo "Null Result";
	}
?>
</div>




		<?php include('../footer.php'); ?>


</body>
</html>
