<?php
include '../../connect/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subj_id = $_POST['id'];

    $stmt = $conn->prepare("CALL delete_subject(?)");
    $stmt->bind_param("i", $subj_id);

    if ($stmt->execute()) {
        echo "Course deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
