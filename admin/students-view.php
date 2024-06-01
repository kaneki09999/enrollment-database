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
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-bar {
            max-width: 300px; /* Adjust width as needed */
        }
        .search-bar .form-control {
            color: #000;
        }
        .search-bar .btn {
            color: #000;
        }
        .table td, .table th {
            font-size: 12px; /* Adjust the font size here */
        }
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
                    <a href="#">Student View</a>
                </li>
            </ul>

            <div class="container">
    <form class="registration-form" action="" method="POST" enctype="multipart/form-data">
        <h2 class="text-center" style="color: #e77d33;">Student Information</h2>
        <div class="form-group">
            <label for="student_id" class="form-label">Student ID:</label>
            <input type="text" id="student_id" name="student_id" class="form-control" placeholder="Student ID" readonly required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter First Name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="middlename">Middle Initial:</label>
                <input type="text" id="middlename" name="middlename" placeholder="Enter Middle Initial">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dob" class="form-label">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter Address" required>
            </div>
            <div class="form-group col-md-6">
                <label for="pob">Place of Birth:</label>
                <input type="text" id="pob" name="pob" placeholder="Enter Place of Birth" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="guardian">Guardian:</label>
                <input type="text" id="guardian" name="guardian" placeholder="Enter Guardian Name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="contact_no">Contact No.:</label>
                <input type="text" id="contact_no" name="contact_no" placeholder="Enter Contact No." required>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="course">Course:</label>
            <select class="form-control" id="course" name="course" required>
                <option value="">Select Course</option>
                <option value="1">Bachelor of Science Information System</option>
                <option value="2">Bachelor of Science Information Technology</option>
                <option value="3">Bachelor of Science Computer Science</option>
                <option value="4">Bachelor of Science Entertainment and Multimedia Computing</option>
            </select>
            </div>

            <div class="form-group col-md-6">
                    <label for="year_level">Year Level:</label>
                    <select class="form-control" id="year_level" name="year_level" required>
                        <option value="">Select Year Level</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
        </div>
        <input type="submit" value="Save">
    </form>
</div>
