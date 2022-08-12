<?php 
    session_start();
    include("db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PlazaTech Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="adminlogin.css">
    
</head>
<body style="background-color:green">
   
   <div class="container"><!-- container begin -->
       <form action="" class="form-login" method="POST"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Name" name="admin_name" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->
    
</body>
</html>


<?php 

    if(isset($_POST['admin_login'])){
        
        $name=$_POST['admin_name'];
        $pass=$_POST['admin_pass'];

        $query = "select *  from admins where admin_name='$name' AND admin_pass='$pass'";
        
        $result = mysqli_query($con,$query);
        
        if(mysqli_num_rows($result)==1){
       
            $_SESSION['admin_name']=$_POST['admin_name'];
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('adminindex.php?products','_self')</script>";
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>"; 
        }
        
    }

?>
