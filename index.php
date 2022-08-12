<?php// require('top.php')?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Plazatech</title>
      
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

<script src="https://kit.fontawesome.com/fb498ff42a.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />-->
 
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="./product_css.css">
 
<link href = "css/jquery-ui.css" rel = "stylesheet">
 </head>
 <body>
 <?php require('top.php')?> 
  
<div class="body__overlay"></div>
 
  
   
 
<div class="container" id="slider">
       
       <div class="col-md-12">
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel">
               
               <ol class="carousel-indicators">
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
             
                   
               </ol>
               
               <div class="carousel-inner">
                  
                  <?php 
                   
                   $get_slides = "select * from slider LIMIT 0,1";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item active'>
                       
                       <img src='$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   $get_slides = "select * from slider LIMIT 1,3";
                   
                   $run_slides = mysqli_query($con,$get_slides);
                   
                   while($row_slides=mysqli_fetch_array($run_slides)){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       
                       echo "
                       
                       <div class='item'>
                       
                       <img src='$slide_image'>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>
                   
               </div>
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a>
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next">
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a>
               
           </div>
           
       </div>
       
   </div>

   <div id="hot"> 
       
       <div class="box"> 
           
           <div class="container"> 
               
               <div class="col-md-12"> 
                   
                   <h2>
                       Our Latest Products
                   </h2>
                   
               </div> 
               
           </div> 
           
       </div> 
       
   </div> 
        <!-- Start Category Area -->

        <div class="row filter_data">
			<?php 
            	   $sql="SELECT * FROM products order by product_id desc";
            	   $result=$conn->query($sql);
            	   while($row=$result->fetch_assoc()){
            	 ?>
            	 <div class="col-md-3 mb-2 ">
				 <form action=""  class="form-submit" >
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
									<button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="far fa-heart"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <button type="submit"  class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fas fa-shopping-cart"></i></button> 
 
												    
							   </div> <!-- closes card-body -->
								 
            	 	</div> <!-- closes card -->
				 </form>
				 
            	 </div> <!-- closes col-md3 mb-2 -->
				 
				 <?php } ?>
				   	 
            </div> <!--closes filter data-->
        <!-- End Category Area -->
      
		<input type="hidden" id="quantity" value="1"/>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

 <script type="text/javascript">

$(document).ready(function(){

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
                window.scrollTo(0, 0);
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
});
   </script>
<?php require('footer.php')?>        
</body>
 </html>