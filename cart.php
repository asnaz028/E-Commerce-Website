 <?php
  
 require_once('config.php');
 //require('index1.php');

 

  



 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cart</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/fb498ff42a.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="./product_css.css">
 
 </head>
 <body class="bg-light">
 <?php require('top.php')?>
<div class="container-fluid">
    <div class="row px-5">
     <div class="col-md-7">
            <h6>My Cart</h6>
        <hr>
         <?php
          $grand_total=0;
         $total=0;   
       //  if(isset($_SESSION['cart'])){
         //   $product_id=array_column($_SESSION['cart'],'product_id');
            $sql="SELECT * FROM cart";
            $result=$conn->query($sql);
           // $result=$db->getData();
           
            while($row=$result->fetch_assoc()){
                
              //  foreach($product_id as $id) {
                    
                  // if ($row['product_id']==$id) {
                    ?>
                    <form action="cart.php " method="POST" class="cart_items">
                       <div class="border rounded">
                           <div class="row bg-white">
                               <div class="col-md-3 pl-0">
                               <input type="hidden"  class="pid" value="<?= $row['id'] ?>" > 
                                   <img src="<?= $row['product_image'] ?>" alt="image1" class="img-fluid">
                               </div>
                               <div class="col-md-6">
                                   <h5 class="pt-2"><?=$row['product_name']; ?></h5>
                                 <!--  <small class="text-secondary">seller:kettle</small>   
                                   <h5 class="pt-2">1200</h5>-->
                                   <p>
            	 				 		Brand : <?= $row['brand']; ?><br>
            	 				 		Model : <?= $row['product_code']; ?><br>
            	 				 		Warranty : <?= $row['warranty']; ?><br>
                                      <!--  Price : Rs.<?= number_format($row['product_price'],2); ?>  <br>-->
                                        Price : Rs.<?= $row['product_price']; ?>.00 <br>

            	 				 	</p>
                          <button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="far fa-heart"></i></button>
                                  <!-- <a type="submit" href="action.php?remove=<?= $row['id'] ?>" onclick="return confirm('Are you sure that you want to remove this item? ');" class="btn btn-info mx-2" name="remove">remove  <i class="fas fa-trash-alt"></i></a>-->
                                   
                                  <button type="submit"   class="btn btn-info remove" name="remove"><i class="fas fa-trash-alt"></i></button>
                                 <!-- <button type="submit"  class="btn btn-info mx-2 remove" data-toggle="tooltip" data-placement="top" title="Remove" name="remove"><i class="fas fa-trash-alt"></i></a>-->
                                   <br>
                               </div>
                               <div class="col-md-3 py-5">
                                   <input type="hidden" class="pprice" value="<?=$row['product_price']; ?>">
                                   <p style="padding:0;">Quantity</p>
                                 <!--  <input type="number" value="1" class="form-control  d-inline iquantity" onchange="subtotal()" min="1" max="100" style="width: 53px;" id="quantity" name="quantity"></input>-->
                                 <input type="number"  class="form-control itemQty" value="<?= $row['qty']; ?>" min="1" max="100" style="width: 75px;" id="quantity" name="quantity" ></input>
                                    
                                   
                                      <p class="total-price  text-danger">
                                          
                                       <!--  Rs.<span class="text-danger" id="itotal" name="data"><?= number_format($row['total_price'],2); ?></span>-->
                                          Rs.<span class="text-danger" id="itotal" name="data"><?=$row['total_price'];?>.00</span>
                                      </p> 
                                      
                                  
                               </div>

                               <!--calculate price with total-->                          
                           </div>
                            
                       </div>
                       
                
                     </form>
                 <?php 
                        $grand_total +=(int)$row['total_price'];
                   
                          
                        //    }//end of if 

                   //  }  //end of for each array

              } //end of while
          //  } //end of session if
        /*  else
            {
            echo "<h5>Cart is Empty </h5>";
            }   */

        ?>
        </div>
                             
    

        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>Price Details</h6>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                echo "<h6>Price </h6>";
                            }else{
                                echo "<h6>Price </h6>";
                            }   
                        ?>
                        <h6>Delivary Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                        <br>
                    </div>

                    <div class="col-md-6">
                        <h6>Rs.<?php echo $grand_total ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr> 
                        <h6 id="gtotal">Rs.<?php echo $grand_total ?> </h6>
                    </div>
                    
                    
                </div> <!--closing of price details tag -->
                
            </div>


            <div>
                 <h6 style=" text-decoration:underline;">Select Payment Method</h6>
                 <br>
                <a type="submit" class="btn btn-info btn-Block <?=($grand_total>1)?"":"disabled"; ?> pay" href="checkout.php"  >Cash on delivary</a>
                &nbsp; &nbsp;
                <a type="submit" class="btn btn-info btn-Block <?=($grand_total>1)?"":"disabled"; ?> paycredit" href="checkout_cardpayment.php"  >Card Payment</a>
                <br><br>
            </div>
        </div>
         
    </div>
</div>
      

<!--<script>
  /* var gt=0
   var iprice = document.getElementByClassName("iprice");
     var iprice = document.getElementById("iprice").value; //

   var iquantity = document.getElementByClassName("iquantity");
    var quantity = document.getElementById("quantity").value; //

   var itotal=  document.getElementByClassName("itotal");

   var gtotal=document.getElementById('gtotal');


   var itotal=0; */
                                   
    
          function subtotal()
          { 
                var iprice = document.getElementById("iprice").value;
                
               // var quantity = document.getElementById("quantity").value;
              //  var t=0; 
              //  var g=0;
              //  t=iprice*quantity;
                          
              //  document.getElementById("itotal").innerHTML=t;
                var gt=0;
               // gt=gt+t;
               // document.getElementById("gtotal").innerHTML=gt;
                           
            var i;
           for(i=0;i<iprice.length;i++){
            var quantity = document.getElementById("quantity").value;
             // itotal[i].innerText=(iprice[i].value)*(quantity[i].value);
              itotal[i]=(iprice[i])*(quantity[i]);
              document.getElementById("itotal").innerHTML=itotal[i];
             // gt=gt+(iprice[i].value)*(quantity[i].value);
              gt=gt+(iprice[i])*(quantity[i]);
           }
         //   gtotal.innerText=gt;                      
         document.getElementById("gtotal").innerHTML=gt;        
          }
         // subtotal();
                                  
</script>-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
     $(document).ready(function() {
        
// Change the item quantity
$(".itemQty").on('change', function() {
  var $el = $(this).closest('.cart_items');  //else pot form

  var pid = $el.find(".pid").val();
  var pprice = $el.find(".pprice").val();
  var qty = $el.find(".itemQty").val();
   
  location.reload(true);
  $.ajax({
    url: 'action.php',
    method: 'post',
    cache: false,
    data: {
      qty: qty,
      pid: pid,
      pprice: pprice
    },
    success: function(response) {
      console.log(response);
    }
    });
  });

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
  $(".add2").click(function(e) {
        e.preventDefault();
		var $form = $(this).closest(".form-submit");
        var p_id = $form.find(".pid").val();
	 
		$.ajax({
        url: 'action.php',
        method: 'post',
		data: {p_id:p_id },
		success: function(response) {
            if(!$.trim(response)){
				//window.location.href='login.php';
				swal('Please login !', 'To view wishlist...', 'info')
           .then((value) => {
            window.location.href='login.php';
           });
			}
			else{
				swal("Alert!",response,"info")
               .then((value) => {
               window.location.href='show_wishlist.php';
           });
			}
			 
		  }
         // window.scrollTo(0, 0);
          
		});

	  });
    
    $(".remove").click(function(e) {
      
      e.preventDefault();
      
       
       var $form = $(this).closest(".cart_items");
      var cartid = $form.find(".pid").val();
      swal({
  title: "Are you sure?",
  text: "that you want to remove this item? ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
        url: 'action.php',
        method: 'post',
		data: {cartid:cartid },
		success: function(response) {
       
      e.preventDefault();
      window.location.href='cart.php';
			 
		  }
         // window.scrollTo(0, 0);
          
		});

  } else {
    return false;
  }
});
       


    });
 
 $(".pay").click(function(e) {
  
  e.preventDefault();
		var $form = $(this).closest(".cart_items ");
        var payid = 1;
	 
		$.ajax({
        url: 'action.php',
        method: 'post',
		data: {payid:payid },
		success: function(response) {
            if(!$.trim(response)){
				//window.location.href='login.php';
				swal('Please login !', 'To proceed checkout...', 'info')
           .then((value) => {
            window.location.href='login.php';
           });
			}
			else{
				 
               window.location.href='checkout.php';
           
			}
			 
		  }
         // window.scrollTo(0, 0);
          
		});

 });
   

 $(".paycredit").click(function(e) {
  
  e.preventDefault();
		var $form = $(this).closest(".cart_items ");
        var creditpayid = 1;
	 
		$.ajax({
        url: 'action.php',
        method: 'post',
		data: {creditpayid:creditpayid },
		success: function(response) {
            if(!$.trim(response)){
				//window.location.href='login.php';
				swal('Please login !', 'To proceed checkout...', 'info')
           .then((value) => {
            window.location.href='login.php';
           });
			}
			else{
				 
               window.location.href='checkout_cardpayment.php';
           
			}
			 
		  }
         // window.scrollTo(0, 0);
          
		});

 });
    
 });
</script>



      <!-- jQuery library -->
 

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<?php require('footer.php')?> 
 </body>
 </html>