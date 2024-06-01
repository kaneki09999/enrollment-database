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
                    <a href="#">List of Courses</a>
                </li>
            </ul>

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

            <!-- Table displaying ID and Courses -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bachelor of Science Information System</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bachelor of Science Computer Science</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bachelor of Science in Information Technology</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Bachelor of Science in Entertainment and Multimedia Computing</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal for Edit Course -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing course details -->
                    <form id="editCourseForm">
                        <div class="form-group">
                            <label for="editCourseID">Course ID</label>
                            <input type="text" class="form-control" id="editCourseID" readonly>
                        </div>
                        <div class="form-group">
                            <label for="editCourseName">Course Name</label>
                            <input type="text" class="form-control" id="editCourseName">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveCourseChangesBtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <script>
        $(document).ready(function() {
            // Edit button click handler
            $('.btn-edit').click(function() {
                // Get the row data
                var row = $(this).closest('tr');
                var courseID = row.find('td:nth-child(1)').text().trim();
                var courseName = row.find('td:nth-child(2)').text().trim();

                // Set modal values
                $('#editCourseID').val(courseID);
                $('#editCourseName').val(courseName);

                // Show modal
                $('#editCourseModal').modal('show');
            });

            // Save changes button handler
            $('#saveCourseChangesBtn').click(function() {
                // Retrieve edited values
                var editedCourseID = $('#editCourseID').val();
                var editedCourseName = $('#editCourseName').val();

                // Find the row to update
                var row = $('td').filter(function() {
                    return $(this).text().trim() === editedCourseID;
                }).closest('tr');

                // Update the row with new values
                row.find('td:nth-child(2)').text(editedCourseName);

                // Implement your save logic here (e.g., update the data in the database)

                // Close modal
                $('#editCourseModal').modal('hide');
            });
        });
    </script>
</body>
</html>
