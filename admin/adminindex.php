<?php 

    session_start();
    include("db.php");
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('adminlogin.php','_self')</script>";
        
    }else{
     
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PlazaTech Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="adminstyle.css">
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
                
                <?php
                
                 if(isset($_GET['manage'])){
                    
                     include("admincrud.php");
                 }
                 if(isset($_GET['manage_orders'])){
                    
                    include("manage_orders.php");
                   
            }
            if(isset($_GET['manage_customers'])){
                    
                include("manage_customers.php");
               
        }

                 if(isset($_GET['adminpic'])){
                    
                    include("adminpanel.php");
                }

                   if(isset($_GET['insert_slide'])){
                    
                     include("insert_slide.php");
                    }
                    
              if(isset($_GET['view_slides'])){
                    
                include("view_slides.php");
                    
             }   if(isset($_GET['delete_slide'])){
                    
                     include("delete_slide.php");
                    
             }   if(isset($_GET['edit_slide'])){
                    
                     include("edit_slide.php");
                    
             }

             if(isset($_GET['customer_report'])){
                    
                include("customer_report.php");
               
        }
        if(isset($_GET['product_report'])){
                    
            include("product_report.php");
           
    }
    if(isset($_GET['order_report'])){
                    
        include("order_report.php");
       
}
                    
    if(isset($_POST['logout'])){
    include('adminlogout.php');
    
}


                
                ?>


                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>        
</body>
</html>


<?php  ?>