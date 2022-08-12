

 


<?php

//require_once('config.php');
require('connection.inc.php');
/*if(!isset($_SESSION['USER_LOGIN'])){
    //header('location: login.php');
    
}*/
if(!isset($_SESSION['USER_ID'])){
    header('location:index1.php');
   // $_SESSION['customerid']=1;  
   echo "<script>
   swal('Please login !', 'To view your wishlist...', 'info')
   .then((value) => {
    window.location.href='login.php';
   });
          
        </script>";

}
else{
    $c_id=$_SESSION['USER_ID'];
   
    $p_id=$_GET['id'];
    
    $sql_check="SELECT * FROM wishlist WHERE pid=$p_id AND uid=$c_id";
   $result_check=mysqli_query($conn,$sql_check);

    if(mysqli_num_rows($result_check)==1){
     //   header('location:index1.php');
        
       echo "<script>  swal('Already Exist!', 'The item already added in your wishlist!', 'warning');</script> ";
     //  header('location:index1.php');
    }else{
        
        $insertwishlist="INSERT INTO wishlist(pid,uid) VALUES ('$p_id','$c_id') ";
      
         
       if(mysqli_query($conn,$insertwishlist)){
        header('location:show_wishlist.php');
        }
    }
}
  ?>
  
  