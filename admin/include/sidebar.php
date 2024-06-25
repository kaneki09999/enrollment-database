<?php 
session_start(); 
require "../connect/connection.php";

if (!isset($_SESSION['id'])) {
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}

$admin = $_SESSION['id'];
?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="top-bar">
    <div class="container">
        <p class="contact-info">
            <span class="enrollment-text">Enrollment System</span>
        </p>
    </div>
</div>
<div class="sidebar">
    <h2>Admin</h2>
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="new-enrollees.php"><i class="fas fa-user-plus"></i> New Enrollees</a></li>
        <li class="nav-item"><a class="nav-link" href="schedule.php"><i class="fas fa-calendar-alt"></i> Schedule</a></li>
        <li class="nav-item"><a class="nav-link" href="courses.php"><i class="fas fa-graduation-cap"></i> Courses</a></li>
        <li class="nav-item"><a class="nav-link" href="subjects.php"><i class="fas fa-book"></i> Subjects</a></li>
        <li class="nav-item"><a class="nav-link" href="students.php"><i class="fas fa-users"></i> Students</a></li>
        <li class="nav-item"><a class="nav-link" href="professor.php"><i class="fas fa-chalkboard-teacher"></i> Professor</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="logsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-gear"></i> Logs
            </a>
            <div class="dropdown-menu" aria-labelledby="logsDropdown">
                <a class="dropdown-item" href="grading-log.php">Grading Log</a>
                <a class="dropdown-item" href="student-log.php">Student Log</a>
                <a class="dropdown-item" href="schedule-log.php">Schedule Log</a>
                <a class="dropdown-item" href="subject-log.php">Subject Log</a>
            </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
    </ul>
</div>

