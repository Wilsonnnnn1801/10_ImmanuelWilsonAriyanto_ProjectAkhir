<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['Username'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

$Username = $_SESSION['Username'];
$query = mysqli_query($koneksi, "SELECT * FROM workout_plans WHERE Username='$Username'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Weekly Plan | Fitness Life</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-image: url("fitnessbg.jpg"); 
            background-repeat: no-repeat;
            background-size: cover; 
            background-attachment: fixed; 
        }

        .action-wrapper {
            display: flex;
            gap: 6px;
            justify-content: center;
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            display: inline-block;
        }

        .update-btn {
            background-color: #6cbaeeff;
        }

        .delete-btn {
            background-color: #e77cb7ff;
        }
    </style>
</head>
<body>

<header class="navbar">
    <nav class="nav-links">
        <a href="plansetting.php">Set Plan</a>
    </nav>
</header>

<div class="plan-container">
    <h2>Your Weekly Workout Timeline</h2>

    <?php if (mysqli_num_rows($query) > 0) { ?>
        <table class="timeline-table">
            <tr>
                <th>#</th>
                <th>Activity</th>
                <th>Weight</th>
                <th>Repetitions</th>
                <th>Rest Duration</th>
                <th>Equipment</th>
                <th>Gym Duration</th>
                <th>Actions</th>
            </tr>

            <?php 
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($data['activity']); ?></td>
                <td><?php echo htmlspecialchars($data['Weight']); ?></td>
                <td><?php echo htmlspecialchars($data['repetitions']); ?></td>
                <td><?php echo htmlspecialchars($data['rest_duration']); ?></td>
                <td><?php echo htmlspecialchars($data['Equipment']); ?></td>
                <td><?php echo htmlspecialchars($data['Gym_duration']); ?></td>
                <td>
                    <div class="action-wrapper">
                        <a class="action-btn update-btn" 
                        href="updateplan.php?id=<?php echo $data['id']; ?>">Update</a>

                        <a class="action-btn delete-btn"
                        href="deleteplan.php?id=<?php echo $data['id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this plan?');">
                        Delete
                        </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p class="no-plan">You haven’t set your workout plan yet. 
        <a href="plansetting.php">Click here</a> to create one.</p>
    <?php } ?>
</div>

<footer>
    <p>© 2025 Fitness Planner. All rights reserved.</p>
</footer>

</body>
</html>
