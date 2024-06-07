<?php
include '../../connect/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sched_id = $_POST['id'];

    $stmt = $conn->prepare("CALL delete_schedules(?)");
    $stmt->bind_param("i", $sched_id);

    if ($stmt->execute()) {
        echo "Course deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
