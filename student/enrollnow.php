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
        ?>
        <div class="col-sm-8 invoice-col">
            <b>Name:</b> <?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?><br>
            <b>Address:</b> <?php echo $row['address']; ?><br>
            <b>Contact No.:</b> <?php echo $row['contact']; ?><br>
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Course/Year:</b> <?php echo $row['program']; ?> / <?php echo $row['year_level']; ?><br>
            <b>Semester:</b> First Semester<br>
            <b>Academic Year:</b> 2024-2025
        </div>
        <?php
        // Free the result set from the first query
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
    $sql = "CALL GetStudentSchedule($student_id);";
    $results = $conn->query($sql);
    $res = $results->fetch_assoc();
    ?>
    
    <?php if($res['status'] != 'Confirmed') { ?>
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
        } else {




        }
    
    
    
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
