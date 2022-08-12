<?php
	 
	//session_start();
	require 'config.php';
	 
	if (isset($_POST['post'])) {
		//echo "<script>alert( 'helo')</script>";
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
                      echo  "Item added to your cart!";
                                   
    } else {
     /* echo '<div class="alert alert-danger alert-dismissible mt-2">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Item already added to your cart!</strong>
                      </div>';*/
                      echo  "Item already added to your cart!";
    }
	  }
	
/*	if(isset($_POST['add'])){
		//print_r($_POST['product_id']);
		 
		if (isset($_SESSION['cart'])) {
           // $product_id= $row['product_id'] ;
			$item_array_id=array_column($_SESSION['cart'],"product_id");
			 
			if (in_array($_POST['product_id'],$item_array_id)) {      //if this product id is in  this item_array_id then execute this
				echo "<script>alert('product is already added in the cart....')</script>";
				echo "<script>window.location=index1.php</script>";
			}else {
				$count=count($_SESSION['cart']);
				$item_array=array(
					'product_id'=>$_POST['product_id']
			);
			$_SESSION['cart'][$count]=$item_array;
			}
		}else {
			$item_array=array(
				'product_id'=>$_POST['product_id']
			);
			//create new session
			$_SESSION['cart'][0]=$item_array;  //store the above array in the zero index of this
		//	echo($_SESSION['cart']); 
		}
		

	} 
 */

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Products</title>
	<!-- Latest compiled and minified CSS -->
 
<!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

<script src="https://kit.fontawesome.com/fb498ff42a.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="./product_css.css">
 
<link href = "css/jquery-ui.css" rel = "stylesheet">
<style>
#loader
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
 
</style>

</head>
<body>

 
<?php require('top.php')?>

	 

  <div class="container-fluid">
	  <div id="message"></div>
  	 <div class="row">
  	 	<div class="col-lg-3">
  	 		<h5>Filter Product</h5>
  	 		<hr>
			   <h6 class="text-info">Select Category</h6>
  	 		<ul class="list-group">
  	 			<?php
  	 			$sql="SELECT DISTINCT category FROM products ORDER BY product_id DESC";
  	 			$result=$conn->query($sql);
  	 			while($row=$result->fetch_assoc()){
  	 			?>
  	 			<li class="list-group-item">

  	 				<div class="form-check">
  	 					<label class="form-check-label">
  	 						<input type="checkbox" class="form-check-input common_selector category" value="<?=$row['category']; ?>" ><?= $row['category']; ?>
  	 					</label>
  	 				</div>
  	 			</li>
  	 		     <?php } ?>
  	 		</ul>
			   <br>
  	 		<h6 class="text-info">Select Brand</h6>
  	 		<ul class="list-group">
  	 			<?php
  	 			$sql="SELECT DISTINCT brand FROM products ORDER BY product_id DESC";
  	 			$result=$conn->query($sql);
  	 			while($row=$result->fetch_assoc()){
  	 			?>
  	 			<li class="list-group-item">
  	 				<div class="form-check">
  	 					<label class="form-check-label">
  	 						<input type="checkbox" class="form-check-input common_selector brand" value="<?=$row['brand']; ?>" ><?= $row['brand']; ?>
  	 					</label>
  	 				</div>
  	 			</li>
  	 		     <?php } ?>
					<br>
  	 		</ul>
		  <h6 class="text-info">Select Price</h6>
  	 		<ul class="list-group">
			   <input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">500 - 65000</p>
                    <div id="price_range"></div>
		    </ul>
  	 	</div>
  		<div class=" col-lg-9">
  	 		<h5 class="text-center" id="textchange">All Products</h5>
  	 		<hr>
  	 		<div class="text-center">
  	 			<img src="loader.gif" id="loader" width="200" style="display:none" >
  	 		</div> 
			   

		  <div class="row filter_data">
			<?php 
            	   $sql="SELECT * FROM products";
            	   $result=$conn->query($sql);
            	   while($row=$result->fetch_assoc()){
            	 ?>
            	 <div class="col-md-3 mb-2 ">
				 <form action=""  class="form-submit"  >
            	 	<div class="card" style="height:100%" >
            	 		 
            	 		<a href='single.php?id=<?php echo  $row["product_id"] ?>'>	<img src="<?= $row['product_image'] ?>" class="card-img-top" style="width:200px; height:200px;" ></a>
            	 			 
            	 			 <div class="card-body "> 
								  <h6  class="text-light bg-info text-center rounded p-1 card-title"> <?=$row['product_name'];	 ?></h6>
            	 				 	<p>
            	 				 		Brand : <?= $row['brand']; ?><br>
            	 				 		code : <?= $row['product_code']; ?><br>
            	 				 		Warranty:<?= $row['warranty']; ?><br><br>
									  <span class="text-danger"> Rs.<?= number_format($row['product_price'],2); ?> </span>

            	 				 	</p>
	            	 			 
                                    <input type="hidden" class="pid" value="<?= $row['product_id'] ?>" > 
									<input type="hidden" class="pname" value="<?= $row['product_name'] ?>" >  
									<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>" > 
									<input type="hidden" class="pqty" value="<?= $row['quantity'] ?>" > 
									<input type="hidden" class="pimage" value="<?= $row['product_image'] ?>" >
									<input type="hidden" class="pbrand" value="<?= $row['brand'] ?>" >
									<input type="hidden" class="pcode" value="<?= $row['product_code'] ?>" >
									<input type="hidden" class="pwarranty" value="<?= $row['warranty'] ?>" >
								<!--	<a  class="btn btn-info" name="add2" data-toggle="tooltip" data-placement="top" title="Add To Wishlist" href="wishlist.php?id=<?php echo $row['product_id']?>"  ><i class="far fa-heart"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
									<button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="far fa-heart"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <button type="submit" onclick="f1();" class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fas fa-shopping-cart"></i></button> 
 
												    
							   </div> <!-- closes card-body -->
								 
            	 	</div> <!-- closes card -->
				 </form>
				 
            	 </div> <!-- closes col-md3 mb-2 -->
				 
				 <?php } ?>
				   	 
            </div> <!--closes filter data-->
  	 		
  	 	</div>
  
  	 	</div>
  	 </div>
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
         
	  //	filter_data();
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
        url: 'action.php',
        method: 'post',
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

	$('.common_selector').click(function(){
		 
        filter_data();
		 
    });
		function filter_data(){
			
            $('.filter_data').html('<div id="loader" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
		var category = get_filter('category');
             
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand,category:category },
            success:function(data){
                $('.filter_data').html(data);
				 
            }
          });
		}
       
     function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
         
		 $('#price_range').slider({
        range:true,
        min:500,
        max:65000,
        values:[500, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
     });

});		//final closing
  </script>


<?php require('footer.php')?> 
  
</body>
</html>
 