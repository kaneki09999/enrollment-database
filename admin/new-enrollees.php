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
                    <a href="#">New Enrollees</a>
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
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Course</th>
                            <th>Action</th>
                            <!-- PAG CLICK NG CONFIRM MAY LALABAS NA MODAL NA MAGIINPUT NG SUBJECTS OR DROP-DOWN THEN PIPILI NG YEAR LEVEL MUNA AND THEN
                                PAG NAKAPILI NA SAKA LALABAS YUNG MGA SUBJECTS NA BASE SA KUNG ANO YEAR LEVEL TO -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123456</td>
                            <td>John Doe</td>
                            <td>Male</td>
                            <td>123 Main St, Anytown, USA</td>
                            <td>(555) 123-4567</td>
                            <td>Computer Science</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
                        <tr>
                            <td>654321</td>
                            <td>Jane Smith</td>
                            <td>Female</td>
                            <td>456 Elm St, Anytown, USA</td>
                            <td>(555) 765-4321</td>
                            <td>Business Administration</td>
                            <td><button class="btn btn-success btn-sm">Confirm <i class="fa fa-info-circle fw-fa"></i></button></td>
                        </tr>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
