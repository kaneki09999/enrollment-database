<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Admin - Set Current Semester</title>
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
                    <a href="#">Set Current Semester</a>
                </li>
            </ul>

            <!-- Table displaying semester options -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>Semester</th>
                            <th>Set</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1st Semester</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="setSemester" id="firstSemester" value="1st" checked>
                                    <label class="form-check-label" for="firstSemester">
                                        Set
                                    </label>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2nd Semester</td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="setSemester" id="secondSemester" value="2nd">
                                    <label class="form-check-label" for="secondSemester">
                                        Set
                                    </label>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal for Edit Semester -->
    <div class="modal fade" id="editSemesterModal" tabindex="-1" role="dialog" aria-labelledby="editSemesterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSemesterModalLabel">Edit Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing semester details -->
                    <form id="editSemesterForm">
                        <div class="form-group">
                            <label for="editSemester">Semester</label>
                            <input type="text" class="form-control" id="editSemester">
                        </div>
                        <div class="form-group">
                            <label for="editSet">Set</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="editSetSemester" id="editFirstSemester" value="1st">
                                <label class="form-check-label" for="editFirstSemester">
                                    1st Semester
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="editSetSemester" id="editSecondSemester" value="2nd">
                                <label class="form-check-label" for="editSecondSemester">
                                    2nd Semester
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveSemesterChangesBtn">Save changes</button>
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
                var semester = row.find('td:nth-child(1)').text().trim();

                // Set modal values
                $('#editSemester').val(semester);

                // Determine which radio button to check
                var setVal = row.find('.form-check-input:checked').val();
                if (setVal === "1st") {
                    $('#editFirstSemester').prop('checked', true);
                } else {
                    $('#editSecondSemester').prop('checked', true);
                }

                // Show modal
                $('#editSemesterModal').modal('show');
            });

            // Save changes button handler
            $('#saveSemesterChangesBtn').click(function() {
                // Retrieve edited values
                var editedSemester = $('#editSemester').val();
                var editedSet = $('input[name="editSetSemester"]:checked').val();

                // Implement your save logic here (e.g., update the row in the table)
                // For now, we'll just update the table directly

                var row = $('.btn-edit').closest('tr');
                row.find('td:nth-child(1)').text(editedSemester);

                // Update the set radio button based on edited value
                if (editedSet === "1st") {
                    row.find('.form-check-input').val("1st").prop('checked', true);
                } else {
                    row.find('.form-check-input').val("2nd").prop('checked', true);
                }

                // Close modal
                $('#editSemesterModal').modal('hide');
            });
        });
    </script>
</body>
</html>
