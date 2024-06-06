
<?php
include "include/header.php";

$registration_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $year_level = $_POST['year_level'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $pob = $_POST['pob'];
    $guardian = $_POST['guardian'];
    $contact_no = $_POST['contact_no'];
    $course = $_POST['course'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $registration_date = date('Y-m-d H:i:s'); 
    $status = 'Pending';
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $documents = "";
    if (!empty($_FILES['documents']['name'][0])) {
        $target_dir = "uploads/";
        foreach ($_FILES['documents']['name'] as $key => $value) {
            $target_file = $target_dir . basename($_FILES['documents']['name'][$key]);
            if (move_uploaded_file($_FILES['documents']['tmp_name'][$key], $target_file)) {
                $documents .= $target_file . ";";
            }
        }
    }

    try {
        $stmt = $conn->prepare("CALL InsertStudent(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiisssssssisss", $student_id, $course, $year_level, $firstname, $middlename, $lastname, $dob, $gender, $address, $pob, $contact_no, $documents, $status, $registration_date);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("CALL InsertStudentLogin(?, ?, ?, ?)");
        $stmt->bind_param("isss", $student_id, $email, $username, $hashed_password);
        $stmt->execute();
        $stmt->close();

        $registration_success = true;
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>
                Swal.fire({
                    title: "Error!",
                    text: "Duplicate entry! Please check your input.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            </script>';
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}

if ($registration_success) {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>
        Swal.fire({
            title: "Success!",
            text: "Registration successful!",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>';
}
?>


<br>
<div class="container">
    <form class="registration-form" action="" method="POST" enctype="multipart/form-data">
        <h2 class="text-center" style="color: #e77d33;">Student Registration</h2>
        <div class="form-group">
            <label for="student_id" class="form-label">Student ID:</label>
            <input type="text" id="student_id" name="student_id" class="form-control" placeholder="Student ID" readonly required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" placeholder="Enter First Name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="middlename">Middle Initial:</label>
                <input type="text" id="middlename" name="middlename" placeholder="Enter Middle Initial">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dob" class="form-label">Date of Birth:</label>
                <input type="date" id="dob" name="dob" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter Address" required>
            </div>
            <div class="form-group col-md-6">
                <label for="pob">Place of Birth:</label>
                <input type="text" id="pob" name="pob" placeholder="Enter Place of Birth" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="guardian">Guardian:</label>
                <input type="text" id="guardian" name="guardian" placeholder="Enter Guardian Name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="contact_no">Contact No.:</label>
                <input type="text" id="contact_no" name="contact_no" placeholder="Enter Contact No." required>
            </div>
        </div>
        <div class="form-row">
     
        <?php 
            $sql = "CALL GetCourses()";
                if ($result = $conn->query($sql)) {
                    if ($result->num_rows > 0) {
                        echo '<div class="form-group col-md-6">';
                        echo '<label for="course" class="col-form-label">course:</label>';
                        echo '<select class="form-control" id="course" name="course" required>';
                        echo '<option value="" disabled selected>Select Program</option>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["id"] . '">' . $row["program"] . '</option>';
                                }
                            echo '</select>';
                        echo '</div>';
                            } else {
                                echo "No programs available";
                            }

                            while ($conn->more_results() && $conn->next_result()) {
                                                    ;
                            }
                    } else {
                        echo "Error: " . $conn->error;
                }
            ?>
            

            <div class="form-group col-md-6">
                    <label for="year_level">Year Level:</label>
                    <select class="form-control" id="year_level" name="year_level" required>
                        <option value="">Select Year Level</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                    </select>
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Username" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group col-md-4">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="form-group col-md-6">
                <label for="documents">Upload Documents:</label>
                <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.doc,.docx" required>
            </div>
        </div>
        <input type="submit" value="Register">
    </form>
</div>

    
    <br>
    <footer>
        <div class="container">
            <p>&copy; 2024 Enrollment System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

