<?php
session_start();

include('connection.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $selectingAll = "SELECT * FROM user WHERE username = '$username' AND password_hash = '$password'";
        $getall = mysqli_query($connection, $selectingAll);
        
        if(mysqli_num_rows($getall) > 0){
            $_SESSION['username'] = $username;
            $_SESSION['loggedin'] = true;
           header('location:dashboard.php');
           exit();
        }
        else{
            echo"<script>alert('No user found') </script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-stock</title>
    <link rel="stylesheet" href="./style/index.css">
</head>
<script>
    function first(){
        alert('Please login first to get the abouts page');
    }
</script>
<body>
    <nav>
        <header class="header">
            <div class="header-left">
                <h1 class="logo" style="color:#007bff; cursor: default;">E-stock</h1>
            </div>
            <div class="header-right">
                <a href="register.php"><button class="header-btn">Register</button></a>
                <a href="" onclick="first()"><button class="header-btn">About Us</button></a>
                <a href="index.php"><button class="header-btn" style="background: #007bff; color: white; border-radius: 28px;">Login</button></a>
            </div>
        </header>
    </nav>

    <!-- the body part -->

    <section style="width: 100%; height: 70vh; column-count: 2; ">
        <div style="width: 100%; height: 20rem; text-align: center; border-right: solid 5px rgb(66, 103, 185); ">
            <img src="./image/home.jpeg" height="400" width="400" alt="No image" srcset="">
            <!-- <h1 style="font-family: Gabriola; font-size: 3rem;">Welcome to E-stock</h1> -->
            <!-- <hr width="10rem">
            <p style="color: rgb(28, 28, 28);">Online tool for stock Management</p> -->

        </div>
        <div style="width: 100%; height: 20rem; padding-right: 6rem;">
            <div style="float: right; width: 24rem;padding: 3rem; border: solid 1px gray; margin-top: 3rem;">
                <form  method="post">
                    <h1>Welcome back!</h1><br>
                    <input type="text" placeholder="Username" class="input-landing" name="username"><br><br>
                    <input type="password" placeholder="password" class="input-landing" name="password"><br><br>
                    <button class="sending-button" name="submit">Login→</button><br>
                    <p style="margin-top: 10px;">Don't have an account <span><a href="register.php">Register now</a></span></p><br>
                    
                </form>
            </div>
        </div>
    </section>
    
</body>
</html>

