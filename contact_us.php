<?php

require 'config.php';
/*$to       = 'plazatech2021@gmail.com'; 
$subject  = 'Testing sendmail.exe';
$message  = 'Hi, you just received an email using sendmail!';
$headers  = 'From: asnaz028@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';
if(mail($to, $subject, $message, $headers))
    echo "Email sent";
else
    echo "Email sending failed";*/


   error_reporting(0);
   $msg="";

   if(isset($_POST['submit'])){
        $to = "plazatech2021@gmail.com";
        $subject="Form Submission";
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        $msgbody ='Name: '.$name.' has written you : ' .$message;
        $headers = 'From: '.$email. "\r\n" .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=utf-8';
        
        $secretkey ="6LclR_sbAAAAAKLYarfoeD6odQRLLJ24o4mW3k_w";
        $responsekey =$_POST['g-recaptcha-response'];

        $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsekey";

        $response = file_get_contents($url);
        
        $response = json_decode($response);

        if($response->success){
          
            if(mail($to,$subject,$msgbody,$headers)){

                $msg="<script>swal('Succesful!', 'Message sent Successfully', 'success');</script>";
                 
                
            }
            else{
                $msg ="<script>swal('Alert!'', 'Failed to send message!', 'warning');</script>";
                
            }
        }
        else{
            $msg="<script>swal('Alert!', 'ReCaptcha verification failed', 'warning');</script>";
          //  header('location:contact_us.php');
        }
        
   }




?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Plaza tech company</title>
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./contact_style.css">
    <link rel="stylesheet" type="text/css" href="./product_css.css">
    <script src="https://kit.fontawesome.com/fb498ff42a.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
  <?php require('top.php')?>
   <script>
     
   </script>

  <!-- <section class="contact py-5">-->
    	<div class="container py-5">
            <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST" >
    		<div class="row">
    			<div class="col-lg-7 mx-auto">
    				<div class="card">
    					<div class="cardbody">
                <div class="row pb-3">
                  <div class="col-lg-12">
                     <div class="head text-center text-white py-2">
                       
                       <h3>Contact Us</h3>

                     </div>
                   </div>   
                </div>
                <div class="row pt-2">
                  <div class="col-lg-5">
                    <div class="row px-3">
                      <div col-lg-2>
                           <i class="fas fa-phone-volume"></i>
                      </div>
                      <div class="col-lg-10">
                        <h6 class="font-weight-bold pt-2">Give us a ring</h6>
                      </div>
                    </div>
                  </div>
                   <div class="offset-1 col-lg-6">
                    <div class="row px-3">
                      <div col-lg-2>
                          <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div class="col-lg-10">
                        <h6 class="font-weight-bold pt-2"> Find us at the office</h6>
                      </div>
                    </div> 
                  </div>
                </div>

                <div class="row">
                   <div class="offset-1 col-lg-4">
                     <p>Hotline: <br>
                        +94770075358<br>
                        Mon-fri,8.00-22.00
                     </p>
                   </div>
                    <div class="offset-2 col-lg-5 pl-4">
                     <p> No 198 old tangallle road<br>
                        Matara<br>
                        Srilanka
                     </p>
                   </div>
                   
                </div>

                <div class="form p-1">
                   <div class="row my-4">
                      <div class="col-lg-6">
                         <input type="text" class="effect-1" name="name" placeholder="Full Name" required="">
                         <span class="focus-border"></span>
                      </div>
                      <div class="col-lg-6">
                         <input type="email" class="effect-1" name="email" placeholder="Your Email" required="">
                         <span class="focus-border"></span>
                      </div>
                      
                   </div>
                   <div class="row pt-2">
                      <div class="col-lg-12">
                        <textarea style="background-color:white;" name="message"  rows="4" class="effect-1" placeholder="Enter Your Message " required></textarea>
                      <!-- <input type="text" class="effect-1" placeholder="Your Message">-->
                        <span class="focus-border"></span>                       
                      </div>
                   </div>

                   <div class="row pt-3">
                     <div class="col-lg-6">
                      <div class="g-recaptcha" data-sitekey="6LclR_sbAAAAAHPCJ78FG_wDDUU8xOX8BYkp2flw" required></div>
                      
                     </div>
                     <div class="offset-2 col-lg-4 ">
                     <!--  <input type="submit" value="Send" name="submit" class="btn1">-->
                     <button type="submit" name="submit" class="btn1">Send Message</button>
                      
                     </div>
                  </div>
                  <div class="form-group">
                      <h4 class="text-success text-center"><?= $msg; ?></h4>
                  </div>
                  <script>
                    
                  </script>
                </div>
    						   					
    			  	</div> 
            	</div> 

    		</div>
           
    	</div>
        </form>
      </div>
  <!--</section>-->




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

   

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
 
  <script src="js/jquery-1.10.2.min.js"></script> 
<script src="js/jquery-ui.js"></script>
 

   <!-- jQuery library -->
 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
 <!-- Latest compiled JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->

  <script type="text/javascript">

    $(document).ready(function(){


      load_wishlist_item_number();
    function load_wishlist_item_number() {
			$.ajax({
			  url: 'action.php',
			  method: 'get',
			  data: {
				wishItem: "wish_item"
			  },
			  success: function(response) {
				$("#wish-item").html(response);
			  }
			});
		  }


      load_cart_item_number();

function load_cart_item_number() {
    $.ajax({
      url: 'action.php',
      method: 'get',
      data: {
        cartItem: "cart_item"
      },
      success: function(response) {
        $("#cart-item").html(response);
      }
    });
  }
    });
    </script>
    <?php require('footer.php')?> 
  </body>
</html>






 