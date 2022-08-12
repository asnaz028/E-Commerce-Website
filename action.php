 
 
<?php
session_start();
 
require 'config.php';
    if(isset($_POST['action'])){

      

        $sql="SELECT * FROM products WHERE quantity=1 ";

        if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
      {
        $sql .= "
         AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
        ";
      }

        if(isset($_POST['category'])){
             
            $category = implode("','",$_POST['category']);
            $sql .="AND category IN('".$category."')";
        }
        
        if(isset($_POST['brand'])){
            $brand=implode("','",$_POST['brand']);
            $sql .="AND brand IN ('".$brand."')";
        }

    

    $result= $conn->query($sql);
    $output='';

    if($result->num_rows>0 ){
        while($row=$result->fetch_assoc()){
            $output .=' <div class="col-md-3 mb-2 ">
            <form action=""  class="form-submit">
                    <div class="card" style="height:100%" >
                      <!--<div class="card border-secondary ">	 -->
                       <!-- <img src="'. $row['product_image'] .'" class="card-img-top" style="width:200px; height:200px;" >-->
                        <a href="single.php?id=   '.$row["product_id"] .'">	<img src="'. $row['product_image'] .'" class="card-img-top" style="width:200px; height:200px;" ></a>
                         <div class="card-body "> 
                     <h6  class="text-light bg-info text-center rounded p-1 card-title"> '.$row['product_name'].'	 </h6>
                             <p>
                               Brand : '. $row['brand'].'<br>
                               code : '. $row['product_code'].'<br>
                               Warranty:'. $row['warranty'].'<br><br>
                       <span class="text-danger"> Rs.'.$row['product_price'].',00</span>
   
                             </p>
                           
                                       <input type="hidden" class="pid" value="'. $row['product_id'].'" > 
                     <input type="hidden" class="pname" value="'.$row['product_name'] .'" >  
                     <input type="hidden" class="pprice" value="'.$row['product_price'] .' " > 
                     <input type="hidden" class="pqty" value="'.$row['quantity'] .'" > 
                     <input type="hidden" class="pimage" value="'.$row['product_image'].' " >
                     <input type="hidden" class="pbrand" value="'. $row['brand'] .' " >
                     <input type="hidden" class="pcode" value="'.$row['product_code'] .' " >
                     <input type="hidden" class="pwarranty" value=" '.$row['warranty'] .'" > 
                       

                  <button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="far fa-heart"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit"   class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fas fa-shopping-cart"></i></button> 
   
                 <!-- <button id="submit" name="post" class="btn btn-info addItemBtn" type="submit"  >submit</button>-->
                    </div> <!-- closes card-body -->
                    
                    </div> <!-- closes card -->
              </form>
            
                  </div> <!-- closes col-md3 mb-2 --> 
                  
                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script>
                  	$(".addItemBtn").click(function(e) {
			 
                    e.preventDefault();
                    
                    var $form = $(this).closest(".form-submit");
                    var pid = $form.find(".pid").val();
                    var pname = $form.find(".pname").val(); 
                    var pprice = $form.find(".pprice").val();
                  var pqty = $form.find(".pqty").val();
                    var pimage = $form.find(".pimage").val();
                    var pbrand = $form.find(".pbrand").val();
                  var pcode = $form.find(".pcode").val();  
                  var pwarranty = $form.find(".pwarranty").val();
                     
                    
                    $.ajax({
                      url: "action.php",
                      method: "post",
                      data: {
                        pid: pid,
                        pname: pname,
                        pprice: pprice,
                        pqty: pqty,
                        pimage: pimage,
                        pbrand: pbrand,
                    pcode: pcode,
                    pwarranty:pwarranty,
              
                      },
                      success: function(response) {
                    swal("Alert!",response,"info");
                       // $("#message").html(response);
                       // window.scrollTo(0, 0);
                        load_cart_item_number();
                      }
                    });
                
                });
               
                $(".add2").click(function(e) {
                  e.preventDefault();
              var $form = $(this).closest(".form-submit");
                  var p_id = $form.find(".pid").val();
             
              $.ajax({
                  url: "action.php",
                  method: "post",
              data: {p_id:p_id },
              success: function(response) {
                      if(!$.trim(response)){
                   
                  swal("Please login !", "To view wishlist...", "info")
                     .then((value) => {
                      window.location.href="login.php";
                     });
                }
                else{
                  swal("Alert!",response,"info")
                         .then((value) => {
                         window.location.href="show_wishlist.php";
                     });
                }
                 
                }
                   // window.scrollTo(0, 0);
                    
              });
              });
               
              load_wishlist_item_number();
    function load_wishlist_item_number() {
			$.ajax({
			  url: "action.php",
			  method: "get",
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
        url: "action.php",
        method: "get",
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }

              </script> ';
            
        }
         
         
    }
    else
    {
        $output = "<h3>No Products  Found!</h3>";
    }
    echo $output;
     
  }

  if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pbrand = $_POST['pbrand'];
    $pcode = $_POST['pcode'];
    $pwarranty = $_POST['pwarranty'];
    $pqty = $_POST['pqty'];
   // $total_price = $pprice * $pqty;

    $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
   // $code = $r['product_code'] ?? '';
    $code = $r['product_code'];
    if (!$code) {
      $query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,brand,warranty,product_code) VALUES (?,?,?,?,?,?,?,?)");
      $query->bind_param("sssissss",$pname,$pprice,$pimage,$pqty,$pprice,$pbrand,$pwarranty,$pcode);
      $query->execute();

      /*echo '<div class="alert alert-success alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Item added to your cart!</strong>
                      </div>';*/
                      $m1="Item added to your cart!";
                      echo   $m1;
                                   
    } else {
     /* echo '<div class="alert alert-danger alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Item already added to your cart!</strong>
                      </div>';*/
                      echo  "Item already Exist  in  your cart!";
    }
  }

   
  if (isset($_GET['remove1'])) {
	  $id = $_GET['remove1'];

	  $stmt = $conn->prepare("DELETE FROM wishlist WHERE id=?");
	  $stmt->bind_param("i",$id);
	  $stmt->execute();

	   
	  header('location:show_wishlist.php');
	} 
  if (isset($_POST['wishid'])) {
    $id = $_POST['wishid'];
    $stmt = $conn->prepare("DELETE FROM wishlist WHERE id=?");
	  $stmt->bind_param("i",$id);
	  $stmt->execute();
  }

 /* if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	  $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
	  $stmt->bind_param("i",$id);
	  $stmt->execute();

	   
	  header('location:cart.php');
	} */
  if (isset($_POST['cartid'])) {

    $id = $_POST['cartid'];

    $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
	  $stmt->bind_param("i",$id);
	  $stmt->execute();
  }
  if (isset($_POST['qty'])) {
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];

    $tprice = $qty * $pprice;

    $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
    $stmt->bind_param('isi',$qty,$tprice,$pid);
    $stmt->execute();
  }
  
  // Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
        $stmt = $conn->prepare("SELECT * FROM cart");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
  
        echo $rows;
      }

      if (isset($_GET['wishItem']) && isset($_GET['wishItem']) == 'wish_item') {
        $stmt = $conn->prepare("SELECT * FROM wishlist");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;
  
        echo $rows;
      }   

      if (isset($_POST['action1']) && isset($_POST['action1']) == 'order') {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $zip=$_POST['zip'];
        $date=$_POST['date'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $pmode = "Cash On Delivary";
   
    
        $data1 = '';   
         $stmt = $conn->prepare('INSERT INTO orders (firstname,lastname,phone,email,address,country,city,zip,date_time,products,pmode,amount_paid)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('ssssssssssss',$fname,$lname,$phone,$email,$address,$country,$city,$zip,$date,$products,$pmode,$grand_total);
        $stmt->execute();
        $stmt2 = $conn->prepare('DELETE FROM cart');
        $stmt2->execute();
        $data1 .= '
        <div class="border border-dark">
        <div class="text-center border-dark">
        <h1 class="display-4 mt-2 text-info">Thank You!</h1>
        <h2 class="text-info">Your Order Placed Successfully!</h2>
        <h4 class=" text-dark rounded p-2">Items Purchased : ' . $products . '</h4>
        <h4>Your Name : ' . $fname . ' '.$lname.'</h4>
        <h4>Your E-mail : ' . $email . '</h4>
        <h4>Your Phone : ' . $phone . '</h4>
 
                    <h4>Payment Mode :  Cash On Delivary </h4><br><br><br>
                  </div>
                  </div><br><br><br>';
         echo $data1;
      
         
        
      } //closing isset


      if (isset($_POST['action2']) && isset($_POST['action2']) == 'order') {
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $country=$_POST['country'];
        $city=$_POST['city'];
        $zip=$_POST['zip'];
        $date=$_POST['date'];
        $products = $_POST['products'];
        $grand_total = $_POST['grand_total'];
        $pmode = "Card Payment";
   
    
        $data1 = '';   
          $stmt = $conn->prepare('INSERT INTO orders (firstname,lastname,phone,email,address,country,city,zip,date_time,products,pmode,amount_paid)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param('ssssssssssss',$fname,$lname,$phone,$email,$address,$country,$city,$zip,$date,$products,$pmode,$grand_total);
        $stmt->execute();
        $stmt2 = $conn->prepare('DELETE FROM cart');
        $stmt2->execute();
        $data1 .= '<div class="border border-dark">
                    <div class="text-center">
                    <h1 class="display-4 mt-2 text-info">Thank You!</h1>
                    <h2 class="text-info">Your Order Placed Successfully!</h2>
                    <h4 class=" text-dark rounded p-2">Items Purchased : ' . $products . '</h4>
                    <h4>Your Name : ' . $fname . ' '.$lname.'</h4>
                    <h4>Your E-mail : ' . $email . '</h4>
                    <h4>Your Phone : ' . $phone . '</h4>
                    <h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
                    <h4>Payment Mode : Card Payment </h4><br><br><br>
                  </div>
                  </div><br><br><br>';
         echo $data1;
        
         
        
      } //closing 
      

      if(isset($_POST['p_id'])) {

        if(isset($_SESSION['USER_LOGIN']))
      {

        $c_id=$_SESSION['USER_ID'];
   
       $p_id=$_POST['p_id'];
    
       $sql_check="SELECT * FROM wishlist WHERE pid=$p_id AND uid=$c_id";
       $result_check=mysqli_query($conn,$sql_check);

       if(mysqli_num_rows($result_check)==1){
     //   header('location:index1.php');
        //$out="<script>  swal('Already Exist!', 'The item already added in your wishlist!', 'warning');</script> ";
        $out="The item already Exist in your wishlist!";
       echo  $out;
     //  header('location:index1.php');
      }else if(mysqli_num_rows($result_check)==0){
        
        $insertwishlist="INSERT INTO wishlist(pid,uid) VALUES ('$p_id','$c_id') ";
      
         
       if(mysqli_query($conn,$insertwishlist)){
      //  header('location:show_wishlist.php');
        $out="Succesfully The item  added in your wishlist! ";
        echo  $out;
        }
    }
  
  }  
      }

      //from single.php

      if(isset($_POST['p_i_d'])) {
      if(isset($_SESSION['USER_LOGIN']))
      {
       // $p_i_d=$_POST['p_i_d'];
       // echo  $p_i_d;
       $c_id=$_SESSION['USER_ID'];
       echo  $c_id;

      }

      }
      
      //from cart.php
      if(isset($_POST['payid'])) {
        if(isset($_SESSION['USER_LOGIN']))
        {
         // $p_i_d=$_POST['p_i_d'];
         // echo  $p_i_d;
         $c_id=$_SESSION['USER_ID'];
         echo  $c_id;
  
        }
  
        }

        if(isset($_POST['creditpayid'])) {
          if(isset($_SESSION['USER_LOGIN']))
          {
           // $p_i_d=$_POST['p_i_d'];
           // echo  $p_i_d;
           $c_id=$_SESSION['USER_ID'];
           echo  $c_id;
    
          }
    
          }

?>

 