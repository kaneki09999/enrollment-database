
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
        .student-info {
            margin-bottom: 20px;
        }
        .student-info h4 {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
        }
        .student-info h8 {
            font-size: 18px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <?php include "include/sidebar.php"; ?>
<?php 
$student_id = $_GET['student_id'];

// Fetch student details
$sql = "CALL GetStudentDetails(?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$program = $row['program_id'];
$year_level = $row['year_id'];
?>


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
                    <a href="#">Student Grades</a>
                </li>
            </ul>

        <div class="container">
            <div class="student-info">
                <h4><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h4>
                <h4>Student No: <?php echo $student_id ?></h4>
                <h8><?php echo $row['program']; ?> - <?php echo $row['year_level']; ?></h8>
            </div>
        </div>

        <?php
        $result->free();
        $conn->next_result();
        ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subjects</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                            <th>#</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Midterm</th>
                            <th>Finalterm</th>
                            <th>Final Grade</th>
                            <th>Remarks</th>
                            <th>Year Level</th>
                            <th>Action</th>
                  </tr>
                  </thead>
                  
                    <tbody>

                                    <?php
                                    $sql = "CALL GetStudentScheduleGrading(?, ?, ?)";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("iii", $student_id, $program, $year_level);
                                    $stmt->execute();
                                    $results = $stmt->get_result();

                                    if ($results->num_rows > 0) {
                                        $row_number = 1;
                                        while ($res = $results->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row_number++; ?></td>  
                                                <td><?php echo $res['subject_code']; ?></td>
                                                <td><?php echo $res['description']; ?></td>
                                                <td><?php echo $res['unit']; ?></td>
                                                <td><?php echo $res['midterm']; ?></td>
                                                <td><?php echo $res['finalterm']; ?></td>
                                                <td><?php echo $res['final_grades']; ?></td>
                                                <td><?php echo $res['remarks']; ?></td>
                                                <td><?php echo $res['year_level']; ?></td>
                                                <?php
                                                    if($res['remarks'] != null) :
                                                ?>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#MODAL_ID_<?php echo $res['id']; ?>">
                                                        <i class="fa-solid fa-pen-to-square"></i> <!-- UPDATE -->
                                                    </button>
                                                </td>
                                                    <!-- UPDATE MODAL -->
                                                <div class="modal fade" id="MODAL_ID_<?php echo $res['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Grading</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="function/update_grades.php" method="POST">
                                                            <div class="row">
                                                            <input type="hidden" name="subject_id" value="<?php echo $res['id']; ?>">
                                                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">          
                                                            <div class="col-md-3">
                                                                <label for="midterm" class="col-form-label">Midterm:</label>
                                                                <input type="text" class="form-control" name="midterm" id="midterm_<?php echo $res['id']; ?>" required placeholder="0.00" oninput="calculateFinalGrade(<?php echo $res['id']; ?>)" value="<?php echo $res['midterm']; ?>">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="finalterm" class="col-form-label">Finalterm:</label>
                                                                <input type="text" class="form-control" name="finalterm" id="finalterm_<?php echo $res['id']; ?>" required placeholder="0.00" oninput="calculateFinalGrade(<?php echo $res['id']; ?>)" value="<?php echo $res['finalterm']; ?>">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="final_grade" class="col-form-label">Final Grades:</label>
                                                                <input type="text" class="form-control" name="final_grade" id="final_grade_<?php echo $res['id']; ?>" required placeholder="0.00" readonly value="<?php echo $res['final_grades']; ?>">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="remarks" class="col-form-label">Remarks:</label>
                                                                <input type="text" class="form-control" name="remarks" id="remarks_<?php echo $res['id']; ?>" required placeholder="Remarks" readonly value="<?php echo $res['remarks']; ?>">
                                                            </div>




                                                            </div>  
                                                            <br>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Save</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                    </div>


                                                <?php
                                                    else:
                                                ?>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#MODAL_<?php echo $res['id']; ?>">
                                                            <i class="fa-solid fa-plus"></i> <!-- ADD GRADES -->
                                                    </button>
                                                </td>

                                                <?php
                                                endif;
                                                ?>
                                                <!-- ADD GRADES -->
                                                <div class="modal fade" id="MODAL_<?php echo $res['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Grading</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form action="function/submit_grades.php" method="POST">
                                                            <div class="row">
                                                            <input type="hidden" name="subject_id" value="<?php echo $res['id']; ?>">
                                                            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">          
                                                            <div class="col-md-3">
                                                                <label for="midterm" class="col-form-label">Midterm:</label>
                                                                <input type="text" class="form-control" name="midterm" id="midterm_<?php echo $res['id']; ?>" required placeholder="0.00" oninput="calculateFinalGrade(<?php echo $res['id']; ?>)">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="finalterm" class="col-form-label">Finalterm:</label>
                                                                <input type="text" class="form-control" name="finalterm" id="finalterm_<?php echo $res['id']; ?>" required placeholder="0.00" oninput="calculateFinalGrade(<?php echo $res['id']; ?>)">
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="final_grade" class="col-form-label">Final Grades:</label>
                                                                <input type="text" class="form-control" name="final_grade" id="final_grade_<?php echo $res['id']; ?>" required placeholder="0.00" readonly>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <label for="remarks" class="col-form-label">Remarks:</label>
                                                                <input type="text" class="form-control" name="remarks" id="remarks_<?php echo $res['id']; ?>" required placeholder="Remarks" readonly>
                                                            </div>




                                                            </div>  
                                                            <br>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Save</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                    </div>


                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='11'>No records found</td></tr>";
                                    }
                                    ?>
                    </tbody>

                             

                  <tfoot>
                    <tr>
                            <th>#</th>
                            <th>Subject Code</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Midterm</th>
                            <th>Finalterm</th>
                            <th>Final Grade</th>
                            <th>Remarks</th>
                            <th>Year Level</th>
                            <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
</section>
    </main>
    <?php
$stmt->close();
$conn->close();
?>


<script>
                                                                    const gradeLookup = {
                                                                        '1.00': 1.00, '1.25': 1.25, '1.50': 1.50, '1.75': 1.75, '2.00': 2.00,
                                                                        '2.25': 2.25, '2.50': 2.50, '2.75': 2.75, '3.00': 3.00, '4.00': 4.00, '5.00': 5.00
                                                                    };

                                                                    function findClosestGrade(grade) {
                                                                        let closest = 5.00;
                                                                        let minDiff = Math.abs(grade - closest);

                                                                        for (let key in gradeLookup) {
                                                                            let diff = Math.abs(grade - gradeLookup[key]);
                                                                            if (diff < minDiff) {
                                                                                minDiff = diff;
                                                                                closest = gradeLookup[key];
                                                                            }
                                                                        }
                                                                        return closest;
                                                                    }

                                                                    function calculateFinalGrade(rowId) {
                                                                        var midterm = parseFloat(document.getElementById('midterm_' + rowId).value);
                                                                        var finalterm = parseFloat(document.getElementById('finalterm_' + rowId).value);
                                                                        
                                                                        if (!isNaN(midterm) && !isNaN(finalterm)) {
                                                                            var rawFinalGrade = (midterm + 2 * finalterm) / 3;
                                                                            var finalGrade = findClosestGrade(rawFinalGrade);
                                                                            document.getElementById('final_grade_' + rowId).value = finalGrade.toFixed(2);
                                                                            
                                                                            var remarksField = document.getElementById('remarks_' + rowId);
                                                                            if (finalGrade <= 3.00) {
                                                                                remarksField.value = "Passed";
                                                                            } else {
                                                                                remarksField.value = "Failed";
                                                                            }
                                                                        }
                                                                    }

                                                            </script>

    <?php include "include/footer-extension.php"; ?>  




</body>
</html>
