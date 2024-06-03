<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Admin</title>

    <link rel="stylesheet" href="styles.css">

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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
            
          <!-- Button trigger modal -->


            <!-- ADD MODAL -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Subject</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           
                            <form action="function/add_subject.php" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="yearLevel" class="col-form-label">Year Level:</label>
                                            <select class="form-control" id="yearLevel" name="yearLevel">
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                                <option value="3">3rd Year</option>
                                                <option value="4">4th Year</option>
                                            </select>
                                        </div>

                                        <?php 
                                        $sql = "CALL GetCourses()";
                                        if ($result = $conn->query($sql)) {
                                            if ($result->num_rows > 0) {
                                                echo '<div class="col-md-9">';
                                                echo '<label for="program" class="col-form-label">Program:</label>';
                                                echo '<select class="form-control" id="program" name="program">';
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row["id"] . '">' . $row["program"] . '</option>';
                                                }
                                                echo '</select>';
                                                echo '</div>';
                                            } else {
                                                echo "No programs available";
                                            }
                                            $result->close();

                                            while ($conn->more_results() && $conn->next_result()) {
                                                ;
                                            }
                                        } else {
                                            echo "Error: " . $conn->error;
                                        }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="subjectcode" class="col-form-label">Subject Code:</label>
                                        <input type="text" class="form-control" name="subjectcode" id="subjectcode">
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="col-form-label">Description:</label>
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="unit" class="col-form-label">Unit:</label>
                                            <input type="text" class="form-control" name="unit" id="unit">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="day" class="col-form-label">Day:</label>
                                            <select class="form-control" id="day" name="day">
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="time" class="col-form-label">Time:</label>
                                            <input type="text" class="form-control" name="time" id="time">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="professor" class="col-form-label">Professor:</label>
                                        <input type="text" class="form-control" name="professor" id="professor">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Subjects</h3>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                </button>
            </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Course</th>
                            <th>Year/Section</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Professor</th>
                            <th>Action</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                        <?php
                        $sql = "SELECT * FROM subjects_program";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while ($details = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                <td><?php echo $details['subject_code']; ?></td>
                                <td><?php echo $details['description']; ?></td>
                                <td><?php echo $details['unit']; ?></td>
                                <td><?php echo $details['program']; ?></td>
                                <td><?php echo $details['year_level']; ?></td>
                                <td><?php echo $details['day']; ?></td>
                                <td><?php echo $details['time']; ?></td>
                                <td><?php echo $details['professor']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MODAL_ID_<?php $details['subject_id']; ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_<?php $details['subject_id']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="update_<?php $details['subject_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
                                <!-- VIEW MODAL -->
                                <div class="modal fade" id="MODAL_ID_<?php $details['subject_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog  ">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Subjects</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <form>
                                        
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-success">Save changes</button>
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
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Course</th>
                            <th>Year/Section</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Professor</th>
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


    
<?php include "include/footer-extention.php"; ?>

</body>
</html>
