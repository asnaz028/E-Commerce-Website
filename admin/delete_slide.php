<?php 
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        include("db.php");
        
        if(!isset($_SESSION['admin_name'])){
            
            echo "<script>window.open('adminlogin.php','_self')</script>";
            
        }else{
         
        }

?>

<?php 

    if(isset($_GET['delete_slide'])){
        
        $delete_slide_id = $_GET['delete_slide'];
        
        $delete_slide = "delete from slider where slide_id='$delete_slide_id'";
        
        $run_delete = mysqli_query($con,$delete_slide);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Slide Has Been Deleted')</script>";
            
            echo "<script>window.open('adminindex.php?view_slides','_self')</script>";
            
        }
        
    }

?>




<?php  ?>