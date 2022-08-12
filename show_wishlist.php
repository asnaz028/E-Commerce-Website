<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wishlist</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

<script src="https://kit.fontawesome.com/fb498ff42a.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="./product_css.css">
 
<link href = "css/jquery-ui.css" rel = "stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <script>

  </script>
 
<?php require('top.php')?>
<?php if(isset($_SESSION['USER_LOGIN']))

{
   
?>
 

<script>
	
</script>
    <div class="container-fluid">

<div class="col-lg-12">
	<br>
<h5 class="text-center" id="textchange">My Wishlist</h5>
  	 		<hr>

<div class=" col-lg-9">
 
    <div class="row filter_data">
			<?php
                   $c_id = $_SESSION['USER_ID']; 
            	   $sql="SELECT * FROM wishlist JOIN products on products.product_id=wishlist.pid";
            	   $result=$conn->query($sql);
            	   while($row=$result->fetch_assoc()){
            	 ?>
            	 <div class="col-md-3 mb-2 ">
				 <form action=""  class="form-submit" >
            	 	<div class="card" style="height:100%" >
            	 		<!--<div class="card border-secondary ">	 -->
						 <input type="hidden"  class="wishid" value="<?= $row['id'] ?>" > 
            	 			<img src="<?= $row['product_image'] ?>" class="card-img-top" style="width:200px; height:200px;" >
            	 			 
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
								<!--	<a type="submit" data-toggle="tooltip" data-placement="top" title="Remove" href="action.php?remove1=<?= $row['id'] ?>" onclick="return confirm('Are you sure that you want to remove this item? ');" class="btn btn-info mx-2" name="remove1"><i class="fas fa-trash-alt"></i></a>-->
									<button type="submit"   class="btn btn-info remove" name="remove"><i class="fas fa-trash-alt"></i></button>
									<button type="submit"  class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fas fa-shopping-cart"></i></button> 
 
												    
							   </div> <!-- closes card-body -->
								 
            	 	</div> <!-- closes card -->
					 </form>
				 
            	 </div> <!-- closes col-md3 mb-2 -->
				 
				 <?php } ?>
				   	 
            </div> <!--closes filter data-->
	</div> <!--closes col lg 9-->

</div><!--closes col lg 12-->


    </div> <!--closes container-->

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
				load_cart_item_number();
			  }
			});
		
		});
		load_cart_item_number();

		load_wishlist_item_number();

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




     $(".remove").click(function(e) {
      
      e.preventDefault();
      
       
       var $form = $(this).closest(".form-submit");
      var wishid = $form.find(".wishid").val();
      swal({
  title: "Are you sure?",
  text: " that you want to remove this item? ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
        url: 'action.php',
        method: 'post',
		data: {wishid:wishid },
		success: function(response) {
       
      e.preventDefault();
      window.location.href='show_wishlist.php';
			 
		  }
         // window.scrollTo(0, 0);
          
		});

  } else {
    return false;
  }
});
       


    });



   });	   

  </script>

  <?php require('footer.php')?> 
  <?php
		}else{
          echo "<script>
           swal('Please login !', 'To view your wishlist...', 'info')
           .then((value) => {
            window.location.href='login.php';
           });
                  
                </script>";
			 
			}
	?>
 
</body>
</html>