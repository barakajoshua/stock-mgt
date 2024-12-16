<?php 
include('connection.php');
if (isset($_POST['submit'])){
   $fname = $_POST['submit'];
   $lname = $_POST['lname'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   $insert = mysqli_query($connection,"INSERT INTO ");
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <style>
        /* Basic styling for the form */
        form {
            width: 300px;
            margin: 0 auto;
            padding: 2rem;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        label, input {
            display: block;
            width: 100%;
            margin: 0.5rem 0;
        }
        button {
            width: 100%;
            padding: 0.5rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }
        .error {
            color: red;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="">

        </div>
    </header>



<form id="loginForm">
    <h1>Welcome back!</h1>
    <label for="loginEmail">Email:</label>
    <input type="email" id="loginEmail" name="email" required>
    <span id="loginEmailError" class="error"></span>

    <label for="loginPassword">Password:</label>
    <input type="password" id="loginPassword" name="password" required>
    <span id="loginPasswordError" class="error"></span>

    <button type="submit">Login</button>
</form>

<script>
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

</body>
</html>
