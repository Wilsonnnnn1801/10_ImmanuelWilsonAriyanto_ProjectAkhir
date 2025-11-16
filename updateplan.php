<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM workout_plans WHERE id='$id'");
$plan = mysqli_fetch_assoc($data);

if (!$plan) {
    echo "<script>alert('Plan not found'); window.location='viewplan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Workout Plan</title>
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-image: url("fitnessbg.jpg"); 
            background-size: cover;
            background-attachment: fixed;
        }

        .edit-container {
            width: 420px;
            margin: 80px auto;
            padding: 25px;
            background: rgba(122, 110, 110, 0.9);
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.2);
        }

        .edit-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .edit-container input, 
        .edit-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #999;
        }

        .btn-update {
            width: 100%;
            padding: 10px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-update:hover {
            background: #217dbb;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 12px;
            color: #000;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header class="navbar">
    <nav class="nav-links">
        <a href="viewplan.php">View Plan</a>
    </nav>
</header>

<div class="edit-container">
    <h2>Edit Your Plan</h2>

    <form method="post" action="updateplanaction.php">
        <input type="hidden" name="id" value="<?php echo $plan['id']; ?>">

        <label>Activity</label>
        <input type="text" name="activity" value="<?php echo $plan['activity']; ?>" required>

        <label>Weight (kg)</label>
        <input type="number" name="Weight" value="<?php echo $plan['Weight']; ?>" required>

        <label>Repetitions</label>
        <input type="number" name="repetitions" value="<?php echo $plan['repetitions']; ?>" required>

        <label>Rest Duration (Seconds)</label>
        <input type="text" name="rest_duration" value="<?php echo $plan['rest_duration']; ?>" required>

        <label>Equipment</label>
        <input type="text" name="Equipment" value="<?php echo $plan['Equipment']; ?>" required>

        <label>Gym Duration (Minutes)</label>
        <input type="time" name="Gym_duration" value="<?php echo $plan['Gym_duration']; ?>" required>

        <button type="submit" class="btn-update">Update Plan</button>
    </form>

    <a href="viewplan.php" class="btn-back">← Back to Plans</a>
</div>

<footer>
    <p style="text-align:center; margin-top:20px;">Fitness Life.Hub Your Next Reliable Website For Your Daily Use</p>
</footer>

</body>
</html>
