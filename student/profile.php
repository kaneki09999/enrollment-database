<?php include "include/header.php" ?>

<br>
<div class="content-wrapper container mt-3">
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
            <i class="fa fa-user"></i> Update Accounts
            </h3>
        </div>
    </div>
<div class="container">
<form action="student/controller.php?action=edit" method="post">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9"> <!-- Adjust the column width as needed -->
                <table class="table">
                    <tr>
                        <td><label>Student Number</label></td>
                        <td>
                            <input class="form-control input-md" readonly id="student_id" name="student_id" placeholder="Student Id" type="text" value="<?php echo $row['student_id']; ?>">
                        </td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <label>Firstname</label>
                            <input required="true" class="form-control input-md" id="firstname" name="firstname" placeholder="First Name" type="text" value="<?php echo $row['firstname']; ?>">
                        </td>
                        <td colspan="3">
                            <label>Lastname</label>
                            <input required="true" class="form-control input-md" id="lastname" name="lastname" placeholder="Last Name" type="text" value="<?php echo $row['lastname']; ?>">
                        </td>
                        <td>
                            <label>Middlename</label>
                            <input class="form-control input-md" id="middlename" name="middlename" placeholder="Middle Name" type="text" value="<?php echo $row['middlename']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <label>Address</label>
                            <input required="true" class="form-control input-md" id="address" name="address" placeholder="Permanent Address" type="text" value="<?php echo $row['address']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Sex</label></td>
                        <td colspan="2">
                            <label>
                                <input id="optionsRadios1" name="optionsRadios" type="radio" value="Female" <?php echo ($row['gender'] == 'Female') ? 'checked' : ''; ?>> Female
                                <input id="optionsRadios2" name="optionsRadios" type="radio" value="Male" <?php echo ($row['gender'] == 'Male') ? 'checked' : ''; ?>> Male
                            </label>
                        </td>
                        <td><label>Date of Birth</label></td>
                        <td colspan="2">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input required="true" name="birthdate" id="birthdate" type="text" class="form-control input-md" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="<?php echo $row['birthdate']; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Place of Birth</label></td>
                        <td colspan="5">
                            <input required="true" class="form-control input-md" id="birthplace" name="birthplace" placeholder="Place of Birth" type="text" value="<?php echo $row['birthplace']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Nationality</label></td>
                        <td colspan="2">
                            <input required="true" class="form-control input-md" id="NATIONALITY" name="NATIONALITY" placeholder="Nationality" type="text" value="">
                        </td>
                        <td><label>Religion</label></td>
                        <td colspan="2">
                            <input required="true" class="form-control input-md" id="RELIGION" name="RELIGION" placeholder="Religion" type="text" value="">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Contact No.</label></td>
                        <td colspan="3">
                            <input required="true" class="form-control input-md" id="contact" name="contact" placeholder="Contact Number" type="text" value="<?php echo $row['contact']; ?>">
                        </td>
                        <td><label for="civil-status">Civil Status</label></td>
                        <td colspan="2">
                            <select id="civil-status" name="civil_status">
                                <option value="">Select Civil Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td><label>Username</label></td>
                        <td colspan="6">
                            <input required="true" class="form-control input-md" id="USER_NAME" name="USER_NAME" placeholder="Username" type="text" value="<?php echo $row['username']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Guardian</label></td>
                        <td colspan="2">
                            <input required="true" class="form-control input-md" id="GUARDIAN" name="GUARDIAN" placeholder="Parents/Guardian Name" type="text" value="">
                        </td>
                        <td><label>Contact No.</label></td>
                        <td colspan="2">
                            <input required="true" class="form-control input-md" id="GCONTACT" name="GCONTACT" placeholder="Contact Number" type="text" value="">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="5">
                            <button class="btn btn-success" name="save" type="submit">Save</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>


</div>
</section>
</div>
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