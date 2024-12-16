<?php
include('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
        $productname = $_POST['productName'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $description = $_POST['description'];
         
        if($price <= 0){
            echo"<script>alert('insert real numbers from 1') </script>";
        }else{

        $sql = "INSERT INTO `products`( `product_name`, `description`,`price` ,`quantity`) VALUES ('$productname','$description','$price','$quantity')";
        $result = mysqli_query($connection,$sql);
        if($result){
            header('location:dashboard.php');
        }else{
            echo"error" . mysqli_error($connection);
        }
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/stockin.css"> 
</head>
<body style="padding-left:2rem;">
    <section style="display:flex;">
    <div style="margin-top: 12rem; text-align:center;">
        <h1>Add your products with ease and take control of your stock today!</h1>
        <p>Your one-stop solution to efficient stock management!</p>
    </div>
    <div class="stockin-wrap" style="top: 3rem; float:right; margin-left: 16rem; ">
        <form method="post">
            <h1>Add a product</h1>
            <input class="stockin" type="text" placeholder="Name of the product" name="productName" required><br><br>
            <input class="stockin" type="number" placeholder="Quantity of a product in number" name="quantity" required><br><br>
            <input class="stockin" type="number" placeholder="price per kg" name="price" required><br><br>
            <input class="stockin" type="text" placeholder="description of a product" name="description" required><br><br>
            <button name="submit" class="inbutton">Add a product</button>
        </form>
        <p>go to 
                <span>
                    <a href="dashboard.php">dashboard</a>
            </span>
        </p>
    </div>
    </section>
    
</body>
</html>