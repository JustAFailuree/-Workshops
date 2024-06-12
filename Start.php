<?php
session_start();
@include 'login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styleStartTest.css">
</head>
<body>
<div class="logowanie">
            <form method="post">
                <h1>Login:</h1>
                <div class="dane">
                <label for="Login">User Nick:</label><br>
                <input type="text" id="Login" name="Login" required><br>
                <label for="Pass">Password:</label><br>
                <input type="password" id="Pass" name="Pass" required><br>
                </div>
                <div class="bottom">
                <button type="submit">OK</button>
                </div>
            </form>
        </div>
</body>
</html>



