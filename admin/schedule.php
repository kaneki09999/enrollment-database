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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12"> 
   

<!-- DAGDAG NG ROOM NUMBER AND SECTION -->
            <!-- ADD MODAL here -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Schedule</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           
                            <form action="function/add_schedule.php" method="POST">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="yearLevel" class="col-form-label">Year Level:</label>
                                            <select class="form-control" id="yearLevel" name="yearLevel" required>
                                                <option value="" disabled selected>Year Level</option>
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                                <option value="3">3rd Year</option>
                                                <option value="4">4th Year</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="section" class="col-form-label">Section:</label>
                                            <select class="form-control" id="section" name="section" required>
                                                <option value="" disabled selected>Select Section</option>
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                            </select>
                                        </div>
                                        </div>

                                        <div class="row">
                                            <?php 
                                            $sql = "CALL GetCourses()";
                                            if ($result = $conn->query($sql)) {
                                                if ($result->num_rows > 0) {
                                                    echo '<div class="mb-3">';
                                                    echo '<label for="program" class="col-form-label">Program:</label>';
                                                    echo '<select class="form-control" id="program" name="program" required>';
                                                    echo '<option value="" disabled selected>Select Program</option>';
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
                                    <select class="form-control" name="subjectcode" id="subjectcode" required>
                                        <option value="" disabled selected>Select Subject Code</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="col-form-label">Description:</label>
                                    <select class="form-control" name="description" id="description">
                                        <option value="" disabled selected>Select Description</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="unit" class="col-form-label">Unit:</label>
                                        <select class="form-control" name="unit" id="unit" required>
                                            <option value="" disabled selected>Select Unit</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="room" class="col-form-label">Room:</label>
                                        <input type="text" class="form-control" name="room" id="room" placeholder="Room" required>
                                    </div>
                                </div>
                                

                                <script>
                                    $(document).ready(function() {
                                        $.getJSON('function/fetch-subject-code.php', function(data) {
                                            var subjectCodeDropdown = $('#subjectcode');
                                            var descriptionDropdown = $('#description');
                                            var unitDropdown = $('#unit');

                                            var subjects = {};

                                            $.each(data, function(index, subject) {
                                                subjects[subject.subject_code] = { 
                                                    description: subject.description,
                                                    units: subject.units
                                                };
                                                subjectCodeDropdown.append(
                                                    $('<option>', { value: subject.subject_code, text: subject.subject_code })
                                                );
                                            });

                                            subjectCodeDropdown.change(function() {
                                                var selectedSubjectCode = $(this).val();
                                                var selectedSubject = subjects[selectedSubjectCode];

                                                // Update the description dropdown
                                                descriptionDropdown.empty();
                                                descriptionDropdown.append(
                                                    $('<option>', { value: selectedSubject.description, text: selectedSubject.description })
                                                );

                                                // Update the unit dropdown
                                                unitDropdown.empty();
                                                unitDropdown.append(
                                                    $('<option>', { value: selectedSubject.units, text: selectedSubject.units })
                                                );
                                            });
                                        });
                                    });
                                </script>
                                    <div class="row">
                                    <div class="col-md-6">
                                            <label for="day" class="col-form-label">Day:</label>
                                            <select class="form-control" id="day" name="day" required>
                                                <option value="" disabled selected>Select Day</option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                                <option value="Sunday">Sunday</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- DROP DOWN -->
                                            <div class="mb-3">
                                                <label for="time" class="col-form-label">Time:</label>
                                                <select class="form-control" id="time" name="time" required>
                                                    <option value="" disabled selected>Select Time</option>
                                                    <option value="7:00 AM - 10:00 AM">7:00 AM - 10:00 AM</option>
                                                    <option value="10:00 AM - 1:00 PM">10:00 AM - 1:00 PM</option>
                                                    <option value="1:00 PM - 4:00 PM">1:00 PM - 4:00 PM</option>
                                                    <option value="4:00 PM - 7:00 PM">4:00 PM - 7:00 PM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="professor" class="col-form-label">Professor:</label>
                                        <input type="text" class="form-control" name="professor" id="professor" placeholder="Professor" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Schedule</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Schedule</h3>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                </button>
            </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                            <th>Section</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Course</th>
                            <th>Year/Section</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
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
                                <td><?php echo $details['section']; ?></td>
                                <td><?php echo $details['subject_code']; ?></td>
                                <td><?php echo $details['description']; ?></td>
                                <td><?php echo $details['unit']; ?></td>
                                <td><?php echo $details['program']; ?></td>
                                <td><?php echo $details['year_level']; ?></td>
                                <td><?php echo $details['day']; ?></td>
                                <td><?php echo $details['time']; ?></td>
                                <td><?php echo $details['room']; ?></td>
                                <td><?php echo $details['professor']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_<?php echo $details['subject_id']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- UPDATE MODAL -->
                            <div class="modal fade" id="update_<?php echo $details['subject_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="function/update_schedule.php" method="POST">
                                            <input type="hidden" class="form-control" name="subject_id" id="subject_id" value="<?php echo $details['subject_id']; ?>">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="yearLevel" class="col-form-label">Year Level:</label>
                                                            <select class="form-control" id="yearLevel" name="yearLevel">
                                                                <option value="1" <?php if ($details['year_level'] == '1') echo 'selected="selected"'; ?>>1st Year</option>
                                                                <option value="2" <?php if ($details['year_level'] == '2') echo 'selected="selected"'; ?>>2nd Year</option>
                                                                <option value="3" <?php if ($details['year_level'] == '3') echo 'selected="selected"'; ?>>3rd Year</option>
                                                                <option value="4" <?php if ($details['year_level'] == '4') echo 'selected="selected"'; ?>>4th Year</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="section" class="col-form-label">Section:</label>
                                                            <select class="form-control" id="section" name="section">
                                                                <option value="1" <?php if ($details['section'] == 'A') echo 'selected="selected"'; ?>>A</option>
                                                                <option value="2" <?php if ($details['section'] == 'B') echo 'selected="selected"'; ?>>B</option>
                                                                <option value="3" <?php if ($details['section'] == 'C') echo 'selected="selected"'; ?>>C</option>
                                                            </select>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                    <div class="md-3">
                                                            <label for="program" class="col-form-label">Program:</label>
                                                            <select class="form-control" id="program" name="program">
                                                                <option value="1" <?php if ($details['program'] == 'Bachelor of Science Information System') echo 'selected="selected"'; ?>>Bachelor of Science Information System</option>
                                                                <option value="2" <?php if ($details['program'] == 'Bachelor of Science Information Technology') echo 'selected="selected"'; ?>>Bachelor of Science Information Technology</option>
                                                                <option value="3" <?php if ($details['program'] == 'Bachelor of Science Computer Science') echo 'selected="selected"'; ?>>Bachelor of Science Computer Science</option>
                                                                <option value="4" <?php if ($details['program'] == 'Bachelor of Science Entertainment and Multimedia Computing') echo 'selected="selected"'; ?>>Bachelor of Science Entertainment and Multimedia Computing</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="subjectcode" class="col-form-label">Subject Code:</label>
                                                        <input type="text" class="form-control" name="subjectcode" id="subjectcode" value="<?php echo $details['subject_code']; ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="description" class="col-form-label">Description:</label>
                                                        <input type="text" class="form-control" name="description" id="description" value="<?php echo $details['description']; ?>">
                                                    </div>
                                                    <div class="row"> 
                                                        <div class="col-md-6">
                                                            <label for="unit" class="col-form-label">Unit:</label>
                                                            <input type="text" class="form-control" name="unit" id="unit" value="<?php echo $details['unit']; ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="room" class="col-form-label">Room:</label>
                                                            <input type="text" class="form-control" name="room" id="room" value="<?php echo $details['room']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">  
                                                        <div class="col-md-6">
                                                            <label for="day" class="col-form-label">Day:</label>
                                                            <select class="form-control" id="day" name="day">
                                                                <option value="Monday" <?php if ($details['day'] == 'Monday') echo 'selected="selected"'; ?>>Monday</option>
                                                                <option value="Tuesday" <?php if ($details['day'] == 'Tuesday') echo 'selected="selected"'; ?>>Tuesday</option>
                                                                <option value="Wednesday" <?php if ($details['day'] == 'Wednesday') echo 'selected="selected"'; ?>>Wednesday</option>
                                                                <option value="Thursday" <?php if ($details['day'] == 'Thursday') echo 'selected="selected"'; ?>>Thursday</option>
                                                                <option value="Friday" <?php if ($details['day'] == 'Friday') echo 'selected="selected"'; ?>>Friday</option>
                                                                <option value="Saturday" <?php if ($details['day'] == 'Saturday') echo 'selected="selected"'; ?>>Saturday</option>
                                                                <option value="Sunday" <?php if ($details['day'] == 'Sunday') echo 'selected="selected"'; ?>>Sunday</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <label for="time" class="col-form-label">Time:</label>
                                                                <select class="form-control" id="time" name="time">
                                                                <option value="7:00 AM - 10:00 AM" <?php if ($details['time'] == '7:00 AM - 10:00 AM') echo 'selected="selected"'; ?>>7:00 AM - 10:00 AM</option>
                                                                <option value="10:00 AM - 1:00 PM" <?php if ($details['time'] == '10:00 AM - 1:00 PM') echo 'selected="selected"'; ?>>10:00 AM - 1:00 PM</option>
                                                                <option value="1:00 PM - 4:00 PM" <?php if ($details['time'] == '1:00 PM - 4:00 PM') echo 'selected="selected"'; ?>>1:00 PM - 4:00 PM</option>
                                                                <option value="4:00 PM - 7:00 PM" <?php if ($details['time'] == '4:00 PM - 7:00 PM') echo 'selected="selected"'; ?>>4:00 PM - 7:00 PM</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="professor" class="col-form-label">Professor:</label>
                                                        <input type="text" class="form-control" name="professor" id="professor" value="<?php echo $details['professor']; ?>">
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

                            <!-- VIEW MODAL -->
                            <div class="modal fade" id="MODAL_ID_<?php echo $details['subject_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Subjects</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <!-- Add content here -->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success">Save changes</button>
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
                            <th>Section</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Course</th>
                            <th>Year/Section</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Room</th>
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


    
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "order": [], // empty array means no initial ordering
      "pageLength": 8 // set default number of rows to 8
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [], // empty array means no initial ordering
      "pageLength": 8 // set default number of rows to 8
    });
  });
</script>


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
