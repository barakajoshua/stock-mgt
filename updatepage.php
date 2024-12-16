<?php
session_start();
include('connection.php');

if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin'] == false){
    header('location:index.php');
    exit();
}
if(isset($_POST['update']) && $_GET['id']){
    $id = $_GET['id'];
    $productName = $_POST['product'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $sql = "UPDATE `products` SET `product_name`='$productName',`description`='$description',`price`='$price',`quantity`='$quantity' WHERE product_id = '$id'";
    $updating = mysqli_query($connection, $sql);
    if($updating){
        header('location:dashboard.php');
    }else{
        echo "Error updating data: ". mysqli_error($connection);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/update.css">
</head>
<body>
    <section style="column-count: 2;">

    <div class="update">
    <h1 ><span style="color: black;"> Update Product in</span> XY shop</h1>
    <form  method="post">
        <input type="text" placeholder="Name of the product" name="product"><br><br>
        <input type="number" placeholder="Quantiry of the product" name="quantity"><br><br>
        <input type="number" placeholder="Price of the product / kg" name="price"><br><br>
        <input type="text" placeholder="Description of the product" name="description"><br>
        <button name="update" >Update</button>
        <p>Back <a href=""><span style="color: #007bff;">to Home</span></a></p>
    </form>
</div>

<div>
    <img src="./image/upda.jpeg" style="width: 35rem; height:auto;" alt="" srcset="">

</div>
</section>
    
</body>
</html>