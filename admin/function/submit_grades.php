<?php
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $midterm = $_POST['midterm'];
    $finalterm = $_POST['finalterm'];
    $final_grade = $_POST['final_grade'];
    $remarks = $_POST['remarks'];
    $date_add = date('Y-m-d H:i:s');   

    if (is_numeric($midterm) && is_numeric($finalterm)) {
        // Prepare a call to the stored procedure
        $sql = "CALL insert_grading(?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("iiddsss", $subject_id, $student_id, $midterm, $finalterm, $final_grade, $remarks, $date_add);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Professor added successfully!');
                        window.location.href = '../grade.php?student_id=$student_id';
                     </script>";
            } else {
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            }
        } else {
            echo "ERROR: Could not prepare query: $sql. " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Please enter valid numeric values for midterm and finalterm.";
    }
}

// Close connection
$conn->close();
?>
