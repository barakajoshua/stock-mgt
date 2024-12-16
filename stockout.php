<?php
include('connection.php');

if($_POST){
   
    $product_id = $_GET['id'];
    $quantity = $_POST['quantity'];
    $slct = $connection->query('SELECT quantity FROM products');
    while($row = $slct->fetch_assoc()){
     if($quantity > $row['quantity']){
        echo "<script>alert('insuffient Quantity');window.location.href='./dashboard.php';</script>";
     }
     else{
        $updatingProducts = "UPDATE products  SET quantity = quantity - $quantity  WHERE product_id = '$product_id'";
        $newresult = mysqli_query($connection,$updatingProducts);
        $sql = "INSERT INTO `stock_out`(`out_id`,`quantity`) VALUES ('$product_id','$quantity') ";  
        $adding = mysqli_query($connection, $sql);
     }
    }
      
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
        <h1>Stock out</h1>
        <h2>stock out the product</h2>
       <form method="post">
           <input name="quantity" type="number" class="stockin" required placeholder="quantity"><br>
           <button name="add" class="inbutton">remove -</button>
       </form>
       <p class="paragraph">back  to <span><a href="dashboard.php">dashboard</a></span></p>
</div>
</center>
</body>
</html>

