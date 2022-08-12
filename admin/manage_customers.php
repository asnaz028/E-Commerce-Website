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
                
                <i class="fa fa-dashboard"></i><a href="adminindex.php?adminpic"> Admin Panel </a> / Manage customers
                
            </li>
            
        </ol>
        
    </div>
    
</div>

    <div class="container">
        
  

        <table class="table table-hover">
    <thead>
      <tr>
      <th>id </th>
        <th>name</th>
        <th>email</th>
        <th>mobile</th>
        <th>added_on</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>


    <?php
        $query="SELECT * FROM `users`";
        $result=mysqli_query($con,$query);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
              $id=$row['id'];
              $name=$row['name'];
              $email=$row['email'];
              $mobile=$row['mobile'];
              $add=$row['added_on'];

              echo'<tr class="success">
              <td>'.$id.'</td>
              <td>'.$name.'</td>
              <td>'.$email.'</td>
              <td>'.$mobile.'</td>
              <td>'.$add.'</td>
             <td>
               <button class="btn btn-danger"><a href="delete_c.php?deleteid='.$id.'" style="color:white">Delete</a></button>
               </td>
             </tr>';
            }
        }
    ?>
 
    </tbody>
  </table>
    </div>



