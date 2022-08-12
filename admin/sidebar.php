<?php 
    
    if(!isset($_SESSION['admin_name'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="adminindex.php?adminpic" class="navbar-brand">Admin Panel </a>
        
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="adminindex.php" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
                <i class="fa fa-user"></i> <?php echo $_SESSION['admin_name']?>
                
            </a><!-- dropdown-toggle finish -->
                
                
                
                <li><!-- li begin -->
                    <a href="adminlogout.php" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->

                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            
            
            <li><!-- li begin -->
                <a href="adminindex.php?manage" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Manage Products
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="adminindex.php?manage_orders" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Manage Orders
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="adminindex.php?manage_customers" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Manage Customers
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="adminindex.php?insert_slide" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Insert Slides
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="adminindex.php?view_slides" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> View Slides
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            

            <li><!-- li begin -->
                <a href="adminindex.php?customer_report" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i>Customer Report
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="adminindex.php?product_report" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Product Report
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="adminindex.php?order_report" ><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tag"></i> Order Report
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
           
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->

    
<?php } ?>
