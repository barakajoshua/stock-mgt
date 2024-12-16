<?php
include('connection.php');
if(isset($_GET['product_id'])){
    $id = $_GET['product_id'];
    $delete = "DELETE FROM products WHERE product_id = $id";
    $result =mysqli_query($connection, $delete);

    if($result){
        header('location:dashboard.php');
    }
    else{
        echo"Erro while deleting";
    }
}
?>