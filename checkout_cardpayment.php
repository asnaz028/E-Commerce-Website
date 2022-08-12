<?php
  require 'config.php';
   
  $grand_total = 0;
  $allItems = '';
  $items = [];

  $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  while ($row = $result->fetch_assoc()) {
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
  }
   
  $allItems = implode(', ', $items); //to get in single string
  
  
   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
   <!-- <link rel="stylesheet" href="css/bootstrap.css">-->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/fb498ff42a.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    
</style>
<body>
<?php require('top.php')?>
<?php if(isset($_SESSION['USER_LOGIN']))

{
   
?>
<br>
<br>
    <div class="container" id="order">
    
        <div class="row" >
        <div class="col-6">
        <h5>Billing Address</h5>
               <form action="" method="POST" id="placeOrder">
                   <input type="hidden" name="products" value="<?= $allItems; ?>">
                   <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                    <div class="row">
                        <div class="col-6">
                            <br>
                            <label class="form-label" for="firstname"><i class="fa fa-user"></i> First Name</label>
                            <input type="text" id="firstname" class="form-control" name="firstname" required="">
                        </div>

                        <div class="col-6">
                            <br>
                            <label class="form-label" for="lastname" ><i class="fa fa-user"></i> Last Name</label>
                            <input type="text" id="laststname" class="form-control" name="lastname" required="">
                            <br>
                        </div>
                        <br>
                        <div class="col-6">
                            <label for="username" class="form-label"><i class="fas fa-phone" ></i> Phone</label>
                            <div class="input-group">
                                
                                <input type="tel" class="form-control"  name="phone" pattern="[0-9]{3}[0-9]{7}" required="">
                                
                            </div>
                            <br>
                        </div>
                         
                        <div class="col-6">
                            <label class="form-label" for="email"><i class="fa fa-envelope"></i> Email
                                <span class="text-muted">(optional)</span>
                            </label>
                            <input type="email" id="email" class="form-control" name="email"  required="">
                            <br>
                        </div>
                        <br>
                        <div class="col-6">
                            <label class="form-label" for="address"><i class="far fa-address-card"></i> Address</label>
                            <input type="text" id="address" class="form-control" name="address" required="">
                            <br>
                        </div>
                        <br>
                        <div class="col-6">
                             <label class="form-label" for="country">Country</label>
                             <input type="text" id="country" class="form-control" name="country" required="">

                        </div>
                        
                        <div class="col-4">
                            <label class="form-label" for="state">City</label>
                            <input type="text" id="city" class="form-control" name="city" required="">

                        </div>
                        <div class="col-4">
                            <label class="form-label" for="zip"  >Zip</label>
                            <input type="text" id="zip" class="form-control" name="zip" required="">
                            <br>
                        </div> 
                        <div class="col-4">
                            <label class="form-label" for="date"  >Date & time</label>
                            <input type="datetime-local" id="date" class="form-control" name="date" required="">
                            <br>
                        </div> 
                        <br>
                         
                          
                    </div>
                    
                    
                
          <!--  closin of col 8 -->

              
                    
                    
             
       <!--  </div> -closing of 1st col-6 -->        
        <div class="col-2">

        </div>
                 <!--  closin of col 8 -->
            <br><br>
             <!--<div class="col-6">-->
             <h5>Card Details</h5>
              <br>
        <label for="fname">Accepted Card</label>
        <div class="icon-container">
               <i class="fa fa-cc-visa" style="color:navy;" ></i>
               <i class="fa fa-cc-amex" style="color:blue;" ></i>
               <i class="fa fa-cc-mastercard" style="color:red;" ></i>
               <i class="fa fa-cc-discover" style="color:orange;" ></i>
        </div>
        <br>
           <div class="form-check">
               <input type="radio" name="card" class="form-check-input" required>
               <label class="form-check-label">Credit Card</label>
           </div>
           <div class="form-check">
               <input type="radio" name="card" class="form-check-input">
               <label class="form-check-label">Debit Card</label>
           </div>
           <br>
           <div class="row">
               <div class="col-12">
                   <label class="form-label" for="cardname">Name on Card</label>
                   <input type="text" id="cardname" class=" form-control" required>
                   <small class="text-muted">Full name as displayed on card</small>
               </div>
               <br>

               <div class="col-12">
                   <label class="form-label" for="cc-number">Credit Card Number</label>
                   <input type="tel" id="cc-number" autocomplete="cc-number" placeholder=".... .... .... ...." class=" form-control cc-number" required>
               </div>
               <div class="col-6">
                   <label class="form-label" for="cc-exp">Expiration</label>
                   <input type="tel" id="cc-exp" class=" form-control cc-exp" placeholder="../.." required>
               </div>
               <div class="col-6">
                   <label class="form-label" for="cc-cvv">CVV</label>
                   <input type="tell" id="cc-cvv" class=" form-control cc-cvv" placeholder="..." required>
                   <br>
               </div>
               
              <br>
               
           </div> <!--closing of row in card details -->
           
             </div> <!--closing of col -6 -->
             <div class="col-2">

           </div>
            <div class="col-4" style="border: 1px;">
                <h4 class="d-flex justify-content-between align-item-center">
                    <span class="text-muted">Your Cart </span>
                    <span id="cart-item" class="badge badge-light" style="color:black;"><i class="fa fa-shopping-cart"></i></span>

                </h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6 >Products</h6>
                            <span class="text-muted"><?= $allItems; ?></span>
                        </div>
                        <span class="text-muted"></span>
                    </li>

                     

                    <li class="list-group-item d-flex justify-content-between">
                        <div>
                            <h6>Total (Rs)</h6>
                           
                        </div>
                        <span class="text-muted"><?= $grand_total; ?></span>
                    </li>

                    
                </ul>
                <br>
                
                 
                <button type="submit" name="submit" class="btn btn-info btn-block">Confirm Your Payment</button>
                 
                </form>
            </div>
        </div>

        
    </div>  <!--closes container -->
    
  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
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

         $("#placeOrder").submit(function(e) {
           e.preventDefault();  //to stop page refresh
           $.ajax({
            url: 'action.php',
            method: 'post',
            data: $('form').serialize() + "&action2=order",
            success: function(response) {
            $("#order").html(response);
            }

          });
         });
          

         /* $(function($){
              $('.cc-number').payment('formatCardNumber');
              $('.cc-exp').payment('formatCardExpiry');
              $('.cc-cvv').payment('formatCardCVC');
              $('form').submit(function(e){
                  e.preventDefault();

                  var cartType=$.payment.cardType($('.cc-number').val());
                  $('.cc-number').toggleInputError(!$payment.validateCardNumber($(.cc-number).val()));
                  $('.cc-exp').toggleInputError(!$payment.validateCardExpiry($(.cc-exp).payment('cardExpiryVal')));
                  $('.cc-cvv').toggleInputError(!$payment.validateCardCVC($(.cc-cvv).val(),cardType));

                  $('.validation').removeClass('text-danger text-success');
                  $('.validation').addClass($('.has-error').length ? 'text-danger' :'text-success');

              });
              
          });*/
        
         }); //final closing
    </script>
    
    <?php require('footer.php')?> 
    <?php
		}else{
          echo "<script>
           swal('Please login !', 'To continue checkout...', 'info')
           .then((value) => {
            window.location.href='login.php';
           });
                  
                </script>";
			 
			}
	?>
</body>
</html>
