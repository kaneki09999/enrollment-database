<?php
include '../../connect/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = $_POST['subject_id'];
    $yearLevel = $_POST['yearLevel'];
    $program = $_POST['program'];
    $subjectCode = $_POST['subjectcode'];
    $description = $_POST['description'];
    $unit = $_POST['unit'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $professor = $_POST['professor'];

    $sql = "CALL update_subject_by_course(?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isssssssi", $yearLevel, $program, $subjectCode, $description, $unit, $day, $time, $professor, $subject_id);
    
        if ($stmt->execute()) {
            $_SESSION['success'] = "Schedule updated successfully!";
        } else {
            $_SESSION['error'] = "Error updating schedule: " . $stmt->error;
        }
    
        $stmt->close();
    } else {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
    }
    
    $conn->close();

    header("Location: ../subject.php");
    exit;
}
?>

