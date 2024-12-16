<?php
include('connection.php');
if(isset($_POST['add']) && $_GET['id']){
    $product_id = $_GET['id'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO `stock_in`(`product_id`,`quantity`) VALUES ('$product_id','$quantity') ";
    $updatingProducts = "UPDATE products  SET quantity = quantity + $quantity WHERE product_id = '$product_id'";    
    $adding = mysqli_query($connection, $sql);
    $newresult = mysqli_query($connection,$updatingProducts); 
    if($newresult){
      header('location:dashboard.php');
    }else{
        echo"erro" . mysqli_error($connection);
    }

}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stock in</title>
    <link rel="stylesheet" href="./style/stockin.css"> 
</head>
<body>
    <center>
    <div class="stockin-wrap">
        <h1>Stock in</h1>
        <h2>Add a new quantity to the remaining</h2>
       <form method="post">
           <input name="quantity" type="number" class="stockin" required placeholder="quantity"><br>
           <button name="add" class="inbutton">Add +</button>
       </form>
       <p class="paragraph">back  to <span><a href="dashboard.php">dashboard</a></span></p>
</div>
</center>
</body>
</html>

