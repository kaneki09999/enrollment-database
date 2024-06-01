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
                    <a href="#">List of Schedules</a>
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

            <!-- Table displaying schedule details -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>Subject</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
                            <th>Course/Year</th>
                            <th>Section</th>
                            <th>Semester</th>
                            <th>Professor</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Information Systems</td>
                            <td>Monday</td>
                            <td>09:00 AM - 12:00 PM</td>
                            <td>Room 101</td>
                            <td>BSIS 2nd Year</td>
                            <td>Section A</td>
                            <td>1st Semester</td>
                            <td>Dr. John Doe</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Computer Science</td>
                            <td>Tuesday</td>
                            <td>01:00 PM - 04:00 PM</td>
                            <td>Room 102</td>
                            <td>BSCS 3rd Year</td>
                            <td>Section B</td>
                            <td>1st Semester</td>
                            <td>Prof. Jane Smith</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Information Technology</td>
                            <td>Wednesday</td>
                            <td>08:00 AM - 11:00 AM</td>
                            <td>Room 103</td>
                            <td>BSIT 4th Year</td>
                            <td>Section C</td>
                            <td>2nd Semester</td>
                            <td>Dr. Alice Johnson</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Multimedia Computing</td>
                            <td>Thursday</td>
                            <td>02:00 PM - 05:00 PM</td>
                            <td>Room 104</td>
                            <td>BSMC 1st Year</td>
                            <td>Section D</td>
                            <td>2nd Semester</td>
                            <td>Prof. Robert Brown</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- Modal for Edit Schedule -->
    <div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editScheduleModalLabel">Edit Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing schedule details -->
                    <form id="editScheduleForm">
                        <div class="form-group">
                            <label for="editSubject">Subject</label>
                            <input type="text" class="form-control" id="editSubject">
                        </div>
                        <div class="form-group">
                            <label for="editDay">Day</label>
                            <input type="text" class="form-control" id="editDay">
                        </div>
                        <div class="form-group">
                            <label for="editTime">Time</label>
                            <input type="text" class="form-control" id="editTime">
                        </div>
                        <div class="form-group">
                            <label for="editRoom">Room</label>
                            <input type="text" class="form-control" id="editRoom">
                        </div>
                        <div class="form-group">
                            <label for="editCourseYear">Course/Year</label>
                            <input type="text" class="form-control" id="editCourseYear">
                        </div>
                        <div class="form-group">
                            <label for="editSection">Section</label>
                            <input type="text" class="form-control" id="editSection">
                        </div>
                        <div class="form-group">
                            <label for="editSemester">Semester</label>
                            <input type="text" class="form-control" id="editSemester">
                        </div>
                        <div class="form-group">
                            <label for="editProfessor">Professor</label>
                            <input type="text" class="form-control" id="editProfessor">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveScheduleChangesBtn">Save changes</button>
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
                var subject = row.find('td:nth-child(1)').text().trim();
                var day = row.find('td:nth-child(2)').text().trim();
                var time = row.find('td:nth-child(3)').text().trim();
                var room = row.find('td:nth-child(4)').text().trim();
                var courseYear = row.find('td:nth-child(5)').text().trim();
                var section = row.find('td:nth-child(6)').text().trim();
                var semester = row.find('td:nth-child(7)').text().trim();
                var professor = row.find('td:nth-child(8)').text().trim();

                // Set modal values
                $('#editSubject').val(subject);
                $('#editDay').val(day);
                $('#editTime').val(time);
                $('#editRoom').val(room);
                $('#editCourseYear').val(courseYear);
                $('#editSection').val(section);
                $('#editSemester').val(semester);
                $('#editProfessor').val(professor);

                // Show modal
                $('#editScheduleModal').modal('show');
            });

            // Save changes button handler
            $('#saveScheduleChangesBtn').click(function() {
                // Retrieve edited values
                var editedSubject = $('#editSubject').val();
                var editedDay = $('#editDay').val();
                var editedTime = $('#editTime').val();
                var editedRoom = $('#editRoom').val();
                var editedCourseYear = $('#editCourseYear').val();
                var editedSection = $('#editSection').val();
                var editedSemester = $('#editSemester').val();
                var editedProfessor = $('#editProfessor').val();

                // Implement your save logic here (e.g., update the row in the table)
                // For now, we'll just update the table directly

                var row = $('.btn-edit').closest('tr');
                row.find('td:nth-child(1)').text(editedSubject);
                row.find('td:nth-child(2)').text(editedDay);
                row.find('td:nth-child(3)').text(editedTime);
                row.find('td:nth-child(4)').text(editedRoom);
                row.find('td:nth-child(5)').text(editedCourseYear);
                row.find('td:nth-child(6)').text(editedSection);
                row.find('td:nth-child(7)').text(editedSemester);
                row.find('td:nth-child(8)').text(editedProfessor);

                // Close modal
                $('#editScheduleModal').modal('hide');
            });
        });
    </script>
</body>
</html>
