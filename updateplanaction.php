<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

$id = $_POST['id'];
$activity = $_POST['activity'];
$Weight = $_POST['Weight'];
$repetitions = $_POST['repetitions'];
$rest_duration = $_POST['rest_duration'];
$Equipment = $_POST['Equipment'];
$Gym_duration = $_POST['Gym_duration'];

$query = "UPDATE workout_plans SET 
            activity='$activity',
            Weight='$Weight',
            repetitions='$repetitions',
            rest_duration='$rest_duration',
            Equipment='$Equipment',
            Gym_duration='$Gym_duration'
          WHERE id='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Plan updated successfully!'); window.location='viewplan.php';</script>";
} else {
    echo "Error updating data: " . mysqli_error($koneksi);
}
?>
