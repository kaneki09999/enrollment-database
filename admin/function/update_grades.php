<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate and sanitize input values
    $subject_id = $_POST['subject_id']; // Assuming this comes from the hidden input
    $student_id = $_POST['student_id']; // Assuming this comes from the hidden input
    $midterm = htmlspecialchars($_POST['midterm']); // Assuming midterm is a float
    $finalterm = htmlspecialchars($_POST['finalterm']); // Assuming finalterm is a float
    $final_grade = htmlspecialchars($_POST['final_grade']); // Assuming final_grade is a float
    $remarks = htmlspecialchars($_POST['remarks']); // Sanitize remarks (assuming plain text input)

    // Connect to your database (modify database credentials as per your setup)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "enrollment";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if there's an existing record for this subject and student
        $stmt = $conn->prepare("SELECT * FROM grading WHERE subject_id = :subject_id AND student_id = :student_id");
        $stmt->bindParam(':subject_id', $subject_id);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        $existing_record = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_record) {
            // Update existing record
            $update_stmt = $conn->prepare("UPDATE grading SET midterm = :midterm, finalterm = :finalterm, final_grades = :final_grade, remarks = :remarks WHERE subject_id = :subject_id AND student_id = :student_id");
            $update_stmt->bindParam(':midterm', $midterm);
            $update_stmt->bindParam(':finalterm', $finalterm);
            $update_stmt->bindParam(':final_grade', $final_grade);
            $update_stmt->bindParam(':remarks', $remarks);
            $update_stmt->bindParam(':subject_id', $subject_id);
            $update_stmt->bindParam(':student_id', $student_id);
            $update_stmt->execute();

            echo "<script>
            alert('Grades updated successfully!');
                window.location.href = '../grade.php?student_id=$student_id';
            </script>";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null; // Close database connection
}
?>
