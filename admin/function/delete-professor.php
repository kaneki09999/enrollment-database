<?php
include '../../connect/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseId = $_POST['id'];

    $stmt = $conn->prepare("CALL delete_prof(?)");
    $stmt->bind_param("i", $courseId);

    if ($stmt->execute()) {
        echo "Course deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
