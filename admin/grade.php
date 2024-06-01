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
        .student-info {
            margin-bottom: 20px;
        }
        .student-info h4 {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
        }
        .student-info h8 {
            font-size: 18px;
            color: #7f8c8d;
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
                    <a href="#">Student Grades</a>
                </li>
            </ul>
            <div class="student-info">
                <h4>Melvin Custodio</h4>
                <h8>BS Information System - 3rd Year</h8>
            </div>
            <!-- Table Header with Search Bar -->
            <div class="table-header">
                <div></div> <!-- Placeholder for breadcrumb spacing -->
                <div class="search-bar">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Midterm</th>
                            <th>Final</th>
                            <th>Final Grade</th>
                            <th>Remarks</th>
                            <th>Year Level</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample row -->
                        <tr>
                            <td>1</td>
                            <td>CSC101</td>
                            <td>Introduction to Computer Science</td>
                            <td>3</td>
                            <td>1.00</td>
                            <td>1.00</td>
                            <td>1.00</td>
                            <td>Passed</td>
                            <td>1st Year</td>
                            <td>1st Semester</td>
                            <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addGradesModal">Add Grades</button>
                            </td>
                        </tr>
                        <!-- Additional rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Add Grades Modal -->
    <div class="modal fade" id="addGradesModal" tabindex="-1" role="dialog" aria-labelledby="addGradesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGradesModalLabel">Add Grades</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" placeholder="Enter Subject">
                        </div>
                        <div class="form-group">
                            <label for="midterm">Midterm:</label>
                            <input type="text" class="form-control" id="midterm" placeholder="Enter Midterm Grade">
                        </div>
                        <div class="form-group">
                            <label for="final">Final:</label>
                            <input type="text" class="form-control" id="final" placeholder="Enter Final Grade">
                        </div>
                        <div class="form-group">
                            <label for="finalGrade">Final Grade:</label>
                            <input type="text" class="form-control" id="finalGrade" placeholder="Enter Final Grade">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
