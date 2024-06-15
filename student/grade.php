<?php include "include/header.php" ?>
  <div class="container mt-5">

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
   <h2 class="mb-4 text-center">Student Grades</h2>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>#</th>
          <th>Subject Code</th>
          <th>Description</th>
          <th>Unit</th>
          <th>Midterm</th>
          <th>Final</th>
          <th>Final Grade</th>
          <th>Remarks</th>
          <th>Year Level</th>
          <th>Semester</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>CS101</td>
          <td>Introduction to Programming</td>
          <td>3</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>Passed</td>
          <td>Third Year</td>
          <td>2nd</td>
        </tr>
        <tr>
          <td>2</td>
          <td>CS102</td>
          <td>Data Structures</td>
          <td>3</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>Passed</td>
          <td>Third Year</td>
          <td>2nd</td>
        </tr>
        <tr>
          <td>3</td>
          <td>CS103</td>
          <td>Database Systems</td>
          <td>3</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>Passed</td>
          <td>Third Year</td>
          <td>2nd</td>
        </tr>
        <tr>
          <td>4</td>
          <td>CS104</td>
          <td>Computer Networks</td>
          <td>3</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>Passed</td>
          <td>Third Year</td>
          <td>2nd</td>
        </tr>
        <tr>
          <td>5</td>
          <td>CS105</td>
          <td>Software Engineering</td>
          <td>3</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>1.00</td>
          <td>Passed</td>
          <td>Third Year</td>
          <td>2nd</td>
        </tr>
      </tbody>
    </table>
  </div>

  <br><br><br><br>
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
