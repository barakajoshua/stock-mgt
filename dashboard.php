<?php
session_start();
include('connection.php');

if(!isset($_SESSION['loggedin'])  || $_SESSION['loggedin'] == false){
    header('location:index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title> 
    <link rel="stylesheet" href="./style/table.css">
    
</head>
<body>
<section style="display: flex;">
<?php 
  include('pannel.php');  
?> 
<div>
   <div style="padding: 3rem;">
    </div>
    <div>
        <center>
        <div class="report">
            <H1 style="color: #007BFF;">Whole Report</H1>
            <?php      
            $selection = "SELECT SUM(price * quantity) AS tatol_price FROM products";
            $total_prod = "SELECT SUM(quantity) AS total_stock FROM products";
            $result = mysqli_query($connection, $total_prod);
            $row = mysqli_fetch_assoc($result);

            $all_price = mysqli_query($connection, $selection);
            $sel = mysqli_fetch_assoc($all_price);
            ?>
            <p><span>Total qauntity of product in stock is <?php echo $row['total_stock'];  ?> kg </span></p>
            <p><span>Total qauntity income on product is <?php echo $sel['tatol_price'];  ?> FRW </span></p>
        </div>
              



        </center>
    </div>
    <!-- whole table  -->
     <br>
    <table class="table">
    <thead>
    <tr>   
            <th>Delete</th>
            <th>Edit</th>
            <th>Productname</th>
            <th>Descrption</th>
            <th>unit price</th>
            <th>Quantity</th>
            <th>Created on</th>
            <th>Add</th>
            <th>Stock out</th>
    </tr>
    </thead>
    
        <?php      
         $selection = "SELECT * FROM products";
         $result = mysqli_query($connection, $selection);
        while($row = mysqli_fetch_assoc($result))
         {
        ?>
        <div></div>
        <tr>
        <td class="delete"><a href="?delete=<?php echo $row['product_id']; ?>" class="delete">
            <button style="border: none; background:none;color:red;" class="delete">Delete</button></a>
        </td>
        <td><a href="updatepage.php?id=<?php echo $row['product_id'];  ?>">
            <button class="btn" name="update" style="background: none; border:none;"><img src="./image/pen.png" alt=""   height="15px" width="15px"></button></a>
        </td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['quantity'];  ?></td>
        <td><?php echo $row['created_at'];  ?></td>
        <td><a href="stockin.php?id=<?php echo $row['product_id']; ?>">
            <button style="background: none; border:none;"> <img src="./image/add.png" alt=""  height="15px" width="15px"> </button>
        </td>
        <td><a href="stockout.php?id=<?php echo $row['product_id']; ?>">
        <button style="background: none; border:none;"><img src="./image/minus-button.png" alt="" srcset="" height="15px" width="15px"></button>
        </td>
        <?php } ?>
        </tr>
    </table>
</div> 
    </section>

</body>
</html>
<?php
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $del = $connection->query("DELETE FROM products WHERE product_id='$id'");
   if($del){
    echo"<script>confirm('are you sure you want delete the user') </script>";
    header("location:dashboard.php");
   }
}
?>


