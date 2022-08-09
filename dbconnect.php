<?php
$host="localhost";
$user="root";
$pass="";
$db_name="ems";
$port=3306;

$conn=new mysqli($host,$user,$pass,$db_name,$port);

if($conn->connect_error)
{
	die("Not connnected");
}/*
else{
	echo "successfully";
}*/
?>