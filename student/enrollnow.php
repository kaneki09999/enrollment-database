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
                $sql = "CALL SelectAllStudents()";
                $result = $conn->query($sql)->fetch_assoc();    
                ?>
                <div class="col-sm-8 invoice-col">
                        <b>Name:</b> <?php echo $result['firstname']; ?> <?php echo $result['lastname']; ?><br>
                        <b>Address:</b> <?php echo $result['address']; ?><br>
                        <b>Contact No.:</b> <?php echo $result['contact']; ?><br>
                        
                    
                </div>
                <div class="col-sm-4 invoice-col">
                    <b>Course/Year:</b> <?php echo $result['program']; ?> / <?php echo $result['year_level']; ?><br>
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
                <!-- SELECT 
    ss.student_id, 
    s.firstname, 
    s.lastname, 
    st.section, 
    yl.year_level, 
    c.program, 
    sbc.subject_code, 
    sbc.description, 
    sbc.unit, 
    sbc.day, 
    sbc.time, 
    sbc.room, 
    p.name 
FROM 
    subjects_by_course sbc
JOIN 
    section_tbl st ON sbc.section = st.id
JOIN 
    courses c ON sbc.program = c.id 
JOIN 
    year_level yl ON sbc.year_lvl = yl.id
JOIN 
    section_student ss ON st.id = ss.section
JOIN 
    students s ON ss.student_id = s.student_id
JOIN 
    professor p ON sbc.professor = p.id 
WHERE 
    s.student_id = 20241278;
 -->
         <?php 
            $sql = " SELECT 
            ss.student_id, 
            s.firstname, 
            s.lastname, 
            st.section, 
            yl.year_level, 
            c.program, 
            sbc.subject_code, 
            sbc.description, 
            sbc.unit, 
            sbc.day, 
            sbc.time, 
            sbc.room, 
            p.name 
        FROM 
            subjects_by_course sbc
        JOIN 
            section_tbl st ON sbc.section = st.id
        JOIN 
            courses c ON sbc.program = c.id 
        JOIN 
            year_level yl ON sbc.year_lvl = yl.id
        JOIN 
            section_student ss ON st.id = ss.section
        JOIN 
            students s ON ss.student_id = s.student_id
        JOIN 
            professor p ON sbc.professor = p.id 
        WHERE 
            s.student_id = $student_id;";
            

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
