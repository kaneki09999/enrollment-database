<?php include "../connect/connection.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="top-bar">
    <div class="container">
        <p class="contact-info">
            <span class="enrollment-text">Enrollment System</span>
        </p>
        <button class="logout-btn" onclick="location.href='logout.php'"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </div>
</div>
<div class="sidebar">
    <h2>Admin</h2>
    <ul>
        <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="new-enrollees.php"><i class="fas fa-user-plus"></i> New Enrollees</a></li>
        <li><a href="subject.php"><i class="fas fa-book"></i> Subject</a></li>
        <li><a href="courses.php"><i class="fas fa-graduation-cap"></i> Courses</a></li>
        <li><a href="schedules.php"><i class="fas fa-calendar-alt"></i> Schedules</a></li>
        <li><a href="students.php"><i class="fas fa-users"></i> Students</a></li>
        <li><a href="professor.php"><i class="fas fa-chalkboard-teacher"></i> Professor</a></li>
        <li><a href="set-semester.php"><i class="fas fa-cogs"></i> Set Semester</a></li>
    </ul>
</div>

