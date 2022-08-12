<?php
	include ('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
     <!-- <script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">-->
</head>
<body>
    <div class="container">
        <div class="row">
            <br />
            <div class="col-md-3">
                <div class="list-group">
                    <h3>Price </h3>
                    <input type="hidden" id="hidden_minimum_price" value="0"/>
                    <input type="hidden" id="hidden_maximum_price" value="100000"/>
                    <p id="price_show">1000-100000</p>
                    <div id="price_range"></div>
                </div>
                <div class="list-group">
                    <h3>Brand</h3>
                    <div style="height: 180px; overflow-y:auto; overflow-x:hidden; ">
                    <?php

                    $query="SELECT DISTINCT(brand)FROM product WHERE quantity='1' ORDER BY product_id DESC";
                    $statement=$conn->prepare($query);
                    $statement->execute();
                 //   $result=$statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                     <div class="list-group-item checkbox">
                         <label><input type="checkbox" class="common-selector brand" value="<?PHP echo $row['brand']; ?>" > <?php echo $row['brand']; ?> </label>
                     </div>
                     <?php
                      }
                     ?>
                    </div>


                </div>
            </div>

        </div>
    </div>
     
</body>
</html>
