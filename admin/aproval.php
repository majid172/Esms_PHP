<?php include('../dbconnect.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="icon" href="img/assignIcon.jpg">
	<title>Request approval</title>
	<style type="text/css">
		.card{
			border-radius: 20px;
		}
	</style>
</head>
<body>
	<?php include('adminHeader.php'); ?>

	<div class="row">
		<div class="col-sm-4 mt-5 pt-5">
			<?php
			$sql="SELECT * FROM submitorder";
			$res=$conn->query($sql);
			if($res->num_rows>0)
			{
				while($row=$res->fetch_assoc())
				{
					echo '<div class="card mt-2 mx-5 mb-3" style="width:350px">';
						echo '<div class="card-header bg-success text-light">';
						echo 'Request ID: '.$row['id'];
						echo '</div>';
						
						echo '<div class="card-body justify-center">';
						echo '<h5 class="card-title text-black"> Request Info: '.$row['type'].'</h5>';
						
						echo '<p>Description: '.$row['description']. '</p>';

						echo '<p><b>City: </b>'.$row['city']. "."." ".'<b>Date: </b>'.$row['daate']. '</p>';
						echo '</div>';

						echo '<div class="card-footer">';

						//details from view card;/////
						echo '<form method="POST" >';
							echo '<input type="hidden" name="id" value='.$row["id"].'>';
							echo '<input type="hidden" name="name" value='.$row["name"].'>';
							echo '<input type="hidden" name="type" value='.$row["type"].'>';

							echo '<input type="hidden" name="description" value='.$row["description"].'>';
							echo '<input type="hidden" name="address" value='.$row["address"].'>';
							echo '<input type="hidden" name="city" value='.$row["city"].'>';
							echo '<input type="hidden" name="phone" value='.$row["phone"].'>';
							
						echo '<input type="submit" name="view" class="btn btn-danger" value="View"></input>';
						echo '<input type="submit" name="close" class="btn btn-dark ml-2" value="Close"></input>';
						echo '</form>';
						echo '</div>';
					echo '</div>';
				}
			}
			?>
		</div>
		<?php 
		if (isset($_REQUEST['view'])) //click view button then show details in assign form 
		{
			// code...
			$sql="SELECT name,type,description,address,city,phone,daate FROM submitorder where id={$_REQUEST['id']}";
			$res=$conn->query($sql);
			$row=$res->fetch_assoc();
		}

		//delete order
		if(isset($_REQUEST['close']))
		{
			$sql="DELETE FROM submitorder WHERE id={$_REQUEST['id']}";
			$del=$conn->query($sql);
			if ($del==TRUE) {
				// code...
				echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
			}
			else{
				echo "Disable to delete";
			}
		}

		 if(isset($_REQUEST['assign']))
		{
			$sql="SELECT name,type,description,address,city,phone,daate FROM submitorder where id={$_REQUEST['id']}";
			$res=$conn->query($sql);
			$row=$res->fetch_assoc();
			$id=$_REQUEST['id'];
			$name=$_REQUEST['name'];
			$type=$_REQUEST['type'];
			$technician=$_REQUEST['technician'];
			$description=$_REQUEST['description'];
			$address=$_REQUEST['address'];
			$city=$_REQUEST['city'];
			$phone=$_REQUEST['phone'];
			$date=$_REQUEST['date'];

			$sql="INSERT INTO assignwork (id,name,type,technician,description,address,city,phone,daate) VALUES ('$id','$name','$type','$technician','$description','$address','$city','$phone','$date')";
        	$result=$conn->query($sql);
	
        	if($result==TRUE){
        		$msg= "<div class='alert alert-success text-dark'>Work Has Been Assigned</div>";
        	}
        	else{
        		$msg= "<div class='alert alert-warning'>".$conn->error."</div>";
        	}
		}

		?>


		<div class=" col-sm-7 mt-5 ml-5 ">
			<div class="orderbox mt-5 border border-success  ml-5 pl-3 pr-3">
				<h3 class="text-center text-black pt-4">Assign Work</h3>
              	<form method="POST" action="">
				<div class="form-group p-4">
				<?php if(isset($msg))
				{
					echo $msg;
				} ?>
				<div class="row">
					<div class="col-sm-8">
						 <label for="name">Name</label><br>
               			 <input type="text" name="name" class="form-control" value="<?php if(isset($_REQUEST['name'])) echo $row['name']; ?>" >
					</div>
					<div class="col-sm-4">
						<label for="id">ID</label>
						<input type="text" name="id" class="form-control" value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id']; ?>" readonly>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						 <label for="type">Type</label><br>
               			 <input type="text" name="type" class="form-control" value="<?php if(isset($_REQUEST['type'])) echo $row['type']; ?>">
					</div>
					<div class="col-sm-6">
						<label for="technician">Technician</label>
						<input type="text" name="technician" class="form-control" required>
					</div>
				</div>
               

               
                <label for="type">Description</label><br>
                <input type="text" name="description" class="form-control" value="<?php if(isset($_REQUEST['description'])) echo $row['description'];?>"><br>

                <div class="row">
                    <div class="col-sm-6">
                         <label for="address">Address</label><br>
                        <input type="text" name="address" class="form-control" value="<?php if(isset($_REQUEST['address'])) echo $row['address'];?>">
                    </div>
                    <div class="col-sm-6">
                    <label for="city">City</label><br>
                <input type="text" name="city" class="form-control" value="<?php if(isset($_REQUEST['city'])) echo $row['city'];?>" >
            </div>
        </div>

                <div class="row">
                    <div class="col-sm-6">
                         <label for="phone">Phone</label><br>
                        <input type="text" name="phone"  class="form-control" value="<?php if(isset($_REQUEST['phone'])) echo $row['phone'];?>">
                    </div>

                    <div class="col-sm-6">
                    	<label for="date">Date</label>
                    	<input type="date" name="date" class="form-control">
                		<!--<input type="date" name="date" class="form-control">--><br>
           	 		</div>
        	</div>

        <div class="row">
            <div class="col-sm-6 mt-2">
                <button class="btn btn-outline-danger " type="submit" name="assign">Assign Order</button>

            </div>

            <div class="col-sm-6">
               <a href="aproval.php" class="btn btn-outline-dark "><i class="pl-2 fas fa-arrow-left"></i>Refresh Order</a>
            </div>
			
        </div>
                   
           
            </form>
        </div>
        </div>
	</div>

</body>
</html>