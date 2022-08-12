<?php
//ob_start();
require 'config.php';
if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "SELECT * FROM products  WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
 
$row = mysqli_fetch_assoc($result);

$product_name  = $row['product_name'];
 
}
 
//$uid = $_SESSION['USER_ID'];
if(isset($_POST) & !empty($_POST)){
	 
	$review = filter_var($_POST['review'], FILTER_SANITIZE_STRING);

	$revsql = "INSERT INTO reviews (pid, uid, review) VALUES ($product_id, $uid, '$review')";
	$revres = mysqli_query($conn, $revsql);
	if($revres){
		$smsg = "<script> swal('Review submitted succesfully!' , 'success');</script>";
	}else{
		$fmsg =  "<script> swal('Failed to Submit Review!' , 'warning');</script>";
	}
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

<script src="https://kit.fontawesome.com/fb498ff42a.js"></script>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="./product_css.css">
 
<link href = "css/jquery-ui.css" rel = "stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!--  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php require('top.php')?>
  
 <div class="container ">
<div class="row justify-content-centre  " >
<!--d-flex justify-content-centre-->
			<?php 
            	   $sql="SELECT * FROM products where product_id='$product_id'";
            	   $result=$conn->query($sql);
            	   while($row=$result->fetch_assoc()){
            	 ?>
                 <div class="col d-flex justify-content-centre">
            	 <div class="col-md-3 mb-2   "  >
				 <form action=""  class="form-submit" >
            	 	<div class="card" style="height:100%" >
            	 		 <br>
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
									<button type="submit"  class="btn btn-info add2" name="" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"   ><i class="far fa-heart"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <button type="submit"  class="btn btn-info addItemBtn" data-toggle="tooltip" data-placement="top" title="Add To Cart"    name="add"  ><i class="fas fa-shopping-cart"></i></button> 
 
												    
							   </div> <!-- closes card-body -->
								 
            	 	</div> <!-- closes card -->
				 </form>
				 
            	 </div> <!-- closes col-md3 mb-2 -->
                   </div>
				 <?php } ?>
				   	 
            </div> <!--closes filter data-->
				   
				    
			<div class="card">
    		<div class="card-header">Sample Product</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
                        
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                         
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
			 			 
                   </div><!--closes container-->
<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script>
			

$(document).ready(function(){
	$('#review_modal').modal('hide');
	var rating_data = 0;

    $('#add_review').click(function(){
       // e.preventDefault();
		var $form = $(this).closest(".form-submit");
      // var p_i_d = $form.find(".pid").val();
       var p_i_d=1;
	     // var p_i_d=1;
		$.ajax({
        url: 'action.php',
        method: 'post',
		data: {p_i_d:p_i_d },
		success: function(response) {
            if(!$.trim(response)){
				//window.location.href='login.php';
				swal('Please login !', 'To Add Review...', 'info')
           .then((value) => {
            window.location.href='login.php';
             });
			}
			else{
                 
                $('#review_modal').modal('show');
           
                
			}
			 
		  }
         // window.scrollTo(0, 0);
          
		});
      // $('#review_modal').modal('show');
		 
		 
    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){
 
        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();
		var pid = $(".pid").val();
		// alert(pid);
        if(user_name == '' || user_review == '')
        {
            swal("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{pid:pid,rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                   // alert(data);
                    swal( "succesful!","Your Review & Rating Successfully Submitted!...","success");
                   
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
		var pid = $(".pid").val();
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data',pid:pid},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

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

});

</script>

 
 
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
 
  	<div class="modal-dialog" role="document">
 
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
         
  	</div>
       
</div>
 
<?php require('footer.php')?>		
</body>
</html>			
