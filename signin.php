<?php
    include("db.php");
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="loginstyle.css">

        <title>
            Hayas Veyl Signin
        </title>
    </head>
    <body>
        <div class="container">
        <img class="img" src="logo.jpg" width="250px" height="100px">
            <p class="login-text1">Sign In to Hayas Veyl </p>
            <!-- <div class ="login-social">
                <a href="#"class="fb"><i class="fa fa-facebook"></i>facebook</a>
                <a href="#" class="google"><i class="fa fa-google"></i>google</a>
            </div> -->
            <form class="login-email" action="signin.php" method="GET">
                <!-- <p class="login-text1">---------------OR--------------</p> -->
                <div class="input-group">
                    <input type = "text" name="name" id="name" placeholder="Name" required > 
                </div>
                <div class="input-group">
                    <input type="email" name="email"id="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password"id="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <input type="text" name="country" id="country"placeholder="Country" required>
                </div>
                
                <div class="input-group">
                    <button class="btn" name="btn" id="btn"href="login.php" onclick="return validateform();">  Signin</button>
                </div>
            </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    function validateform()
    {
        var a=document.getElementById('name').value;
        var b=document.getElementById('email').value;
        var c=document.getElementById('password').value;
        var d=document.getElementById('country').value;

        if(a==""||b==""||c==""||d=="")
        {
            alert(" should not be empty");
            return false;
        }
        if(c.length<6||c.length>10)
        {
            alert("Password must be between 6 to 10 characters");
            return false;
        }
    }
    

    }
</script>
    </body>
</html>

<?php
    if(isset($_GET['btn'])){
        $name=$_GET['name'];
        $email=$_GET['email'];
        $password=$_GET['password'];
        $country=$_GET['country'];

        $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country)
        values('$name','$email','$password','$country')";

        $run_customers = mysqli_query($con,$insert_customer);

        if($run_customers){
            echo "<script>alert('Successfully entered.')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
    }
?>