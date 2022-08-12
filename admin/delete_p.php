<?php

    include("db.php");
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="DELETE FROM `products` WHERE product_id=$id";
        $result=mysqli_query($con,$sql);
        if($result){

            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('adminindex.php?manage','_self')</script>";
            
        }
        else{
            die(mysqli_error($con));
        }
    }


?>