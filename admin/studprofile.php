<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            padding-top: 56px;
        }
        main {
            margin-left: 250px;
            padding: 20px;
        }
        .breadcrumb {
            padding: 0;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .breadcrumb .nav-item {
            padding: 8px 15px;
        }
        .breadcrumb .nav-item.active {
            color: #333;
            pointer-events: none;
        }
        .student-info-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0,0,0,0.8);
            background-color: #f9f9f9;
            max-width: 850px;
            max-height: 390px;
            margin: 0 auto; 
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .student-info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .student-info-item {
            text-align: center;
            font-size: 18px;
        }

        .student-info-item strong {
            display: block;
            margin-bottom: 5px;
        }

        .student-info-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            margin-bottom: 25px;
        }

        .student-info-buttons button {
            margin: 0 5px;
        }

        .zoom-hover:hover {
            transform: scale(1.1);
            transition: transform 0.4s ease-in-out;
        }
    </style>
</head>
<body>
<?php include "include/sidebar.php"; ?>
   
    <main>
        <div class="container">
            <ul class="breadcrumb">
                <li class="nav-item">
                    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <i class='fas fa-chevron-right'></i>
                </li>
                <li class="nav-item active">
                    <a href="#">Student Profile</a>
                </li>
            </ul>
            
            <br>
            <div class="student-info-container">
                <h1 style="font-size: 18px; color:#FF6400">Student Profile</h1>
                <hr>
                <h2 style="font-size: 20px; float: left;"><a style="color:#FF6400;">Student Name: </a>Melvin Melvin</h2><br>
                <hr>
             
                <div class="student-info-grid">
                    <div class="student-info-item">
                        <strong>Student ID</strong>12345
                    </div>
                    <div class="student-info-item">
                        <strong>Section</strong>A
                    </div>
                    <div class="student-info-item">
                        <strong>Gender</strong>Male
                    </div>
                    <div class="student-info-item">
                        <strong>Course</strong>Bachelor of Kinesiology
                    </div>
                    <div class="student-info-item">
                        <strong>Contact Number</strong>09514413826
                    </div>
                    <div class="student-info-item">
                        <strong>Year Level</strong>1
                    </div>
                    <div class="student-info-item">
                        <strong>Status</strong>Enrolled
                    </div>
                    <div class="student-info-item">
                        <strong>Document</strong>
                        <input type="file" id="document" name="document">
                    </div>
                </div>
      
                <div class="student-info-buttons">
                    <button class="btn btn-secondary zoom-hover" style="width: 100px; background-color: red; border: 2px solid black;">Back</button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
