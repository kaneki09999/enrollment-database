<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            padding-top: 56px; /* Adjust based on your top bar's height */
        }
        main {
            margin-left: 250px;
            padding: 20px; /* Add padding to maintain space around content */
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
    </style>
</head>
<body>
<?php include "include/sidebar.php"; ?>
    <!-- CONTENT -->
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
                    <a href="#">New Enrollees</a>
                </li>
            </ul>
        <br>
            <h2 style="margin-left: 260px">Welcome to the Administrator Panel</h2>
        <br>
            <div class="statistics-box">
                <div class="box-info">
                    <div class="box-item">
                        <i class='fas fa-user-graduate'></i>
                        <div class="text">
                            <h3>20</h3>
                            <p>STUDENTS</p>
                        </div>
                    </div>

                    <div class="box-item">
                        <i class='fas fa-chalkboard-teacher'></i>
                        <div class="text">
                            <h3>20</h3>
                            <p>PROFESSORS</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
</body>
</html>
