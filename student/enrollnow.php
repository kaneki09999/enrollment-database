<?php include "include/header.php" ?>
    <br>
    <div class="content-wrapper container mt-3">
        <!-- Student Information Section -->
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
                $sql = "CALL SelectAllStudents()";
                $result = $conn->query($sql)->fetch_assoc();
                ?>
                <div class="col-sm-8 invoice-col">
                        <b>Name:</b> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?><br>
                        <b>Address:</b> <?php echo $result['address']; ?><br>
                        <b>Contact No.:</b> <?php echo $result['contact']; ?><br>
                    
                </div>
                <div class="col-sm-4 invoice-col">
                    <b>Course/Year:</b> BS Information System / 3rd Year<br>
                    <b>Semester:</b> First Semester<br>
                    <b>Academic Year:</b> 2024-2025
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <h3 class="page-header">
                        <i class="fa fa-book"></i> List of Subjects
                    </h3>
                </div>
            </div>
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
                                <td>1</td>
                                <td>CS101</td>
                                <td>Introduction to Programming</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>CS102</td>
                                <td>Data Structures</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>CS103</td>
                                <td>Database Systems</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>CS104</td>
                                <td>Computer Networks</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>CS105</td>
                                <td>Software Engineering</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>CS106</td>
                                <td>Operating Systems</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right"><b>Total Units</b></td>
                                <td><b>18</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <a href="#" class="btn btn-success float-right"><i class="fa fa-check"></i> Enroll</a>
                </div>
            </div>
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
