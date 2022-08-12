<?php 

include("db.php");
if(!isset($_SESSION['admin_name'])){
        
    echo "<script>window.open('adminlogin.php','_self')</script>";
    
}else{
 
}
?>

<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i><a href="adminindex.php?adminpic"> Admin Panel </a> / Manage Products
                
            </li>
            
        </ol>
        
    </div>
    
</div>

    <div class="container">
        <button class="btn btn-primary my-5"><a href="insert_p.php" style="color:white">Add</a></button>

        <table class="table table-hover">
    <thead>
      <tr>
        <th>product_id</th>
        <th>product_name</th>
        <th>product_price</th>
        <th>product_image</th>
        <th>brand</th>
        <th>product_code</th>
        <th>warranty</th>
        <th>category</th>
        <th>quantity</th>
        <th>Categories_Id</th>
        <th>Product Keyword</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>


    <?php
        $query="SELECT * FROM products";
        $result=mysqli_query($con,$query);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
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

               echo'<tr>
               <td>'.$id.'</td>
               <td>'.$name.'</td>
               <td>'.$price.'</td>
               <td><img src=" '.$image.' " width="100px" alt="image"></td>
               <td>'. $brand.'</td>
               <td>'.$code.'</td>
               <td>'.$war.'</td>
               <td>'.$cat.'</td>
               <td>'.$quant.'</td>
               <td>'.$cid.'</td>
               <td>'.$key.'</td>
               <td>
               <button class="btn btn-primary"><a href="update_p.php?updateid='.$id.'" style="color:white">Edit</a></button>
               <button class="btn btn-danger"><a href="delete_p.php?deleteid='.$id.'" style="color:white">Delete</a></button>
           </td>
              
             </tr>';
            }
        }
    ?>
 
    </tbody>
  </table>
    </div>