<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

if (!isset($_GET['id'])) {
    echo "<script>alert('ID not found'); window.location='viewplan.php';</script>";
    exit;
}

$id = $_GET['id'];

// Pastikan data benar-benar milik user yang sedang login
$Username = $_SESSION['Username'];
$check = mysqli_query($koneksi, 
    "SELECT * FROM workout_plans WHERE id='$id' AND Username='$Username'"
);

if (mysqli_num_rows($check) == 0) {
    echo "<script>alert('You are not allowed to delete this data'); window.location='viewplan.php';</script>";
    exit;
}

$delete = mysqli_query($koneksi, 
    "DELETE FROM workout_plans WHERE id='$id' AND Username='$Username'"
);

if ($delete) {
    echo "<script>alert('Plan deleted successfully!'); window.location='viewplan.php';</script>";
} else {
    echo "<script>alert('Failed to delete data'); window.location='viewplan.php';</script>";
}
?>
