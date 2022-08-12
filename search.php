<?php 
require('top.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>
<div class="body__overlay"></div>
        
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Search</span>
								  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php echo $str?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row  col d-flex justify-content-center">
					<?php if(count($get_product)>0){?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                <form action=""  class="form-submit" >
                                    <div class="card" style="height:100%" >
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <?php
										foreach($get_product as $list){
										?>
										<!-- Start Single Category -->
										<div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
											<div class="category">
												<div class="ht__cat__thumb">
													<a href="single.php?id=<?php echo $list['product_id']?>">
														<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['product_image']?>" alt="product images" style="width:200px; height:200px;">
                            
													</a>
												</div>
												
                                                <div class="fr__product__inner">
                                        <h4 style="background-color:#17A2B8;margin:0px 0px 12px;padding:4px;color:white"><?php echo $list['product_name']?></a></h4>
                                        
                                        <p style="color:#666666">
                                            brand:<?php echo $list['brand']?><br>
                                            code:<?php echo $list['product_code']?><br>
                                            warranty:<?php echo $list['warranty']?><br><br>
                                            <span class="text-danger">Rs.<?php echo $list['product_price']?></span>
                                            
                                        <p>

											           
                                        <input type="hidden" class="pid" value="<?= $list['product_id'] ?>" > 
									<input type="hidden" class="pname" value="<?= $list['product_name'] ?>" >  
									<input type="hidden" class="pprice" value="<?= $list['product_price'] ?>" > 
									<input type="hidden" class="pqty" value="<?= $list['quantity'] ?>" > 
									<input type="hidden" class="pimage" value="<?= $list['product_image'] ?>" >
									<input type="hidden" class="pbrand" value="<?= $list['brand'] ?>" >
									<input type="hidden" class="pcode" value="<?= $list['product_code'] ?>" >
									<input type="hidden" class="pwarranty" value="<?= $list['warranty'] ?>" > <br><br>
									<button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="fa fa-heart"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							        <button type="submit"  class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fa fa-shopping-cart"></i></button> 
  
                                    </div>
                                </div>
                                        </div>
                                </form>
                            </div>
										<?php } ?>
                                    </div>
							   </div>
                            </div>
                        </div>
                    </div>
					<?php } else { 
						echo "Data not found";
					} ?>
                
				</div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- End Banner Area -->
		<input type="hidden" id="qty" value="1"/>
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