<?php
include 'koneksi.php';
session_start();

if (isset($_POST['Login'])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $query = "SELECT * FROM registration WHERE Username='$Username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);

        if (password_verify($Password, $data['Password'])) {
            $_SESSION['Username'] = $Username;
            echo "<script>alert('Login Successful!'); window.location='plansetting.php';</script>";
        } else {
            echo "<script>alert('Incorrect password');</script>";
        }
    } else {
        echo "<script>alert('Username not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Fitness Life</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        background-image: url("fitnessbg.jpg"); 
        background-repeat: no-repeat;
        background-size: cover; 
        background-attachment: fixed; 
    }
</style>
</head>
<body>

<header class="navbar">
    <nav class="nav-links">
        <a href="index.php">Landing Page</a>
        <a href="about.php">About Us</a>
        <a href="register.php" class="login-btn" style="color:black;">Register</a>
    </nav>
</header>

<div class="register-box">
    <h2>Welcome Back</h2>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="Username" placeholder="Enter your username" required>

        <label>Password</label>
        <input type="password" name="Password" placeholder="Enter your password" required>

        <button type="submit" name="Login">Log In</button>

        <button><a href="register.php">Don't have an account? Register Here</a></button>
    </form>
</div>
    <footer>
        <p>Fitness Life.Hub Your Next Reliable Website For Your Daily Use</p>
    </footer>
</body>
</html>
