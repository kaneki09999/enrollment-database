<?php include "include/header.php" ?>
    <div class="content-wrapper container mt-3">
        <!-- Student Information Section -->
        <section class="invoice">
            <div class="row">
                <div class="col-12">
                    <h3 class="page-header">
                    </h3>
                </div>
            </div>
            <div class="row invoice-info">
                <?php
                $sql = "CALL GetStudentDetails($student_id);";
                $result = $conn->query($sql)->fetch_assoc();
                ?>
                <div class="col-sm-8 invoice-col">
                        <b>Name:</b> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?><br>
                        <b>Address:</b> <?php echo $result['address']; ?><br>
                        <b>Contact No.:</b> <?php echo $result['contact']; ?><br>
                    
                </div>
                <div class="col-sm-4 invoice-col">
                <i class="fa fa-calendar"></i> <b>Date:</b> <?php echo date('Y-m-d'); ?><br>
                    <b>Course/Year:</b> BS Information System / 3rd Year<br>
                    <b>Semester:</b> First Semester<br>
                    <b>Academic Year:</b> 2024-2025
                </div>
            </div>
    <div class="container mt-3">
        <h2 class="text-center mb-4">ENROLLED</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Room</th>
                    <th>Section</th>
                    <th>Proffesor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Math 101</td>
                    <td>Introduction to Algebra</td>
                    <td>3</td>
                    <td>Monday</td>
                    <td>8:00 AM - 9:30 AM</td>
                    <td>Room 101</td>
                    <td>A</td>
                    <td>Christian Dave Bernal</td>
                </tr>
                <tr>
                    <td>Eng 102</td>
                    <td>Basic English</td>
                    <td>3</td>
                    <td>Tuesday</td>
                    <td>10:00 AM - 11:30 AM</td>
                    <td>Room 202</td>
                    <td>A</td>
                    <td>Christian Dave Bernal</td>
                </tr>
                <tr>
                    <td>Sci 103</td>
                    <td>General Science</td>
                    <td>4</td>
                    <td>Wednesday</td>
                    <td>1:00 PM - 3:00 PM</td>
                    <td>Room 303</td>
                    <td>A</td>
                    <td>Christian Dave Bernal</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
   
    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

