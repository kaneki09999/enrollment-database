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
    <section class="content">
    <ul class="breadcrumb">
                <li class="nav-item">
                    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <i class='fas fa-chevron-right'></i>
                </li>
                <li class="nav-item active">
                    <a href="#">List of Subjects</a>
                </li>
            </ul>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Subjects</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-book-medical"></i>
                </button>

                <!-- ADD MODAL -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Subject</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="function/add-subject.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="subjectcode" class="col-form-label">Subject Code:</label>
                                    <input type="text" class="form-control" name="subjectcode" id="subjectcode" placeholder="Enter subject Code">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter description">
                                </div>
                                <div class="mb-3">
                                    <label for="unit" class="col-form-label">Units:</label>
                                    <input type="text" class="form-control" name="unit" id="unit" placeholder="Enter units">
                                </div>
                            </div>
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
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th class="actions-column">Action</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                        <?php
                        $sql = "CALL GetSubjects()";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($details = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $details['subject_code']; ?></td>
                                <td><?php echo $details['description']; ?></td>
                                <td><?php echo $details['units']; ?></td>
                                
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#MODAL_ID_<?php $details['id']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> <!-- EDIT -->
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="deleteSubject(<?php echo $details['id']; ?>)">
                                        <i class="fa-solid fa-trash-can"></i> <!-- DELETE -->
                                    </button>

                                <script>
                                function deleteSubject(sched_id) {
                                    if (confirm("Are you sure you want to delete this subject?")) {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open("POST", "function/delete_subjects.php", true);
                                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                        xhr.onreadystatechange = function () {
                                            if (xhr.readyState === 4 && xhr.status === 200) {
                                                alert(xhr.responseText);
                                                window.location.reload();
                                            }
                                        };
                                        xhr.send("id=" + sched_id);
                                    }
                                }
                                </script>
                                </td>
                                </tr>
                                  </form>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>

                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>



                  <tfoot>
                    <tr>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Units</th>
                            <th>Action</th>
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
