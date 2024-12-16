<?php
include('connection.php');
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "INSERT INTO `user`(`username`, `password_hash`, `email`,`role`) VALUES ('$username','$password','$email','$role')";
    $result = mysqli_query($connection,$sql);
    if($result){
        header('location: index.php');
    } else {
        echo "Error: ". $sql. "<br>". mysqli_error($connection);
    }
    mysqli_close($connection);  // Closing connection after insertion.

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./style/index.css">
</head>
<script>
    function first(){
        alert('login first to get more information')
    }

    //authentication

    
    // Handle login form submission
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // prevent form submission
        let isValid = true;

        // Clear any existing error messages
        document.getElementById('loginEmailError').innerText = '';
        document.getElementById('loginPasswordError').innerText = '';

        // Validate email
        const loginEmail = document.getElementById('loginEmail').value;
        if (!validateEmail(loginEmail)) {
            document.getElementById('loginEmailError').innerText = 'Enter a valid email address.';
            isValid = false;
        }

        // Validate password presence
        const loginPassword = document.getElementById('loginPassword').value;
        if (loginPassword.length === 0) {
            document.getElementById('loginPasswordError').innerText = 'Password is required.';
            isValid = false;
        }

        if (isValid) {
            // Send form data to the server (use AJAX or fetch in a real application)
            alert('Login successful!');
        }
    });

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

    <section style="width: 100%; height: 85vh; column-count: 2; ">
        <div style="width: 100%; height: 90vh; text-align: center; padding-top: 6rem; ">
            <h1 style="font-family: Gabriola; font-size: 3rem;">Welcome to E-stock</h1>
            <hr width="10rem">
            <p style="color: rgb(28, 28, 28);">Online tool for stock Management</p>

        </div>
        <div style="width: 100%;  padding-right: 5rem;">
            <div style="float: right; width: 24rem;padding: 3rem; border: solid 1px gray; margin-top: -1rem;">
                <form action="" method="post">
                    <h1>Admin register</h1><br>
                    <input type="text" placeholder="Username" class="input-landing" name="username"><br><br>
                    <input type="text" placeholder="Role in stock" class="input-landing" name="role"><br><br>
                    <input type="text" placeholder="email address" class="input-landing" name="email"><br><br>
                    <input type="password" placeholder="password" class="input-landing" name="password"><br><br>
                    <button class="sending-button" name="submit">Register</button><br>
                    <p style="margin-top: 10px;">Already have an account <span><a href="index.php">Login</a></span></p><br>
                    
                </form>
            </div>
        </div>
    
</body>
</html>