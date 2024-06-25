<?php 
include '../../connect/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $subjectCode = $_POST['subjectcode'];
    $description = $_POST['description'];
    $units = $_POST['unit'];

    // Prepare SQL call to stored procedure
    $sql = "CALL UpdateSubject(?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("isss", $id, $subjectCode, $description, $units);

        if ($stmt->execute()) {
            echo '<script>
                alert("Subject updated successfully!");
                window.location.href = "../subjects.php";
             </script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
