<?php require('top.php')?>
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
   
   <div id="content" class="container"> 
       
       <div class="row"> 
                      
           <div class="col-sm-4 col-sm-6 single">
               
               <div class="product">
                   
                   <a href="details.php">
                       
                       <img class="img-responsive" src="p1" alt="Product 1">
                       
                   </a>
                   
                   <div class="text">
                       
                       <h3 style="background-color:rgb(13,202,240);">
                           Torch-Light
                       </h3>
                       <p class="brand">Brand:Sanford</p>
                       <p class="code">Code:P10000</p>
                       <p class="warranty">Warranty:No Warranty</p>
                       
                       <p class="price">Rs.1,100.00</p>
                       
                       <p class="button">
                           
                      
                           
                           <a href="details.php" class="btn btn-primary">
                               
                               <i class="fa fa-shopping-cart">
                                   Add To Cart
                               </i>
                               
                           </a>
                           
                       </p>
                       
                   </div>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <?php require('footer.php')?>       
    

        
        
		
 