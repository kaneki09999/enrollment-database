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
                    <a href="#">Subjects</a>
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

            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Course</th>
                            <th>Year/Section</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CS101</td>
                            <td>Introduction to Programming</td>
                            <td>3</td>
                            <td>BS Information System</td>
                            <td>1st Year, Sec A</td>
                            <td>1st Sem</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Other rows -->
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

    <!-- Modal for Edit Subject -->
    <div class="modal fade" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSubjectModalLabel">Edit Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing subject details -->
                    <form id="editSubjectForm">
                        <div class="form-group">
                            <label for="editSubjectCode">Subject Code</label>
                            <input type="text" class="form-control" id="editSubjectCode" readonly>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <input type="text" class="form-control" id="editDescription">
                        </div>
                        <div class="form-group">
                            <label for="editUnit">Unit</label>
                            <input type="number" class="form-control" id="editUnit">
                        </div>
                        <div class="form-group">
                            <label for="editCourse">Course</label>
                            <input type="text" class="form-control" id="editCourse">
                        </div>
                        <div class="form-group">
                            <label for="editYearSection">Year/Section</label>
                            <input type="text" class="form-control" id="editYearSection">
                        </div>
                        <div class="form-group">
                            <label for="editSemester">Semester</label>
                            <input type="text" class="form-control" id="editSemester">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
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
                var subjectCode = row.find('td:nth-child(2)').text().trim();
                var description = row.find('td:nth-child(3)').text().trim();
                var unit = row.find('td:nth-child(4)').text().trim();
                var course = row.find('td:nth-child(5)').text().trim();
                var yearSection = row.find('td:nth-child(6)').text().trim();
                var semester = row.find('td:nth-child(7)').text().trim();

                // Set modal values
                $('#editSubjectCode').val(subjectCode);
                $('#editDescription').val(description);
                $('#editUnit').val(unit);
                $('#editCourse').val(course);
                $('#editYearSection').val(yearSection);
                $('#editSemester').val(semester);

                // Show modal
                $('#editSubjectModal').modal('show');
            });

            // Save changes button handler
            $('#saveChangesBtn').click(function() {
                // Retrieve edited values
                var editedDescription = $('#editDescription').val();
                var editedUnit = $('#editUnit').val();
                var editedCourse = $('#editCourse').val();
                var editedYearSection = $('#editYearSection').val();
                var editedSemester = $('#editSemester').val();

                // Implement your save logic here (e.g., update the row in the table)

                // Close modal
                $('#editSubjectModal').modal('hide');
            });
        });
    </script>
</body>
</html>
