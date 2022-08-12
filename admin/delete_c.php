<?php

    include("db.php");
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="DELETE FROM `users` WHERE id=$id";
        $result=mysqli_query($con,$sql);
        if($result){

            echo "<script>alert('Customer deleted successfully')</script>";
            echo "<script>window.open('adminindex.php?manage_customers','_self')</script>";
            
        }
        else{
            die(mysqli_error($con));
        }
    }


?>