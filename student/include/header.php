<?php
session_start(); 
require "../connect/connection.php";
if (!isset($_SESSION['student_id'])) {
    echo "<script>window.location.href = '../login.php';</script>";
    exit();
}

$student_id = $_SESSION['student_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.navbar {
    background-color: #fff;
    color: #000;
    padding: 10px 0;
}

.navbar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    margin: 0;
}

.nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-links li {
    display: inline;
    margin-right: 20px;
}

.nav-links li a {
    color: #000;
    text-decoration: none;
}

.nav-links li a:hover {
    text-decoration: underline;
}
.carousel-item {
    height: 600px;
}

.top-bar {
    background-color: #529f37; /* Change to your desired color */
    color: #fff; /* Text color */
    padding: 10px 0; /* Adjust padding as needed */
}

/* Add thicker and colored line below navbar */
.navbar::after {
    content: '';
    display: block;
    width: 100%;
    border-bottom: 5px solid #e77d33; /* Change the color and thickness as needed */
    margin-top: 15px; /* Adjust spacing as needed */
}

.contact-info {
    margin: 0;
    text-align: center;
}

/* Footer styles */
footer {
    background-color: #529f37;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

/* Content Wrapper */
.content-wrapper {
    margin-top: 50px;
}

.invoice .invoice-info b {
    font-weight: normal;
}

.invoice .invoice-col {
    padding-left: 20px;
    padding-right: 20px;
}

.invoice .invoice-col b {
    font-weight: bold;
}

.invoice .invoice-col p {
    margin: 5px 0;
}

.invoice .invoice-col .small-date {
    font-size: 8px;
    font-style: italic;
    color: #888;
}

.invoice .invoice-col .small-date .fa {
    margin-right: 5px;
}


    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <p class="contact-info">
                Call Us: +639614057370 / +639358706908 OR Email Us: enrollment_system@gmail.com || Academic Year - 2024-2025 || First Semester
            </p>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Enrollment System</h1>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="enrollnow.php">Enroll Now!</a></li>
                <li><a href="grade.php">Grades</a></li>
                <li><a href="professor.php">Professors</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
