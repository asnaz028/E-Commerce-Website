<?php 
session_start();
include("db.php");
if(!isset($_SESSION['admin_name'])){
        
    echo "<script>window.open('adminlogin.php','_self')</script>";
    
}else{
 
}
?>
<?php  
  $id=$_GET['updateid'];
   $sql="SELECT * FROM `products` WHERE product_id=$id";
   $result=mysqli_query($con, $sql);
   $row=mysqli_fetch_assoc($result);
   $id=$row['product_id'];
   $name=$row['product_name'];
   $price=$row['product_price'];
   $image=$row['product_image'];
   $brand=$row['brand'];
   $code=$row['product_code'];
   $war=$row['warranty'];
   $cat=$row['category'];
   $quant=$row['quantity'];
   $cid=$row['categories_id'];
   $key=$row['meta_keyword'];


    if(isset($_POST['upload'])){

        $name=$_POST['name']; 
        $price=$_POST['price'];
        $img=$_FILES['img']['name'];
        $dst="./pimg/".$img;
        move_uploaded_file($_FILES["img"]["tmp_name"],$dst);
        $brand=$_POST['brand']; 
        $code=$_POST['code'];
        $warranty=$_POST['warranty']; 
        $catergory=$_POST['catergory'];
        $quantity=$_POST['quantity'];
        $cat_id=$_POST['cat_id'];
        $keyword=$_POST['meta_keyword'];

        $query="UPDATE `products` SET 
        `product_name`='$name',
        `product_price`='$price',
        `product_image`=' $img',
        `brand`='$brand',
        `product_code`='$code',
        `warranty`='$warranty',
        `category`='$catergory',
        `quantity`='$quantity', 
        `categories_id`='$cat_id',
         `meta_keyword`='$keyword'
          WHERE `product_id`='$id' ";

        $run_query=mysqli_query($con, $query);

        if($run_query){
            
            echo "<script>alert('Product updated successfully')</script>";
        
            
        }
        else{
            echo "<script>alert('Product NOT updated successfully')</script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Update Products </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
</head>
<body>
    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i><a href="adminindex.php"> Admin Panel </a> /  Update Products
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Update Product 
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
           <form method="POST" enctype="multipart/form-data" action="">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Product Id  </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="id" type="text" class="form-control"  value=<?php echo $id;?> >
                          
                      </div>
                      <br>
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Product Name </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="name" type="text" class="form-control" value=<?php echo $name;?> required>
                          
                      </div>
                      <br>
                   </div>
                 
                  
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Product Price </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="price" type="text" class="form-control" value=<?php echo $price;?> required>
                          
                      </div>
                      <br>
                   </div>
                  
                   <div class="form-group">
                       
                       <label class="col-md-3 control-label"> Product Image </label> 
                       
                       <div class="col-md-6">
                           
                           <input name="img" type="file" class="form-control" id="img" value=<?php echo $image;?> required>
                           
                       </div>
                       <br>
                    </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Brand </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="brand" type="text" class="form-control" value=<?php echo $brand;?> required>
                          
                      </div>
                      <br>
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Product Code </label> 
                      
                      <div class="col-md-6">
                          
                      <input name="code" type="text" class="form-control" value=<?php echo $code;?> required>
                          
                      </div>
                      <br>
                   </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Warranty</label> 
                      
                      <div class="col-md-6">
                          
                      <input name="warranty" type="text" class="form-control" value=<?php echo $war;?> required>
                          
                      </div>
                      <br>
                   </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Catergory </label> 
                      
                      <div class="col-md-6">
                          
                      <input name="catergory" type="text" class="form-control" value=<?php echo $cat;?> required>
                          
                      </div>
                      <br>
                   </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Quantity </label> 
                      
                      <div class="col-md-6">
                          
                      <input name="quantity" type="text" class="form-control" value=<?php echo $quant;?> required>
                          
                      </div>
                      <br><br>
                   </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Cat_Id </label> 
                      
                      <div class="col-md-6">
                          
                      <input name="cat_id" type="text" class="form-control" value=<?php echo $cid;?> required>
                          
                      </div>
                      <br><br>
                   </div>

                   <div class="form-group">
                       
                      <label class="col-md-3 control-label">Keyword </label> 
                      
                      <div class="col-md-6">
                          
                      <input name="meta_keyword" type="text" class="form-control" value=<?php echo $key;?> required>
                          
                      </div>
                      <br><br>
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="upload" value="Update" type="submit" class="btn btn-primary form-control">
                          
                      </div>
                      <br>
                   </div>

</form>
               
           </div>
            
            
        </div>
        
    </div>
    
</div>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</body>
</html>