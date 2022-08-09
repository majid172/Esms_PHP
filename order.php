<?php
include('dbconnect.php');
session_start();

if($_SESSION['is_login'])
{
	$u_email=$_SESSION['email'];
    $sql="SELECT u_name FROM useraccount WHERE u_email='$u_email'";
    $name=$conn->query($sql);
    $name=$name->fetch_assoc();
    $name=$name['u_name'];
    //$u_name=$_SESSION['name'];

}
else{
	echo "<script>location.href='login.php'</script>";
}
if(isset($_REQUEST['submit']))
{

        $name=$_REQUEST['name'];
        $email=$_REQUEST['mail'];
        $type=$_REQUEST['type'];
        $description=$_REQUEST['description'];
        $address=$_REQUEST['address'];

        $city=$_REQUEST['city'];
        $phone=$_REQUEST['phone'];
        $date=$_REQUEST['date'];

        $sql="INSERT INTO  submitorder(name,s_email,type,description,address,city,phone,daate) values('$name','$email','$type','$description','$address','$city','$phone','$date')";
        $result=$conn->query($sql);
        if($result==true)
        {
            $p='<div class="alert alert-success">Successfully Inserted</div>';
        }

        else
        {
            $p='<div class="alert alert-warning">Wrong Try</div>';
        } 
}

?>

<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <script src="https://kit.fontawesome.com/76235dc605.js" crossorigin="anonymous"></script>

         <style type="text/css">
             a{
                text-decoration: none;
                color: white;
             }
             #form{
                border-radius: 30px;
             }
         </style>
    </head>


    <body>
        <?php include('profileHeader.php'); ?>
        
      <!--<div class="container mt-4" id="sec1">
       
                <div class="form border border-success p-4" id="form">-->
           <div class=" col-lg-10 mt-5">
            <div class="orderbox mt-5 border border-success  mb-5 pl-3 pr-3">
                <h3 class="text-center text-primary pt-4">REQUEST SUBMISSION</h3>
                <form method="POST" action="">
                <div class="form-group p-4">
                <?php if(isset($p))
				{
					echo $p;
				} ?>
                <div class="row">
                    <div class="col-sm-6">
                    <label for="name">Name</label><br>
                <input type="text" name="name" class="form-control" readonly value="<?php echo $name; ?>">
                    </div>
                    <div class="col-sm-6">
                    <label for="Email">Email</label><br>
                <input type="email" name="mail" class="form-control" readonly value="<?php echo $u_email; ?>">
                    </div>
                </div>
                

                <label for="type">Type</label><br>
                <input type="text" name="type" class="form-control"required><br>

                <label for="description">Description</label><br>
                <input type="text" name="description" class="form-control"required><br>

                <div class="row">
                    <div class="col-sm-6">
                         <label for="address">Address</label><br>
                        <input type="text" name="address" class="form-control"><br>
                    </div>
                    <div class="col-sm-6">
                    <label for="city">City</label><br>
                <input type="text" name="city" class="form-control" required><br>
            </div>
        </div>

                <div class="row">
                    <div class="col-sm-6">
                         <label for="phone">Phone</label><br>
                        <input type="text" name="phone"  class="form-control"><br>
                    </div>

                    <div class="col-sm-6">
                        <label for="date">Date</label><br>
                        <input type="date" name="date" class="form-control" required><br>
                    </div>
            </div>

        <div class="row">
            <div class="col-sm-6 mt-2">
                <button class="btn btn-outline-success " type="submit" name="submit"><i class="pr-1 fas fa-donate"></i>Submit Order</button>
            </div>

            <div class="col-sm-6">
               <a href="order.php" class="btn btn-outline-danger "><i class="pl-2 fas fa-arrow-left"></i>Cancel Order</a>
            </div>

        </div>
        

            </form>
        </div>
        </div>
   
<?php include('footer.php'); ?>
      
    </body>

</html>