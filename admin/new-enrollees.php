<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Admin</title>

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
                    <a href="#">List of Enrollees</a>
                </li>
            </ul>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">New Enrollees</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th>Status</th>
                            <th>Action</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                        <?php
                        $sql = "SELECT * FROM pending_students";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($details = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $details['student_id']; ?></td>
                                <td><?php echo $details['firstname']; ?> <?php echo $details['lastname']; ?></td>
                                <td><?php echo $details['gender']; ?></td>
                                <td><?php echo $details['address']; ?></td>
                                <td><?php echo $details['contact']; ?></td>
                                <td><?php echo $details['program']; ?></td>
                                <td><?php echo $details['year_level']; ?></td>
                                <td><?php echo $details['status']; ?></td>
                                <td>
                                <a href="studprofile.php">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MODAL_<?php $details['student_id']; ?>">
                                      <i class="fa-solid fa-eye"></i> <!-- VIEW -->
                                      
                                    </button>
                                    </a>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#MODAL_ID_<?php $details['student_id']; ?>">
                                       <i class="fa-solid fa-check"></i> <!-- Confirm -->
                                    </button>
                                </td>
                                </tr>

                                <!-- CONFIRM MODAL -->
                                <div class="modal fade" id="MODAL_ID_<?php $details['student_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Section</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <form action="function/set-section.php" method="POST">
                                        <input type="hidden" name="student_id" value="<?php echo $details['student_id']; ?>">
                                          <div class="form-group">
                                            <div class="row">
                                              <div class="col-md-6">
                                                  <label for="year_level">Year Level:</label>
                                                  <select class="form-control" id="year_level" name="year_level" required>
                                                    <option value="1" <?php if ($details['year_level'] == '1st Year') echo 'selected="selected"'; ?>>1st Year</option>
                                                    <option value="2" <?php if ($details['year_level'] == '2nd Year') echo 'selected="selected"'; ?>>2nd Year</option>
                                                    <option value="3" <?php if ($details['year_level'] == '3rd Year') echo 'selected="selected"'; ?>>3rd Year</option>
                                                    <option value="4" <?php if ($details['year_level'] == '4th Year') echo 'selected="selected"'; ?>>4th Year</option>
                                                  </select>
                                              </div>
                                              <div class="col-md-6">
                                                <label for="section">Set section:</label>
                                                  <select class="form-control" id="section" name="section" required>
                                                    <option value="" disabled selected>Section</option>
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
                                                  </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save changes</button>
                                          </div>
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
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Contact No.</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th>Status</th>
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
