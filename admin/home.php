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
<?php include "include/sidebar.php"; 

$sql = "SELECT professor_count, student_count, pending_student_count, schedule_count, course_count, subject_count FROM counts WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $professor_count = $row['professor_count'];
    $student_count = $row['student_count'];
    $pending_student_count = $row['pending_student_count'];
    $schedule_count = $row['schedule_count'];
    $course_count = $row['course_count'];
    $subject_count = $row['subject_count'];
} else {
    $professor_count = 0;
    $student_count = 0;
    $pending_student_count = 0;
    $schedule_count = 0;
    $course_count = 0;
    $subject_count = 0;
}
?>
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
                            <h3><?php echo $student_count; ?></h3>
                            <p>STUDENTS</p>
                        </div>
                    </div>

                    <div class="box-item">
                        <i class='fas fa-chalkboard-teacher'></i>
                        <div class="text">
                            <h3><?php echo $professor_count; ?></h3>
                            <p>PROFESSORS</p>
                        </div>
                    </div>

                    <div class="box-item">
                        <i class='fas fa-user-clock'></i>
                        <div class="text">
                            <h3><?php echo $pending_student_count; ?></h3>
                            <p>PENDING STUDENTS</p>
                        </div>
                    </div>

                 
                </div>
            </div>

            <div class="statistics-box">
                <div class="box-info">
                    <div class="box-item">
                        <i class='fas fa-calendar-alt'></i>
                        <div class="text">
                            <h3><?php echo $schedule_count; ?></h3>
                            <p>SCHEDULES</p>
                        </div>
                    </div>

                    <div class="box-item">
                        <i class='fas fa-book'></i>
                        <div class="text">
                            <h3><?php echo $course_count; ?></h3>
                            <p>COURSES</p>
                        </div>
                    </div>

                    <div class="box-item">
                        <i class='fas fa-book-open'></i>
                        <div class="text">
                            <h3><?php echo $subject_count; ?></h3>
                            <p>SUBJECTS</p>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </main>


        
    </section>
</body>
</html>












<!-- 
// Fetch counts
$professor_count_query = "SELECT COUNT(*) AS professor_count FROM professor";
$student_count_query = "SELECT COUNT(*) AS student_count FROM confirmed_students";
$pending_student_count_query = "SELECT COUNT(*) AS pending_student_count FROM pending_students";
$schedule_count_query = "SELECT COUNT(*) AS schedule_count FROM schedules";
$course_count_query = "SELECT COUNT(*) AS course_count FROM courses";
$subject_count_query = "SELECT COUNT(*) AS subject_count FROM subjects";

$professor_count_result = $conn->query($professor_count_query);
$student_count_result = $conn->query($student_count_query);
$pending_student_count_result = $conn->query($pending_student_count_query);
$schedule_count_result = $conn->query($schedule_count_query);
$course_count_result = $conn->query($course_count_query);
$subject_count_result = $conn->query($subject_count_query);

if ($professor_count_result->num_rows > 0) {
  $professor_count = $professor_count_result->fetch_assoc()['professor_count'];
} else {
  $professor_count = 0;
}

if ($student_count_result->num_rows > 0) {
  $student_count = $student_count_result->fetch_assoc()['student_count'];
} else {
  $student_count = 0;
}

if ($pending_student_count_result->num_rows > 0) {
  $pending_student_count = $pending_student_count_result->fetch_assoc()['pending_student_count'];
} else {
  $pending_student_count = 0;
}

if ($schedule_count_result->num_rows > 0) {
  $schedule_count = $schedule_count_result->fetch_assoc()['schedule_count'];
} else {
  $schedule_count = 0;
}

if ($course_count_result->num_rows > 0) {
  $course_count = $course_count_result->fetch_assoc()['course_count'];
} else {
  $course_count = 0;
}

if ($subject_count_result->num_rows > 0) {
  $subject_count = $subject_count_result->fetch_assoc()['subject_count'];
} else {
  $subject_count = 0;
}

$conn->close(); -->