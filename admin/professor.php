<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Admin - List of Professors</title>
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
                    <a href="#">List of Professors</a>
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

            <!-- Table displaying professor details -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Contact No.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dr. John Doe</td>
                            <td>Computer Science</td>
                            <td>123-456-7890</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit">Edit <i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm">Delete <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Prof. Jane Smith</td>
                            <td>Information Technology</td>
                            <td>987-654-3210</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit">Edit <i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm">Delete <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Dr. Alice Johnson</td>
                            <td>Electrical Engineering</td>
                            <td>456-789-0123</td>
                            <td>
                                <button class="btn btn-primary btn-sm btn-edit">Edit <i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm">Delete <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- More rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal for Edit Professor -->
    <div class="modal fade" id="editProfessorModal" tabindex="-1" role="dialog" aria-labelledby="editProfessorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfessorModalLabel">Edit Professor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing professor details -->
                    <form id="editProfessorForm">
                        <div class="form-group">
                            <label for="editName">Name</label>
                            <input type="text" class="form-control" id="editName">
                        </div>
                        <div class="form-group">
                            <label for="editMajor">Major</label>
                            <input type="text" class="form-control" id="editMajor">
                        </div>
                        <div class="form-group">
                            <label for="editContact">Contact Number</label>
                            <input type="text" class="form-control" id="editContact">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveProfessorChangesBtn">Save changes</button>
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
                var name = row.find('td:nth-child(2)').text().trim();
                var major = row.find('td:nth-child(3)').text().trim();
                var contact = row.find('td:nth-child(4)').text().trim();

                // Set modal values
                $('#editName').val(name);
                $('#editMajor').val(major);
                $('#editContact').val(contact);

                // Show modal
                $('#editProfessorModal').modal('show');
            });

            // Save changes button handler
            $('#saveProfessorChangesBtn').click(function() {
                // Retrieve edited values
                var editedName = $('#editName').val();
                var editedMajor = $('#editMajor').val();
                var editedContact = $('#editContact').val();

                // Implement your save logic here (e.g., update the row in the table)
                // For now, we'll just update the table directly

                var row = $('.btn-edit').closest('tr');
                row.find('td:nth-child(2)').text(editedName);
                row.find('td:nth-child(3)').text(editedMajor);
                row.find('td:nth-child(4)').text(editedContact);

                // Close modal
                $('#editProfessorModal').modal('hide');
            });
        });
    </script>
</body>
</html>
