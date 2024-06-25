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
            <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Schedule Log</h3>
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
                            <th>Operation</th>
                            <th>Changed At</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                    $sql = "CALL SelectAllSubjectsByCourseLog()";
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
                                <td><?php echo $details['name']; ?></td>
                                <td><?php echo $details['operation']; ?></td>
                                <td><?php echo $details['changed_at']; ?></td>
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
                            <th>Operation</th>
                            <th>Changed At</th>
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

    });
  });
</script>


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
