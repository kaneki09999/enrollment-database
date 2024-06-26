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
    </style>
</head>
<body>
    <?php include "include/sidebar.php"; ?>

    <main>
    <section class="content">
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Professors</h3>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-circle-plus"></i> <!-- ADD -->
                </button>
                <!-- Add Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Professor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="function/add-prof.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
                        </div>
                        <div class="mb-3">
                            <label for="major" class="col-form-label">Major:</label>
                            <input type="text" class="form-control" name="major" id="major" placeholder="Enter major" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="col-form-label">Contact No:</label>
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter contact No" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
              <div class="card-body">
                <style>
                    .actions-column {
                        width: 80px;
                    }
                </style>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Contact No.</th>
                            <th class="actions-column">Actions</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                        <?php
                        $counter = 1;
                        $sql = "CALL SelectProf()";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($details = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $details['name']; ?></td>
                                <td><?php echo $details['major']; ?></td>
                                <td><?php echo $details['contact']; ?></td>
                                <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#MODAL_ID_<?php $details['id']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i> <!-- UPDATE -->
                                </button>
                                <button type="button" class="btn btn-danger" onclick="deleteCourse(<?php echo $details['id']; ?>)">
                                    <i class="fa-solid fa-trash-can"></i> <!-- DELETE -->
                                </button>
                                <script>
                                function deleteCourse(courseId) {
                                    if (confirm("Are you sure you want to delete this professor?")) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open("POST", "function/delete-professor.php", true);
                                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                alert(xhr.responseText);
                                                window.location.reload();
                                            }
                                        };
                                        xhr.send("id=" + courseId);
                                    }
                                }
                                </script>


                                   
                                </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>



                  <tfoot>
                    <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Contact No.</th>
                            <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </main>
<?php include "include/footer-extension.php"; ?>  
</body>
</html>
