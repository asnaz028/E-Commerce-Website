<?php

$data1='';
  if (isset($_POST['pay'])){
    $stmt = $conn->prepare('INSERT INTO orders (firstname,lastname,phone,email,address,country,city,zip,date_time,products,pmode,amount_paid)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
    $stmt->bind_param('ssssssssssss',$fname,$lname,$phone,$email,$address,$country,$city,$zip,$date,$products,$pmode,$grand_total);
    $stmt->execute();
    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();
    $data1 .= '<div class="text-center">
                <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
                <h2 class="text-success">Your Order Placed Successfully!</h2>
                <h4 class="bg-info text-light rounded p-2">Items Purchased : ' . $products . '</h4>
                <h4>Your Name : ' . $fname . ' '.$lname.'</h4>
                <h4>Your E-mail : ' . $email . '</h4>
                <h4>Your Phone : ' . $phone . '</h4>
                <h4>Total Amount Paid : ' . number_format($grand_total,2) . '</h4>
                <h4>Payment Mode : ' . $pmode . '</h4>
              </div>';
     echo $data1;
  }          

  ?>

  