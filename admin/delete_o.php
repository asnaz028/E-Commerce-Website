<?php

    include("db.php");
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="DELETE FROM `orders` WHERE id=$id";
        $result=mysqli_query($con,$sql);
        if($result){

            echo "<script>alert('Order deleted successfully')</script>";
            echo "<script>window.open('adminindex.php?manage_orders','_self')</script>";
            
        }
        else{
            die(mysqli_error($con));
        }
    }


?>