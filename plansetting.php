<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

if (isset($_POST['savePlan'])) {
    $Username = $_SESSION['Username'];
    $count = isset($_POST['activity']) && is_array($_POST['activity']) ? count($_POST['activity']) : 0;

    for ($i = 0; $i < $count; $i++) {
        $type = $_POST['activity'][$i];
        $weight = $_POST['weight'][$i];
        $reps = $_POST['repetitions'][$i];
        $rest = $_POST['rest_duration'][$i];
        $equipment = $_POST['equipment'][$i];
        $gym_duration = $_POST['gym_duration'][$i];

        if (!empty($type)) {
            mysqli_query($koneksi, "INSERT INTO workout_plans (Username, activity, weight, repetitions, rest_duration, equipment, gym_Duration) 
                                    VALUES ('$Username', '$type', '$weight', '$reps', '$rest', '$equipment', '$gym_duration')");
        }
    }

    echo "<script>alert('Workout plan saved successfully!');window.location='viewplan.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Plan Settings</title>
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
        <a href="viewplan.php">Plan List</a>
    </nav>
</header>

<div class="register-box" style="width:1200px;">
    <h2>Set Your Weekly Workout Plan</h2>
    <form method="POST">
        <table style="width:100%; text-align:left; border-collapse: collapse;">
            <tr>
                <th>Activity</th>
                <th>Weight</th>
                <th>Repetitions</th>
                <th>Rest Duration</th>
                <th>Equipment</th>
                <th>Gym Duration</th>
            </tr>

            <?php for ($i=0; $i<6; $i++): ?>
            <tr>
                <td><input type="text" name="activity[]" placeholder="Workout Activity"></td>
                <td><input type="number" name="weight[]" placeholder="Weight"></td>
                <td><input type="number" name="repetitions[]" placeholder="Repetition"></td>
                <td><input type="text" name="rest_duration[]" placeholder="Duration"></td>
                <td><input type="text" name="equipment[]" placeholder="Equipment"></td>
                <td><input type="time" name="gym_duration[]" placeholder="Gym Duration (hour)"></td>
            </tr>
            <?php endfor; ?>
        </table>

        <button type="submit" name="savePlan">Save Plan</button>
    </form>
</div>
    <footer>
        <p>Fitness Life.Hub Your Next Reliable Website For Your Daily Use</p>
    </footer>
</body>
</html>
