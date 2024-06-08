<?php include "include/header.php" ?>
    <br>
    <div class="content-wrapper container mt-3">
        <!-- Student Section -->
<section class="invoice">
    <div class="row">
        <div class="col-12">
            <h3 class="page-header">
                <i class="fa fa-user"></i> Student Information
                <small class="float-right small-date"><i class="fa fa-calendar"></i> Date: <?php echo date('Y-m-d'); ?></small>
            </h3>
        </div>
    </div>
    <hr>
    <div class="row invoice-info">
        
        <?php
        $sql = "CALL GetStudentDetails($student_id);";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $program = $row['program_id'];
        $year_level = $row['year_id'];
        ?>
        <div class="col-sm-8 invoice-col">
            <b>Name:</b> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?><br>
            <b>Address:</b> <?php echo $row['address']; ?><br>
            <b>Contact No.:</b> <?php echo $row['contact']; ?><br>
            <?php if($row['section'] != null) : ?>
            <b>Section:</b> <?php echo $row['section']; ?><br>
            <?php endif; ?>
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Course/Year:</b> <?php echo $row['program']; ?> / <?php echo $row['year_level']; ?><br>
            <b>Semester:</b> First Semester<br>
            <b>Academic Year:</b> 2024-2025
        </div>
        <?php
        $result->free();
        $conn->next_result();
        ?>
    </div>
    
    <br>
    <div class="row">
        <div class="col-12">
            <h3 class="page-header">
                <i class="fa fa-book"></i> List of Subjects
            </h3>
        </div>
    </div>
    
    <?php
$sql = "CALL GetStudentSchedule(?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $student_id, $program, $year_level);
$stmt->execute();
$results = $stmt->get_result();

  if ($results->num_rows > 0) {
      $res = $results->fetch_assoc();
      if ($res['status'] == 'Confirmed') {
          echo '<div class="row">
                  <div class="col-12 table-responsive">
                      <table class="table">
                          <thead class="thead-dark">
                              <tr>
                                  <th>#</th>
                                  <th>Subject Code</th>
                                  <th>Description</th>
                                  <th>Unit</th>
                                  <th>Day</th>
                                  <th>Time</th>
                                  <th>Room</th>
                                  <th>Professor</th>
                              </tr>
                          </thead>
                          <tbody>';
          
          $total_units = 0;
          $row_number = 1;
          do {
              echo '<tr>
                      <td>' . $row_number++ . '</td>
                      <td>' . htmlspecialchars($res['subject_code']) . '</td>
                      <td>' . htmlspecialchars($res['description']) . '</td>
                      <td>' . htmlspecialchars($res['unit']) . '</td>
                      <td>' . htmlspecialchars($res['day']) . '</td>
                      <td>' . htmlspecialchars($res['time']) . '</td>
                      <td>' . htmlspecialchars($res['room']) . '</td>
                      <td>' . htmlspecialchars($res['name']) . '</td>
                    </tr>';
              $total_units += $res['unit'];
          } while ($res = $results->fetch_assoc());
  
          echo '<tr>
                  <td colspan="3" align="right"><b>Total Units:</b></td>
                  <td><b>' . $total_units . '</b></td>
                  <td colspan="4"></td>
                </tr>
                </tbody>
                </table>
                </div>
                </div>';
      } else {
          echo "The schedule is confirmed.";
      }
  } else {
      ?>
        <div class="row">
        <div class="col-12 table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Subject Code</th>
                        <th>Description</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                    </tr>
                    <tr>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                    </tr>
                    <tr>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                    </tr>
                    <tr>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                    </tr>
                    <tr>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                    </tr>
                    <tr>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                        <td>-----</td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><b>Total Units</b></td>
                        <td><b>---</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
      <?php
  }
  $stmt->close();
  ?>


    
</section>

    </div>

    <br>
    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Enrollment System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
