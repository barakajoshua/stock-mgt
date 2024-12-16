<?php
include('connection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 *{
    margin: 0%;
    font-family: 'poppins',sans-serif;
}
.left-pannel{
    width: 10rem;
    height: 79vh;
    background: rgb(10, 10, 10);
    padding: 4rem 1.5rem 4rem 1.5rem;
}
.admin-heading{
    color: white;
}
.link-button{
   color: rgb(127, 127, 127);
   text-decoration: none;   
}
.link-button:hover{
    color: #ffffff;
}
.logout{
    color: white;
    text-decoration: none;
    margin-top: 4rem;
    display: block;
    width: 40%;
    text-align: center;
    padding: 1rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.logout:hover{
    color: rgb(174, 55, 55);
}
a{
   text-decoration: none; 
}
    </style>
</head>
<body>
    <div class="left-pannel">
        <h1 class="admin-heading">
            <?php
            $query = "SELECT username FROM user WHERE id = 1";

            ?>
            Admin</h1>
        <br><br>
        <a href="add.php" class="link-button" style="margin-top: 4rem;">Add Product</a><br><br><br>
        <!-- <a href="add.php" class="link-button" style="margin-top: 4rem;">Sold Product</a> -->
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="index.php" class="logout" >Logout</a><br><br>
    </div>
    
</body>
</html>