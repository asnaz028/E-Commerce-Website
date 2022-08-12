<?php 

	$conn=new mysqli("localhost","root","","plaza_tech_company");
    if($conn->connect_error){
    	die("connection Failed".$conn->connect_error);
    }

     
 ?>