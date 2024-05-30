<?php require "connect/connection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .top-bar {
            background-color: #529f37; /* Change to your desired color */
            color: #fff; /* Text color */
            padding: 10px 0; /* Adjust padding as needed */
        }

        /* Add thicker and colored line below navbar */
        .navbar:after {
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
            width: 100%;
            bottom: 0;
        }

        .main-content {
            margin-bottom: 100px;
        }
        
        /* Customize form styles as needed */
        .registration-form{
            max-width: 800px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            margin: auto; /* Center the form horizontally */
        }
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%; 
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%; 
            padding: 10px;
            background-color: #529f37;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function generateRandomStudentID() {
            const randomSuffix = Math.floor(1000 + Math.random() * 9000);
            const studentID = '2024' + randomSuffix;
            document.getElementById('student_id').value = studentID;
        }

        document.addEventListener('DOMContentLoaded', generateRandomStudentID);
    </script>
</head>
<body>
    <div class="top-bar">
        <div class="container">
            <p class="contact-info">
                Call Us: +639614057370 / +639358706908 OR Email Us: enrollment_system@gmail.com || Academic Year - 2024-2025 || First Semester
            </p>
        </div>
    </div>

    <nav class="navbar">
        <div class="container">
            <h1 class="logo">Enrollment System</h1>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="course.php">Courses</a></li>
                <li><a href="enroll.php">Enroll Now!</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Log in</a></li>
            </ul>
        </div>
    </nav>