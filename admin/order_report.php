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
                
                <i class="fa fa-dashboard"></i><a href="adminindex.php?adminpic"> Admin Panel </a> / Order Report
                
            </li>
            
        </ol>
        
    </div>
    
</div>

    <div class="container">
        
    <h1 style="align:center;color:grey; margin-left:400px">ORDER REPORT</h1>
        <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>	firstname</th>
        <th>lastname</th>
        <th>phone</th>
        <th>	email</th>
        <th>address</th>
        <th>country</th>
        <th>city</th>
        <th>zip</th>
        <th>date_time</th>
        <th>products</th>
        <th>pmode</th>
        <th>amount_paid</th>
      </tr>
    </thead>
    <tbody>


    <?php
        $query="SELECT * FROM `orders` ";
        $result=mysqli_query($con,$query);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $id=$row['id'];
                $fname=$row['firstname'];
                $lname=$row['lastname'];
                $phone=$row['phone'];
                $email=$row['email'];
                $address=$row['address'];
                $country=$row['country'];
                $city=$row['city'];
                $zip=$row['zip'];
                $date=$row['date_time'];
                $products=$row['products'];
                $mode=$row['pmode'];
                $paid=$row['amount_paid'];

               echo'<tr class="success">
               <td>'.$id.'</td>
               <td>'.$fname.'</td>
               <td>'.$lname.'</td>
               <td>'.$phone.'</td>
               <td>'.$email.'</td>
               <td>'.$address.'</td>
               <td>'.$country.'</td>
               <td>'.$city.'</td>
               <td>'.$zip.'</td>
               <td>'.$date.'</td>
               <td>'.$products.'</td>
               <td>'.$mode.'</td>
               <td>'.$paid.'</td>

              
             </tr>';
            }
        }
    ?>
 
    </tbody>
  </table>
    </div>



