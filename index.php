<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Journey</title>
    <link rel="stylesheet" href="index.css">
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

    <nav class="navbar">
        <div class="nav-links">
            <a href="about.php">About us</a>
            <a href="login.php" class="login-btn">Login</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Start Your Fitness Journey</h1>
            <p>Plan your workouts, stay consistent, and achieve your goals with us.</p>
            <a href="register.php" class="cta-btn">Get Started</a>
        </div>
    </section>

    <section id="about" class="about">
        <h2>About Our Fitness Planner</h2>
        <p>
            Staying fit isn’t just about hitting the gym — it’s about consistency, balance, and having a clear plan. 
            Our platform helps you design a weekly workout routine tailored to your goals, whether you want to build strength, 
            increase endurance, or simply stay active.
        </p>
        <p>
            Create your own personalized workout plan, track your repetitions, manage rest durations, and monitor your progress all in one place.
            It’s simple, effective, and built to keep you motivated every step of the way.
        </p>
    </section>

    <footer>
        <p>Fitness Life.Hub Your Next Reliable Website For Your Daily Use</p>
    </footer>

</body>
</html>
