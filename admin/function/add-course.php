<?php
include '../../connect/connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program = $_POST['program'];

    $stmt = $conn->prepare("CALL AddCourse(?)");
    $stmt->bind_param("s", $program);

    if ($stmt->execute()) {
        echo "<script>
        alert('New course added successfully');
        window.location.href = '../courses.php';
      </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
