
<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="hidden" class="iprice" value="100">
<input type="number"  class="iquantity" oninput="subtotalnew()" value="1" min="1" max="100" style="width: 53px;" id="quantity" name="quantity"></input>
<br>
<table>
    <tr>
        <label for="">Total</label><br>
        <td class="itotal"></td>
    </tr>
    <tr>
        <label for="">gtotal</label> <br>
    <h6 id="gtotal"> </h6>
    </tr>
</table>
<script>
   var gt=0
   var iprice = document.getElementByClassName("iprice");
   var iquantity = document.getElementByClassName("iquantity");
   var itotal=  document.getElementByClassName("itotal");
   var gtotal=document.getElementById('gtotal');
   var itotal=0;
                                   
   
          function subtotalnew()
          {
             // alert('hello');
                                  
            gt=0;
            for(i=0;i<iprice.length;i++){

              itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
             
              gt=gt+(iprice[i].value)*(iquantity[i].value);
           }
            gtotal.innerText=gt;                          
                                       
          }
          subtotalnew();
                                  
</script>
</body>
</html>
<script>
                                   //setting default attribute to disabled of minus button
                                   document.querySelector(".minus-btn").setAttribute("disabled","disabled");
                                   
                                   //taking value to increment decrement input value
                                   var valuecount=0;

                                   //taking price value in variable
                                   var price = document.getElementById("price").innerText;
                                   
                                   //price calculation
                                   function priceTotal()
                                   {
                                       
                                      var   total = valuecount * price;
                                       document.getElementById("price").innerText = total
                                       //window.location.href="cart.php?final="+total;
                                   }
                                

                                   //plus button
                                   document.querySelector(".plus-btn").addEventListener("click",function()
                                   {
                                        //getting value of input
                                        valuecount = document.getElementById("quantity").value;

                                        //input value increment by 1

                                        valuecount ++;

                                        //SETTING INCREMENT INPUT VALUE
                                        document.getElementById("quantity").value=valuecount

                                        if(valuecount > 1){
                                            document.querySelector(".minus-btn").removeAttribute("disabled");
                                            document.querySelector(".minus-btn").classList.remove("disabled");
                                        }

                                        priceTotal()


                                   })

                                    //minus button
                                   document.querySelector(".minus-btn").addEventListener("click",function()
                                   {
                                        //getting value of input
                                        valuecount = document.getElementById("quantity").value;

                                        //input value increment by 1

                                        valuecount--;

                                        //SETTING INCREMENT INPUT VALUE
                                        document.getElementById("quantity").value=valuecount

                                        if(valuecount==1){
                                            document.querySelector(".minus-btn").setAttribute("disabled","disabled")
                                        }

                                        priceTotal()

                                   })

                                   
                               </script>



<div class="row" id="result">
			 
            	<?php 
            	   $sql="SELECT * FROM products";
            	   $result=$conn->query($sql);
            	   while($row=$result->fetch_assoc()){
            	 ?>
            	 <div class="col-md-3 mb-2 ">
				 <form action=""  class="form-submit" >
            	 	<div class="card" style="height:100%" >
            	 		<!--<div class="card border-secondary ">	 -->
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
							 <button type="submit" class="btn btn-info btn-block addItemBtn" name="add"  >Add to cart    <i class="fas fa-shopping-cart"></i></button> 
								<!--	<input type="hidden" name="product_id" value="<?= $row['product_id'] ?>" > -->

												    
							   </div> <!-- closes card-body -->
								 
            	 	</div> <!-- closes card -->
					 </form>
				 
            	 </div> <!-- closes col-md3 mb-2 -->
				 
				 <?php } ?>
				   	 
				 
            </div> <!--closes result id-->




            <div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								
							<!--	<li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $row['product_name']; ?></p>
							</div>
							
						 

							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
								<?php
									$revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$product_id";
									$revcountres = mysqli_query($conn, $revcountsql);
									$revcountr = mysqli_fetch_assoc($revcountres);

								 ?>
									<h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($row['name'], 0, 20); ?></h4>
									<ul class="comment-list">
									<?php 
										$selrevsql = "SELECT u.name, r.`timestamp`, r.review FROM reviews r JOIN users u WHERE r.uid=u.id AND r.pid=$product_id";
										$selrevres = mysqli_query($conn, $selrevsql);
										while($selrevr = mysqli_fetch_assoc($selrevres)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/blank.png" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
												<span>
												<em><?php echo $selrevr['timestamp']; ?></em>
												</span>
											</div>
										<!--	<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div> -->
											<p>
												<?php echo $selrevr['review']; ?>
											</p>
										</li>
									<?php } ?>
									</ul>
									<?php 
										$chkrevsql = "SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$chkrevres = mysqli_query($conn, $chkrevsql);
										$chkrevr = mysqli_fetch_assoc($chkrevres);
										if($chkrevr['reviewcount'] >= 1){
											echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form" method="post">
									<?php
										$usersql = "SELECT u.email, u.name FROM users u   WHERE   u.id=$uid";
										$userres = mysqli_query($conn, $usersql);
										$userr = mysqli_fetch_assoc($userres);
									 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['name'];   ?>" disabled>
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
											</div>
										</div>
									<!--	<div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="button btn-small">
										Submit Review
										</button>
									</form>
									<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div><!--closes review tab--><div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								
							<!--	<li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $row['product_name']; ?></p>
							</div>
							
						 

							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
								<?php
									$revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$product_id";
									$revcountres = mysqli_query($conn, $revcountsql);
									$revcountr = mysqli_fetch_assoc($revcountres);

								 ?>
									<h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($row['name'], 0, 20); ?></h4>
									<ul class="comment-list">
									<?php 
										$selrevsql = "SELECT u.name, r.`timestamp`, r.review FROM reviews r JOIN users u WHERE r.uid=u.id AND r.pid=$product_id";
										$selrevres = mysqli_query($conn, $selrevsql);
										while($selrevr = mysqli_fetch_assoc($selrevres)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/blank.png" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
												<span>
												<em><?php echo $selrevr['timestamp']; ?></em>
												</span>
											</div>
										<!--	<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div> -->
											<p>
												<?php echo $selrevr['review']; ?>
											</p>
										</li>
									<?php } ?>
									</ul>
									<?php 
										$chkrevsql = "SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$chkrevres = mysqli_query($conn, $chkrevsql);
										$chkrevr = mysqli_fetch_assoc($chkrevres);
										if($chkrevr['reviewcount'] >= 1){
											echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form" method="post">
									<?php
										$usersql = "SELECT u.email, u.name FROM users u   WHERE   u.id=$uid";
										$userres = mysqli_query($conn, $usersql);
										$userr = mysqli_fetch_assoc($userres);
									 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['name'];   ?>" disabled>
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
											</div>
										</div>
									<!--	<div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="button btn-small">
										Submit Review
										</button>
									</form>
									<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div><!--closes review tab--><div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								
							<!--	<li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $row['product_name']; ?></p>
							</div>
							
						 

							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
								<?php
									$revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$product_id";
									$revcountres = mysqli_query($conn, $revcountsql);
									$revcountr = mysqli_fetch_assoc($revcountres);

								 ?>
									<h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($row['name'], 0, 20); ?></h4>
									<ul class="comment-list">
									<?php 
										$selrevsql = "SELECT u.name, r.`timestamp`, r.review FROM reviews r JOIN users u WHERE r.uid=u.id AND r.pid=$product_id";
										$selrevres = mysqli_query($conn, $selrevsql);
										while($selrevr = mysqli_fetch_assoc($selrevres)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/blank.png" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
												<span>
												<em><?php echo $selrevr['timestamp']; ?></em>
												</span>
											</div>
										<!--	<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div> -->
											<p>
												<?php echo $selrevr['review']; ?>
											</p>
										</li>
									<?php } ?>
									</ul>
									<?php 
										$chkrevsql = "SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$chkrevres = mysqli_query($conn, $chkrevsql);
										$chkrevr = mysqli_fetch_assoc($chkrevres);
										if($chkrevr['reviewcount'] >= 1){
											echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form" method="post">
									<?php
										$usersql = "SELECT u.email, u.name FROM users u   WHERE   u.id=$uid";
										$userres = mysqli_query($conn, $usersql);
										$userr = mysqli_fetch_assoc($userres);
									 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['name'];   ?>" disabled>
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
											</div>
										</div>
									<!--	<div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="button btn-small">
										Submit Review
										</button>
									</form>
									<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div><!--closes review tab--><div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-6">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Overview</a>
								</li>
								
							<!--	<li class="col-md-4">
									<a aria-expanded="false" href="#mini-two" data-toggle="tab">Product Info</a>
								</li> -->
								<li class="col-md-6">
									<a aria-expanded="false" href="#mini-three" data-toggle="tab">Reviews</a>
								</li>
							</ul>
						</div>
						<!-- End Nav Tabs -->
						<!-- Tab panes -->
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $row['product_name']; ?></p>
							</div>
							
						 

							<div style="" class="tab-pane fade" id="mini-three">
								<div class="col-md-12">
								<?php
									$revcountsql = "SELECT count(*) AS count FROM reviews r WHERE r.pid=$product_id";
									$revcountres = mysqli_query($conn, $revcountsql);
									$revcountr = mysqli_fetch_assoc($revcountres);

								 ?>
									<h4 class="uppercase space35"><?php echo $revcountr['count']; ?> Reviews for <?php echo substr($row['name'], 0, 20); ?></h4>
									<ul class="comment-list">
									<?php 
										$selrevsql = "SELECT u.name, r.`timestamp`, r.review FROM reviews r JOIN users u WHERE r.uid=u.id AND r.pid=$product_id";
										$selrevres = mysqli_query($conn, $selrevsql);
										while($selrevr = mysqli_fetch_assoc($selrevres)){
									?>
										<li>
											<a class="pull-left" href="#"><img class="comment-avatar" src="images/blank.png" alt="" height="50" width="50"></a>
											<div class="comment-meta">
												<a href="#"><?php echo $selrevr['firstname']." ". $selrevr['lastname']; ?></a>
												<span>
												<em><?php echo $selrevr['timestamp']; ?></em>
												</span>
											</div>
										<!--	<div class="rating2">
												<span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span><span>&#9733;</span>
											</div> -->
											<p>
												<?php echo $selrevr['review']; ?>
											</p>
										</li>
									<?php } ?>
									</ul>
									<?php 
										$chkrevsql = "SELECT count(*) reviewcount FROM reviews r WHERE r.uid=$uid";
										$chkrevres = mysqli_query($conn, $chkrevsql);
										$chkrevr = mysqli_fetch_assoc($chkrevres);
										if($chkrevr['reviewcount'] >= 1){
											echo "<h4 class='uppercase space20'>You have already Reviewed This Product...</h4>";
										}else{
									?>
									<h4 class="uppercase space20">Add a review</h4>
									<form id="form" class="review-form" method="post">
									<?php
										$usersql = "SELECT u.email, u.name FROM users u   WHERE   u.id=$uid";
										$userres = mysqli_query($conn, $usersql);
										$userr = mysqli_fetch_assoc($userres);
									 ?>
										<div class="row">
											<div class="col-md-6 space20">
												<input name="name" class="input-md form-control" placeholder="Name *" maxlength="100" required="" type="text" value="<?php echo $userr['name'];   ?>" disabled>
											</div>
											<div class="col-md-6 space20">
												<input name="email" class="input-md form-control" placeholder="Email *" maxlength="100" required="" type="email" value="<?php echo $userr['email']; ?>" disabled>
											</div>
										</div>
									<!--	<div class="space20">
											<span>Your Ratings</span>
											<div class="clearfix"></div>
											<div class="rating3">
												<span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span><span>&#9734;</span>
											</div>
											<div class="clearfix space20"></div>
										</div> -->
										<div class="space20">
											<textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
										</div>
										<button type="submit" class="button btn-small">
										Submit Review
										</button>
									</form>
									<?php } ?>
								</div>
								<div class="clearfix space30"></div>
							</div>
						</div>
					</div><!--closes review tab-->




					<section class="htc__category__area ptb--100">
  
  <div class="container">
	  <div class="htc__product__container">
	  
		  <div class="row">
	   
			  <div class="product__list clearfix mt--30">
				  <?php
				  $get_product=get_product($con,4);
				  foreach($get_product as $list){
				  ?>
				  <!-- Start Single Category -->
				  
	   
	  <div class="col-md-3 mb-2 ">
				  <form action=""  class="form-submit" >
				  <div class="card"  style="height:100%" >
				   
					  <div class="category">
					   
						  <div class="ht__cat__thumb">
							  
							  <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['product_image']?>" alt="product images" style="width:200px; height:200px;" >
							  </a>
						  </div>
						  <div class="card-body">
						  <div class="fr__product__inner">
							  <h4 style="background-color:#17A2B8;margin:0px 0px 12px;padding:4px;color:white"><?php echo $list['product_name']?></a></h4>
							  
							  <p style="color:#666666">
								  Brand:<?php echo $list['brand']?><br>
								  Code:<?php echo $list['product_code']?><br>
								  Warranty:<?php echo $list['warranty']?><br><br>
								  <span class="text-danger">Rs.<?php echo $list['product_price']?></span>
								  
							  <p>

						   </div>     
							  <input type="hidden" class="pid" value="<?= $list['product_id'] ?>" > 
						  <input type="hidden" class="pname" value="<?= $list['product_name'] ?>" >  
						  <input type="hidden" class="pprice" value="<?= $list['product_price'] ?>" > 
						  <input type="hidden" class="pqty" value="<?= $list['quantity'] ?>" > 
						  <input type="hidden" class="pimage" value="<?= $list['product_image'] ?>" >
						  <input type="hidden" class="pbrand" value="<?= $list['brand'] ?>" >
						  <input type="hidden" class="pcode" value="<?= $list['product_code'] ?>" >
						  <input type="hidden" class="pwarranty" value="<?= $list['warranty'] ?>" ><br><br>
						  <button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="fa fa-heart"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						  <button type="submit"  class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fa fa-shopping-cart"></i></button> 

						  </div>
						  
				  </div>
					  </div>
					  </form>
				  </div>
				  <!-- End Single Category -->
				  <?php } ?>

			  </div>
		  </div>
	  </div>
  </div>
				  
</section>-->