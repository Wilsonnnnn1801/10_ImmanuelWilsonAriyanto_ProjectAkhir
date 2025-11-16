<?php
include 'koneksi.php';

if (isset($_POST['Register'])) {
    $Full_Name = $_POST['Full_Name'];
    $Username = $_POST['Username'];
    $Age = $_POST['Age'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO registration (Full_Name, Username, Age, Password, Email)
              VALUES ('$Full_Name', '$Username','$Age', '$Password', '$Email')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
    } else {
        echo "Failed to Register: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Fitness Life</title>
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
        <a href="login.php" class="login-btn" style="color:black;">Log In</a>
    </nav>
</header>

<div class="register-box">
    <h2>Register Website</h2>
    <form method="POST">
        <label>Full Name</label>
        <input type="text" name="Full_Name" placeholder="Full name" required>

        <label>Username</label>
        <input type="text" name="Username" placeholder="Username" required>

        <label>Age</label>
        <input type="number" name="Age" placeholder="Age">

        <label>Email</label>
        <input type="email" name="Email" placeholder="Email" required>

        <label>Password</label>
        <input type="password" name="Password" placeholder="Password" required>

        <button type="submit" name="Register">Register</button>
    </form>
</div>
    <footer>
        <p>Fitness Life.Hub Your Next Reliable Website For Your Daily Use</p>
    </footer>
</body>
</html>
