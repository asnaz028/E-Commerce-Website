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
                
                <i class="fa fa-dashboard"></i><a href="adminindex.php?adminpic"> Admin Panel </a> / Product Report
                
            </li>
            
        </ol>
        
    </div>
    
</div>

    <div class="container">
    <h1 style="align:center;color:grey; margin-left:400px">PRODUCT REPORT</h1>

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

           
              
             </tr>';
            }
        }
    ?>
 
    </tbody>
  </table>
    </div>

